{{--
@extends('app')

@section('content')
    <h2>
        Add/edit funding for {!! link_to_route('projects.show', $project->name, [$project->slug]) !!}
    </h2>

    {!! Form::model(new App\Project, ['route' => ['projects.fundingsourceproject.store', $project->slug], 'class'=>'']) !!}

    @include('fundingsourceproject/partials/_form', ['submit_text' => 'Add/update'])
    <div class="form-group">
        {!! Form::submit('Add/update funding', ['class'=>'btn primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection
--}}