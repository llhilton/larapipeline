@extends('app')

@section('content')
    <h2>{{ $country->country}} - {{ $country->region }}</h2>

    @if ( !$country->projects->count() )
        Your country has no projects.
    @else
        <h3>Projects</h3>
        <ul>
            @foreach( $country->projects as $cproject )
                <li>
                    <a href="{{ route('projects.show', [$cproject->slug]) }}">{{ $cproject->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
    @if(Auth::check())
        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('countries.destroy', $country->slug),'onsubmit' => 'return confirm("Are you sure?")')) !!}
        <p>{!! link_to_route('countries.edit', 'Edit', array($country->slug), array('class' => 'btn btn-info')) !!}</p>
        <p>{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}</p>

        {!! Form::close() !!}
    @endif
    <p>
        {!! link_to_route('countries.index', 'Back to Countries') !!}
    </p>
@endsection