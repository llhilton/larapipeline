<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Project;
use App\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CountriesController extends Controller {

    //Regions that countries might belong to
   /* public $regions = array(
        'FSU'=>'FSU','South Asia'=>'South Asia','MENA-Iraq'=>'MENA-Iraq','MENA'=>'MENA','Global'=>'Global','Latin America'=>'Latin America','Sub-Saharan Africa'=>'Sub-Saharan Africa','Southeast Asia'=>'Southeast Asia'
    );
   */

    //validation rules for adding countries
    protected $newrules = [
        'country' => ['required','min:3'],
        'slug' => ['required','unique:countries,slug'],
        'region'=>['required'],
    ];

    //validation rules for updating countries
    protected $updaterules = [
        'country' => ['required', 'min:3'],
        'slug' => ['required'],
        'region'=>['required'],
    ];

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $countries = Country::all();
        $countries = $countries->sortBy('country');
        return view('countries.index', compact('countries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Country $country)
	{
        $regions=config('regions');
        return view('countries.create',compact('country','regions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $this->validate($request, $this->newrules);
        $input = Input::all();
        Country::create( $input );
        return Redirect::route('countries.index')->with('message', 'Country created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( Country $country, Project $project)
	{
        return view('countries.show', compact('country', 'project'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Country $country)
	{
        $regions=config('regions');
        return view('countries.edit', compact('country','regions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Country $country, Request $request)
	{
        $this->validate($request, $this->updaterules);
        $input = array_except(Input::all(), '_method');
        $country->update($input);

        return Redirect::route('countries.show', $country->slug)->with('message', 'Country updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Country $country)
	{
        $country->delete();

        return Redirect::route('countries.index')->with('message', 'Country deleted.');
	}

}
