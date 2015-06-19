
@extends('app')

@section('content')
    <h2>Create Funding Source</h2>

    {!! Form::model(new App\FundingSource, ['route' => ['funding_sources.store']]) !!}
    @include('funding_sources/partials/_form', ['submit_text' => 'Create Funding Source'])
    {!! Form::close() !!}
@endsection