@extends('layouts.app')

@section('content')
    <h1>Projects list with their tasks </h1>
    @if ($projects->count() > 0)

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Tasks</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($projects as $key => $project)
            <tr>
                <td scope="row">{{ $key + 1 }}</td>
                <td>{{$project->name}}</td>
                <td>
                    @if($project->tasks)
                        @foreach ($project->tasks as $key => $task)
                        {{$task->title ?? ''}}
                        @endforeach
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


       
    @else
        <p>No tasks found.</p>
    @endif

@endsection