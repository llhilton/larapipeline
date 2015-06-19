@extends('app')

@section('content')
    <h2>Edit Country</h2>

    {!! Form::model($country, ['method' => 'PATCH', 'route' => ['countries.update', $country->slug]]) !!}
    @include('countries/partials/_form', ['submit_text' => 'Edit Country'])
    {!! Form::close() !!}
@endsection