
@extends('app')

@section('content')
    <h2>Upload a Watson file</h2>
    <div class="form-group">
    {!! Form::model(new App\Watson, ['route' => ['watson.store'],'files' => true]) !!}

    {!! Form::file('watson') !!}



    </div>

    <div class="form-group">
        {!! Form::submit('Upload file', ['class'=>'btn primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection