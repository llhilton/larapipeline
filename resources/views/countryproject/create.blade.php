{{--
@extends('app')

@section('content')
    <h2>
        Add/edit countries for {!! link_to_route('projects.show', $project->name, [$project->slug]) !!}
    </h2>

    {!! Form::model(new App\Project, ['route' => ['projects.countryproject.store', $project->slug], 'class'=>'']) !!}

    @include('countryproject/partials/_form', ['submit_text' => 'Update'])
    <div class="form-group">
        {!! Form::submit('Add/edit countries', ['class'=>'btn primary']) !!}
    </div>

    {!! Form::close() !!}

    <p>{!! link_to_route('countries.create', 'Create country') !!}</p>

@endsection
--}}