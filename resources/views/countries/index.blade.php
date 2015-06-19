@extends('app')


@section('content')
    <h2>Countries</h2>

    @if ( !$countries->count() )
        You have no countries
    @else
        <ul>
            @foreach( $countries as $country )
                <li>
                    @if(Auth::check())
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('countries.destroy', $country->slug),'onsubmit' => 'return confirm("Are you sure?")')) !!}
                        <a href="{{ route('countries.show', $country->slug) }}">{{ $country->country }}</a> - {{ $country->region }}
                        (
                        {!! link_to_route('countries.edit', 'Edit', array($country->slug), array('class' => 'btn btn-info')) !!},
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        )
                        {!! Form::close() !!}
                    @else
                        <a href="{{ route('countries.show', $country->slug) }}">{{ $country->country }}</a> - {{ $country->region }}
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
    @if(Auth::check())
    <p>
        {!! link_to_route('countries.create', 'Create country') !!}
    </p>
    @endif
@endsection