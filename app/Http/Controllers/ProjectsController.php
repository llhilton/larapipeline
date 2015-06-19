<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Project;
use App\Country;
use App\Watson;
use App\WatsonCountry;
use App\Impromptu;
use App\ShortAwardNumber;
use App\FundingSource;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;

class ProjectsController extends Controller {

    protected $newrules = [
        'name' => ['required', 'min:3'],
        'slug' => ['required', 'unique:projects,slug'],
    ];

    protected $updaterules = [
        'name'=>['required','min:3'],
        'slug' => ['required'],
    ];


    /**
     * Get the region for a project. If no region or if multiple, define it as global
     */
    private function getRegion($project, $country){
        //Get the possible regions based on the project's Watson entries if they are defined
        $region_entries=array();
        $region=array();
        foreach ($project->short_award_numbers as $short_number){
            $region_entries[]=WatsonCountry::where('short_award_number','=',$short_number->short_award_number)->get();
        }
        foreach ($region_entries as $entry){
            foreach($entry as $value) {
                $region[]=$country->find($value->country_id)->region;
            }
        }
        //Get the project's regions based on assigned countries
        foreach ($project->countries as $pcountry){
            $region[]=$pcountry->region;
        }
        $region=array_unique($region);
        if (count($region)>1 OR count($region)==0){
            $region=array("Global");
        }
        return $region[0];
    }

    /**
     * Display a listing of the projects in a given region
     *
     * @return Response
     */
    public function region(FundingSource $fundingsources, Country $country)
    {
       // $regions=config('regions');
        $this->region=Input::get('region');
        $projects = Project::all();
        $fundingsources = FundingSource::all();

        //Build arrays of funding for each project
        foreach ($projects as $project){
            foreach ($project->funding_sources as $pfunding){
                $pfunding_array[$project->id][$pfunding->id]=array ($pfunding->id => $pfunding->pivot->amount);
            }
            $project->region=$this->getRegion($project, $country);
        }

        //Remove projects not in the designated region
        $projects = $projects->filter(function($item){
            return $item->region == $this->region;
        });

        $region=$this->region;

        return view('projects.index', compact('projects','fundingsources','pfunding_array','region'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(FundingSource $fundingsources, Country $country)
    {
        $projects = Project::all();
        $fundingsources = FundingSource::all();

        //Build arrays of funding for each project
        foreach ($projects as $project){
            foreach ($project->funding_sources as $pfunding){
                $pfunding_array[$project->id][$pfunding->id]=array ($pfunding->id => $pfunding->pivot->amount);
            }
            $project->region=$this->getRegion($project, $country);
        }
        $projects->sortBy('region');
        return view('projects.index', compact('projects','fundingsources','pfunding_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Country $countries, FundingSource $fundingsources)
    {
        $countries=Country::all();
        $countries = $countries->sortBy('country');
        //No countries included in creates
        $included_countries=array();

        //chunk into three so that we can display the countries more easily
        $countries=$countries->chunk(ceil($countries->count()/3));

        //Get the funding sources.
        $fundingsources=FundingSource::all();
        //No funding included in new projects
        $included_funding=array();

        //Get the Watson projects in prep for showing
        $watson_projects = Watson::all();
        $watson_projects->sortBy('short_award_number');
        $watson_projects = $watson_projects->chunk(ceil($watson_projects->count()/3));
        //no short award numbers in new projects
        $included_short_award_numbers = array();

        return view('projects.create',compact('countries','included_countries','fundingsources','included_funding','watson_projects','included_short_award_numbers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $fundingsources=FundingSource::all();
        foreach ($fundingsources as $fundingsource){
            $this->newrules[$fundingsource->id]=array('numeric');
        }
        $this->validate($request, $this->newrules);
        $input=Input::all();
        $countries=Input::get('country');
        $project = Project::create(array(
            'name'                  =>  Input::get('name'),
            'slug'                  =>  Input::get('slug'),
            'task_number'           =>  Input::get('task_number'),
            'unique_identifier'     => Input::get('unique_identifier'),
            'notes'                 => Input::get('notes'),
        ));

        //If countries selected, add them
        if ($countries) {
            $project->countries()->sync($countries);
        }else{
            $project->countries()->detach();
        }

        //If funding sources were put in, add them
        $toadd=array();
        foreach($fundingsources as $possiblesource){
            if ($input[$possiblesource->id]<>0) {
                $toadd[$possiblesource->id] = array('amount' => $input[$possiblesource->id]);
            }
        }
        $project->funding_sources()->sync($toadd);

        //If watson projects were selected, add them
        $watson_entries = Input::get('watson');
        if ($watson_entries){
            $toadd_shorts=array();
            foreach ($watson_entries as $entry){
                $toadd_shorts[]=new ShortAwardNumber(array('short_award_number' => $entry, 'project_id' => $project->id));
            }
            $project->short_award_numbers()->saveMany($toadd_shorts);
        }

        return Redirect::route('projects.show',$project->slug)->with('message', 'Project created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function show(Project $project, Country $country, FundingSource $fundingsources, Watson $watson, Impromptu $impromptu)
    {
        //Get the information on the Watson, Impromptu, and WatsonCountry entries for the short award numbers
        $watson_entries=array();
        $impromptu_entries=array();
        foreach ($project->short_award_numbers as $short_number){
            $watson_entries[]=Watson::where('short_award_number','=',$short_number->short_award_number)->get();
            $impromptu_entries[]=Impromptu::where('short_award_number','=',$short_number->short_award_number)->get();
        }
        $region = $this->getRegion($project, $country);
        return view('projects.show', compact('project', 'country', 'fundingsources','watson_entries','impromptu_entries','region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function edit(Project $project, Country $countries, FundingSource $fundingsources, Watson $watson)
    {
        $countries=Country::all();
        $countries = $countries->sortBy('country');
        //No countries included in creates
        $included_countries=array();
        foreach ($project->countries->toArray() as $pcountry){
            $included_countries[]=$pcountry['id'];
        }
        //chunk into three so that we can display the countries more easily
        $countries=$countries->chunk(ceil($countries->count()/3));
        //Get the possible funding sources
        $fundingsources=FundingSource::all();

        $included_funding = array();
        foreach ($project->funding_sources as $pfunding){
            $included_funding[$pfunding->id] = $pfunding->pivot->amount;
        }

        $watson_projects = Watson::all();
        $watson_projects->sortBy('short_award_number');
        $watson_projects = $watson_projects->chunk(ceil($watson_projects->count()/3));

        $included_short_award_numbers = array();

        if ($project->short_award_numbers){
            foreach ($project->short_award_numbers as $pnumber){
                $included_short_award_numbers[] = $pnumber->short_award_number;
            }
        }



        return view('projects.edit', compact('project','countries','included_countries','fundingsources','included_funding', 'watson_projects','included_short_award_numbers'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function update(Project $project, Request $request, Collection $collection)
    {
        $fundingsources=FundingSource::all();
        foreach ($fundingsources as $fundingsource){
            $this->updaterules[$fundingsource->id]=array('numeric');
        }
        $this->validate($request, $this->updaterules);

        $countries=Input::get('country');
        $input = array_except(Input::all(), '_method');
        $project->update(array(
            'name'                  =>  Input::get('name'),
            'slug'                  =>  Input::get('slug'),
            'task_number'           =>  Input::get('task_number'),
            'unique_identifier'     => Input::get('unique_identifier'),
            'notes'                 => Input::get('notes'),
        ));

        if ($countries) {
            $project->countries()->sync($countries);
        }else{
            $project->countries()->detach();
        }
        $toadd=array();
        foreach($fundingsources as $possiblesource){
            if ($input[$possiblesource->id]<>0) {
                $toadd[$possiblesource->id] = array('amount' => $input[$possiblesource->id]);
            }
        }
        $project->funding_sources()->sync($toadd);

        $watson_entries = Input::get('watson');

        if ($watson_entries){
            $project->short_award_numbers()->delete();
            $toadd_shorts=array();
            foreach ($watson_entries as $entry){
                $toadd_shorts[]=new ShortAwardNumber(array('short_award_number' => $entry, 'project_id' => $project->id));
            }
            $project->short_award_numbers()->saveMany($toadd_shorts);
        }else{
            $project->short_award_numbers()->delete();
        }

        return Redirect::route('projects.show', $project->slug)->with('message', 'Project updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @return Response
     */
    public function destroy(Project $project)
    {
        $region=$this->getRegion($project,$project->countries);

        $project->delete();

        return Redirect::route('projects.index')->with('message', 'Project deleted.');
    }

}