<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Project;
use App\Country;
use App\FundingSource;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FundingSourceProjectController extends Controller {

    protected $newrules = [
        'name' => ['required', 'min:3'],
        'slug' => ['required', 'unique:projects,slug'],
    ];

    protected $rules;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fundingsources= FundingSource::all();

        return $fundingsources;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Project $project, FundingSource $fundingsources)
    {
        $fundingsources=FundingSource::all();
        /*$projectfunding=array();
        foreach($project->funding_sources()->toArray() as $projectfunding){
            $projectfunding=$projectfunding['id'];
        }
*/

        /*$countries=$this->index();
        //chunk into three so that we can display the countries more easily
        $countries=$countries->chunk(ceil($countries->count()/3));
        $included_countries=array();
        foreach ($project->countries->toArray() as $pcountry){
            $included_countries[]=$pcountry['id'];
        }*/
        return view('fundingsourceproject.create', compact('project', 'fundingsources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, Project $project, FundingSource $fundingsources)
    {
        $fundingsources=FundingSource::all();
        $this->rules=array();
        $fundingsources->each(function($possiblesource){
            $this->rules[$possiblesource->id]='numeric';
        });
        $this->validate($request, $this->rules,['numeric'=>'The input must be numeric']);

        $input = Input::all();
        $toadd=array();
        foreach($fundingsources as $possiblesource){
            if ($input[$possiblesource->id]<>0) {
                $toadd[$possiblesource->id] = array('amount' => $input[$possiblesource->id]);
            }
        }
        $project->funding_sources()->sync($toadd);

        return Redirect::route('projects.show', $project->slug)->with('message', 'Funding updated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
