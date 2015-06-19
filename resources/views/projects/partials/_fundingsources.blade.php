<td>$
    @foreach ($project->funding_sources as $funding_source)
        {{ $funding_source->pivot->amount }}
        {{--<li>
            FY{{ $funding_source->fiscal_year }} {{$funding_source->type_of_funding}} - ${{ number_format($funding_source->pivot->amount,2) }}
        </li> --}}
    @endforeach
</td>