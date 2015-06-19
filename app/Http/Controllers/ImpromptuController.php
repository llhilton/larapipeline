<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Project;
use App\Impromptu;
use App\ImpromptuOld;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use DB;

use Illuminate\Http\Request;

class ImpromptuController extends Controller {

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
		return view('impromptu.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Excel $excel, Impromptu $impromptu, ImpromptuOld $impromptuold)
	{
        if (Input::hasFile('impromptu')){
            //empty impromptu_old
            ImpromptuOld::truncate();
            //move the info from the new to the old table
            DB::insert(DB::raw('INSERT INTO impromptu_old SELECT * FROM impromptu'));
            Impromptu::truncate();

            //Get the new info and put it in the new table
            $toinsert=array();
            Excel::load(Input::file('impromptu')->getRealPath(),function($reader){
                $results = $reader->get();
                $results->each(function($result){
                    //Get the project string into an array
                    list( $grant_code, $funding_type,$fiscal_year,$program, , , $short_award_number) =str_getcsv($result->project_number,".");
                    if ($program==35 OR $program==67) {
                        $this->toinsert[] = array(
                            'grant_code' => $grant_code,
                            'funding_type' => $funding_type,
                            'fiscal_year' => $fiscal_year,
                            'program' => $program,
                            'short_award_number' => $short_award_number*1,
                            'project_string' => $result->project_number,
                            'agency_funded' => $result->aagencyfunded,
                            'expended' => $result->bctd_direct_indirect_exp,
                            'outstanding_encumbered' => $result->coutstandingemcumbrances,
                            'total_obligation' => $result->dtotal_oblig_contr_adward,
                            'award_expended' => $result->ectd_award_contract_exp,
                            'award_reserve' => $result->fos_award_contr_reserves,
                            'load_balance' => $result->gos_award_contr_res_load,
                            'remaining_balance' => $result->iremainingbalance
                        );
                    }
                   });
            });

            DB::table('impromptu')->insert($this->toinsert);
        }

        return Redirect::route('funding_sources.index')->with('message', 'Impromptu file imported successfully');
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
