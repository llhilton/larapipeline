
@extends('app')

@section('content')
    <h2>Create Project</h2>

    {!! Form::model(new App\Project, ['route' => ['projects.store']]) !!}
    <h3>Project information</h3>
    @include('projects/partials/_form', ['submit_text' => 'Create Project'])

    <h3>Funding</h3>
    @include('fundingsourceproject/partials/_form')

    <h3>Countries</h3>
    @include('countryproject/partials/_form')

    <h3>Watson Projects</h3>
    @include('projects/partials/_watsonform')

    <div class="form-group">
        {!! Form::submit('Create project', ['class'=>'btn primary']) !!}
    </div>

    {!! Form::close() !!}
    @endsection