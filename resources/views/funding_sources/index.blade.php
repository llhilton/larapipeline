@extends('app')


@section('content')
    <h2>{{ $title }}</h2>

    @if ( !$funding_sources->count() )
        You have no funding_sources
    @else

        <table class="summary">
            <tr>
                <th>Funding Source</th>
                @if ($summary_type=="full")
                    @each('funding_sources/partials/_headings',$funding_sources,'funding_source','')
                @else
                    @each('funding_sources/partials/_CTRheadings',$funding_sources,'funding_source','')
                @endif

                <th>Totals</th>
            </tr>
            <tr>
                <th>Funding</th>
                @each('funding_sources/partials/_funding',$funding_sources,'funding_source','')
                <td>${!! number_format($funding_sources->sum('funded'),0) !!}</td>
            </tr>
            <tr>
                <th>Spent</th>
                @each('funding_sources/partials/_spent',$funding_sources,'funding_source','')
                <td>${!! number_format($funding_sources->sum('spent'),0) !!}</td>
            </tr>
            <tr>
                <th>Obligated</th>
                @each('funding_sources/partials/_obligated',$funding_sources,'funding_source','')
                <td>${!! number_format($funding_sources->sum('obligated'),0) !!}</td>
            </tr>
            <tr>
                <th>Impact Fee</th>
                @each('funding_sources/partials/_impact_fee',$funding_sources,'funding_source','')
                <td>${!! number_format($funding_sources->sum('impact_fee'),0) !!}</td>
            </tr>
            <tr>
                <th>Available Funds</th>
                @each('funding_sources/partials/_available_funds',$funding_sources,'funding_source','')
                <td>${!! number_format($funding_sources->sum('available_funds'),0) !!}</td>
            </tr>
            <tr>
                <th>Pipeline</th>
                @each('funding_sources/partials/_pipeline',$funding_sources,'funding_source','')
                <td>${!! number_format($funding_sources->sum('pipeline'),0) !!}</td>
            </tr>
            <tr>
                <th>Free and Clear</th>
                @each('funding_sources/partials/_free_and_clear',$funding_sources,'funding_source','')
                <td>${!! number_format($funding_sources->sum('free_and_clear'),0) !!}</td>
            </tr>
            @if(Auth::check())
                @if ($summary_type=="full")
                    <tr>
                        <th>Actions</th>
                        @each('funding_sources/partials/_actions',$funding_sources,'funding_source','')
                        <td></td>
                    </tr>
                @endif
            @endif


        </table>

    @endif
    @if(Auth::check())
        <p>
            {!! link_to_route('funding_sources.create', 'Create a funding source') !!}
        </p>
    @endif
@endsection