<?php namespace App\Http\Controllers;

use Input;
use PhpParser\Node\Expr\Cast\Object_;
use Redirect;
use App\Project;
use App\FundingSource;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;

class FundingSourceController extends Controller {

    //validation rules for adding sources
    protected $newrules = [
        'fiscal_year' => ['required', 'min:2'],
        'type_of_funding' => ['required','in:program,impact'],
        'slug' => ['required', 'unique:funding_sources,slug'],
        'funded'=>['required', 'numeric'],
        'spent'=>['required', 'numeric'],
        'obligated'=>['required', 'numeric'],
        'impact_fee'=>['numeric'],
    ];

    //validation rules for editing
    protected $updaterules = [
        'fiscal_year' => ['required', 'min:2'],
        'type_of_funding' => ['required','in:program,impact'],
        'slug' => ['required'],
        'funded' => ['required', 'numeric'],
        'spent' => ['required', 'numeric'],
        'obligated' => ['required', 'numeric'],
        'impact_fee' => ['numeric'],
    ];

    //protected $title, $i, $funded_total, $spent_total, $obligated_total, $impact_fee_total, $totals_array, $fiscal_year_sources, $fiscal_years, $new_item;

    /**
     * Display the CTR version of the summary page
     */
    public function CTRindex(Collection $collection){
        //Select the data, doing the sums as we go
        $funding_sources=DB::table('funding_sources as f')
            ->select(array('f.fiscal_year as fiscal_year', DB::raw('sum(f.funded) as funded, sum(f.spent) as spent, sum(f.obligated) as obligated, sum(f.impact_fee) as impact_fee, sum(f.funded - f.spent - f.obligated - f.impact_fee) as available_funds, sum(ifnull(p.amount,0)) as pipeline, sum(f.funded - f.spent - f.obligated - f.impact_fee - ifnull(p.amount,0)) as free_and_clear')))
            ->leftJoin('funding_source_project as p', 'f.id', '=', 'p.funding_source_id')
            ->groupBy('f.fiscal_year')
            ->get();
        //Turn the results into a collection
        //print_r($funding_sources);
        $funding_sources=$collection->make($funding_sources);
        //var_dump($funding_sources->all());
        //die;
        $title="CTR Summary";
        $summary_type="CTR";
        return view('funding_sources.index', compact('funding_sources', 'title','summary_type'));
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $funding_sources = FundingSource::all();
        //Get the available funds and add them to the collection
        $funding_sources->each(function($funding_source) {
            $funding_source->available_funds = $funding_source->funded - $funding_source->spent - $funding_source->obligated - $funding_source->impact_fee;
            $sum=0;
            foreach($funding_source->projects as $project){
                $sum+=$project->pivot->amount;
            }
            $funding_source->pipeline = $sum;
            $funding_source->free_and_clear = $funding_source->available_funds - $funding_source->pipeline;
        });

        $title="Full Summary";
       $summary_type="full";
        return view('funding_sources.index', compact('funding_sources','title','summary_type'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(FundingSource $funding_source)
	{
		return view('funding_sources.create',compact('funding_source'));
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
        FundingSource::create( $input );

        return Redirect::route('funding_sources.index')->with('message', 'Funding source created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(FundingSource $funding_source)
	{
		return view('funding_sources.show', compact('funding_source'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(FundingSource $funding_source)
	{
        return view('funding_sources.edit', compact('funding_source'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(FundingSource $funding_source,Request $request)
	{
        $this->validate($request, $this->updaterules);
        $input = array_except(Input::all(), '_method');
        $funding_source->update($input);

        return Redirect::route('funding_sources.index', $funding_source->slug)->with('message', 'Funding source updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(FundingSource $funding_source)
	{
        $funding_source->delete();

        return Redirect::route('funding_sources.index')->with('message', 'Funding source deleted.');
	}

}
