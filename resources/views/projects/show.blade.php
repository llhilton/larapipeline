@extends('app')

@section('content')
    <h2>{{ $project->name }}</h2>
    <p>
        @if ($project->task_number<>'')
            Task number: {{ $project->task_number }}<br>
        @endif
        @if ($project->unique_identifier<>'')
            Unique identifier: {{ $project->unique_identifier }} <br>
        @endif
        @if ($project->notes<>'')
            Notes: {{ $project->notes }} <br>
        @endif
    </p>
    @if ( !$project->countries->count() )
        <p>Your project has no countries.</p>
    @else
        <h3>Countries</h3>
        <ul>
            @foreach( $project->countries as $country )
                <li>
                     <a href="{{ route('countries.show', [$country->slug]) }}">{{ $country->country }}</a> - {{ $country->region }}

                </li>
            @endforeach
        </ul>
    @endif

    @if ( !$project->funding_sources->count() )
        <p>Your project has no future funding sources.</p>
    @else
        <h3>Future funding</h3>
        <ul>
            @foreach ($project->funding_sources as $funding_source)
                <li>
                    FY{{ $funding_source->fiscal_year }} {{$funding_source->type_of_funding}} - ${{ number_format($funding_source->pivot->amount,2) }}
                </li>
            @endforeach
        </ul>
    @endif

    @if ( !$project->short_award_numbers->count() )
        <p>Your project has no Watson entries.</p>
    @else
        <h3>Watson Entries</h3>
        <table class="projects">
            <tr>
                <th>Short Award Number</th>
                <th>Title</th>
                <th>Budget</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            @foreach ($watson_entries as $entries)
                @foreach ($entries as $value)
                    <tr>
                        <td> {{$value->short_award_number}}  </td>
                        <td> {{$value->name}}  </td>
                        <td> ${{ number_format($value->budget,2) }}  </td>
                        <td> {{$value->status}}  </td>
                        <td> {{ date('F d, Y', strtotime($value->start_date)) }}  </td>
                        <td> {{ date('F d, Y', strtotime($value->end_date)) }}  </td>
                    </tr>
                @endforeach
            @endforeach
        </table>
        <h3>Impromptu Entries</h3>
        <table class="summary">
            <tr>
                <th>Project String</th>
                <th>Agency Funded</th>
                <th>Expended</th>
                <th>Outstanding Encumbered</th>
                <th>Total Obligation</th>
                <th>Award Expended</th>
                <th>Award Reserve</th>
                <th>Load Balance</th>
                <th>Remaining Balance</th>
            </tr>
            @foreach ($impromptu_entries as $entries)
                @foreach ($entries as $value)
                    <tr>
                        <td>{{ $value->project_string }}</td>
                        <td>${{ number_format($value->agency_funded,2) }}</td>
                        <td>${{ number_format($value->expended,2) }}</td>
                        <td>${{ number_format($value->outstanding_encumbered,2) }}</td>
                        <td>${{ number_format($value->total_obligation,2) }}</td>
                        <td>${{ number_format($value->award_expended,2) }}</td>
                        <td>${{ number_format($value->award_reserve,2) }}</td>
                        <td>${{ number_format($value->load_balance,2) }}</td>
                        <td>${{ number_format($value->remaining_balance,2) }}</td>
                    </tr>
                @endforeach
            @endforeach


        </table>
    @endif


        <p>
            @if(Auth::check())
                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug),'onsubmit' => 'return confirm("Are you sure?")')) !!}
                {!! link_to_route('projects.edit', 'Edit', array($project->slug), array('class' => 'btn btn-info')) !!} {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endif
            {!! link_to_route('projects.index', 'Back to Projects') !!}
        </p>

@endsection