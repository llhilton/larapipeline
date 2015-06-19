<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Project;
use App\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CountryProjectController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $countries = Country::all();
        $countries=$countries->sortBy('country');

        return $countries;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Project $project, Country $country)
	{
        $countries=$this->index();
        //chunk into three so that we can display the countries more easily
        $countries=$countries->chunk(ceil($countries->count()/3));
        $included_countries=array();
        foreach ($project->countries->toArray() as $pcountry){
            $included_countries[]=$pcountry['id'];
        }
        return view('countryproject.create', compact('project', 'countries', 'included_countries'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Project $project)
	{
        if (Input::has('country')) {
            $input = Input::all();
            $countries = $input['country'];
        }else{
            $countries=array();
        }
        $project->countries()->sync($countries);

        return Redirect::route('projects.show', $project->slug)->with('message', 'Countries updated.');
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
