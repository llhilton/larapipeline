
@extends('app')

@section('content')
    <h2>Upload an Impromptu file</h2>

    {!! Form::model(new App\Impromptu, ['route' => ['impromptu.store'],'files' => true]) !!}
    <div class="form-group">
    {!! Form::file('impromptu') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Upload file', ['class'=>'btn primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection