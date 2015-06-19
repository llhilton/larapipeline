<td>{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('funding_sources.destroy', $funding_source->slug),'onsubmit' => 'return confirm("Are you sure?")')) !!}
    <a href="{{ route('funding_sources.show', $funding_source->slug) }}">{{ $funding_source->funding_source }}</a>
    {!! link_to_route('funding_sources.edit', 'Edit', array($funding_source->slug), array('class' => 'btn btn-info')) !!}<br>

    {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}

    {!! Form::close() !!}</td>