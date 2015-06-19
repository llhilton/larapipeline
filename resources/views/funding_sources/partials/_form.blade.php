<!-- /resources/views/funding_sources/partials/_form.blade.php -->
<div class="form-group">
    {!! Form::label('fiscal_year', 'Fiscal year:') !!}
    {!! Form::text('fiscal_year') !!}
</div>
<div class="form-group">
    {!! Form::label('type_of_funding', 'Type of funding:') !!}
    {!! Form::select('type_of_funding', array('program'=>'Program','impact'=>'Impact'),['class'=>'field']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>
<div class="form-group">
    {!! Form::label('funded', 'Funded:') !!}
    ${!! Form::text('funded') !!}
</div>
<div class="form-group">
    {!! Form::label('spent', 'Spent:') !!}
    ${!! Form::text('spent') !!}
</div>
<div class="form-group">
    {!! Form::label('obligated', 'Obligated:') !!}
    ${!! Form::text('obligated') !!}
</div>
<div class="form-group">
    {!! Form::label('impact_fee', 'Impact Fee:') !!}
    ${!! Form::text('impact_fee') !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>