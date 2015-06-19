@extends('app')

@section('content')
    <h2>@if (isset($region))
            {{ $region }}
    @else
            Projects
    @endif</h2>



    @if ( !$projects->count() )
        You have no projects

    @else

    <table class="projects">
        <tr>
            <th>Project</th>

            @foreach($fundingsources as $fundingsource)
                <th>FY{{ $fundingsource->fiscal_year }} {{$fundingsource->type_of_funding}}</th>
            @endforeach

            @if(Auth::check())
                <th>Actions</th>
            @endif

        </tr>
        @foreach( $projects as $project )
            <tr>

                <td>
                    <a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a>

                    @if ($project->unique_identifier<>'')
                       <br> {{ $project->unique_identifier }}
                    @endif
                    @if ($project->task_number<>'')
                        <br> Task number: {{ $project->task_number }}
                    @endif
                </td>

                @foreach($fundingsources as $fundingsource)
                    @if (isset($pfunding_array[$project->id][$fundingsource->id]))
                        <td> ${{ number_format($pfunding_array[$project->id][$fundingsource->id][$fundingsource->id],2) }} </td>
                    @else
                        <td></td>
                    @endif
                @endforeach
                @if(Auth::check())
                    <td>
                        {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug),'onsubmit' => 'return confirm("Are you sure?")')) !!}
                        {!! link_to_route('projects.edit', 'Edit', array($project->slug), array('class' => 'btn btn-info')) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
                @endif

            </tr>
        @endforeach
    </table>
@endif
@if(Auth::check())
<h4>
    {!! link_to_route('projects.create', 'Create Project') !!}
</h4>
@endif
@endsection