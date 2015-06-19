
{{--@extends('app')

@section('content')
    <h2>FY{{ $funding_source->fiscal_year}} - {{ $funding_source->type_of_funding }}</h2>

    <table class="summary">
        <tr>
            <th>Funding</t>
            <th>Spent</th>
            <th>Obligated</th>
            <th>Impact fee</th>
            <th>Funds available</th>
            <th>Pipeline</th>
            <th>Free and clear</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>${{ number_format($funding_source->funded,0) }}</td>
            <td>${{ number_format($funding_source->spent,0) }}</td>
            <td>${{ number_format($funding_source->obligated,0) }}</td>
            <td>${{ number_format($funding_source->impact_fee,0) }}</td>
            <td>${!! number_format($funding_source->funded - $funding_source->spent - $funding_source->obligated - $funding_source->impact_fee,0)!!}</td>
            <td></td>
            <td></td>
            <td>
                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('funding_sources.destroy', $funding_source->slug),'onsubmit' => 'return confirm("Are you sure?")')) !!}
                <a href="{{ route('funding_sources.show', $funding_source->slug) }}">{{ $funding_source->funding_source }}</a>  {{ $funding_source->region }}

                {!! link_to_route('funding_sources.edit', 'Edit', array($funding_source->slug), array('class' => 'btn btn-info')) !!}
                {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}

                {!! Form::close() !!}
            </td>
        </tr>


    </table>

    <p>
        {!! link_to_route('funding_sources.index', 'Back to summary') !!}

    </p>
@endsection
}}