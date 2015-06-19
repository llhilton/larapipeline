@extends('app')

@section('content')
    <h2>Edit Funding Source</h2>

    {!! Form::model($funding_source, ['method' => 'PATCH', 'route' => ['funding_sources.update', $funding_source->slug]]) !!}
    @include('funding_sources/partials/_form', ['submit_text' => 'Edit Funding Source'])
    {!! Form::close() !!}
@endsection