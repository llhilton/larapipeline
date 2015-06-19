<table class="countries">
    <tr>
        @foreach($countries as $country_chunk)
            <td>
                @foreach($country_chunk as $country)
                    {!! Form::checkbox('country[]', $country->id, in_array($country->id, $included_countries)) !!} {{$country->country }} <br>
                @endforeach
            </td>
        @endforeach

    </tr>
</table>