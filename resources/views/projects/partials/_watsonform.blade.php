<table class="countries">
    <tr>
        @foreach($watson_projects as $watson_chunk)
            <td>
                @foreach($watson_chunk as $value)
                    {!! Form::checkbox('watson[]', $value->short_award_number, in_array($value->short_award_number, $included_short_award_numbers)) !!} {{ $value->short_award_number }} - {{ $value->name }}  <br>
                @endforeach
            </td>
        @endforeach

    </tr>
</table>