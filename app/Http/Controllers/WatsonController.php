<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Country;
use App\Watson;
use App\WatsonCountry;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use DB;

use Illuminate\Http\Request;

class WatsonController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('watson.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Excel $excel, Watson $watson, Country $countries)
	{
        if (Input::hasFile('watson')){

            //delete the previous import
            WatsonCountry::truncate();
            Watson::truncate();

            Excel::load(Input::file('watson')->getRealPath(),function($reader){
               $results=$reader->get();

                //get the countries into an array that we can search
                $this->countries=Country::all();
                $this->countries->each(function($country){
                   $this->country_array[$country->id]=$country->country;
                });

                //Develop an array that we can import, and import the country information
                $results->each(function($result){
                    if ($result->award_number_s<>'') {
                        $this->toinsert[] = array(
                            'short_award_number' => $result->award_number_s,
                            'name' => $result->title,
                            'budget' => $result->budget_amount,
                            'status' => $result->status_text,
                            'start_date' => date("Y-m-d", strtotime($result->award_start_date)),
                            'end_date' => date("Y-m-d", strtotime($result->award_end_date)),
                        );
                    }

                    //insert the project's countries if they exist
                    foreach (explode(',',$result->countries)  as $country){
                        $country=trim($country);
                        if ($country <> ''){
                            $this->country_id = array_search($country,$this->country_array);
                            if ($this->country_id<>0 && $result->award_number_s<>'') {
                                $this->toinsert_countries=array(
                                    'short_award_number' => $result->award_number_s,
                                    'country_id' => $this->country_id,
                                );
                                DB::table('watson_countries')->insert($this->toinsert_countries);
                            }
                        }
                    }
                });
            });
            DB::table('watson')->insert($this->toinsert);
        }
        return Redirect::route('funding_sources.index')->with('message', 'Watson file imported successfully');
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
