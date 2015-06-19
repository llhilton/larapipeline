<!-- /resources/views/projects/partials/_form.blade.php -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>
<div class="form-group">
    {!! Form::label('task_number', 'Task Number:') !!}
    {!! Form::text('task_number') !!}
</div>
<div class="form-group">
    {!! Form::label('unique_identifier', 'Unique ID:') !!}
    {!! Form::text('unique_identifier') !!}
</div>
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::textarea('notes') !!}
</div>
