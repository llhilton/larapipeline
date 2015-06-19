<!-- /resources/views/projects/partials/_form.blade.php -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country') !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>
<div class="form-group">
    {!! Form::label('region', 'Region:') !!}
    {!! Form::select('region',$regions) !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>