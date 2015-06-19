
@extends('app')

@section('content')
    <h2>Create Country</h2>

    {!! Form::model(new App\Country, ['route' => ['countries.store']]) !!}
    @include('countries/partials/_form', ['submit_text' => 'Create Country'])
    {!! Form::close() !!}
@endsection