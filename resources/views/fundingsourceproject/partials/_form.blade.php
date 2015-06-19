
@foreach($fundingsources as $fundingsource)

    <div class="form-group">
        FY{{ $fundingsource->fiscal_year }} {{ $fundingsource->type_of_funding }} {!! Form::label('amount', 'amount:') !!}
        @if (isset($included_funding[$fundingsource->id]))
            ${!! Form::text($fundingsource->id,$included_funding[$fundingsource->id]) !!}
            @else
            ${!! Form::text($fundingsource->id) !!}
            @endif
    </div>

@endforeach