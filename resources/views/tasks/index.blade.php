@extends('layouts.app')

@section('content')
    <h1>Task Manager</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($tasks->count() > 0)

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titile</th>
                <th scope="col">Priority</th>
                <th scope="col">Status</th>
                <th scope="col">Task Creater</th>
                <th scope="col">Assign User</th>
                <th scope="col">Assign Project</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $key => $task)
            <tr>
                <td scope="row">{{ $key + 1 }}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->priority}}</td>
                <td>{{$task->status}}</td>
                <td>{{$task->user->name}}</td>
                <td>
                    @if($task->assignUserId ==null)
                    <a href="{{ route('assignUser', $task) }}">Assign To User</a>
                    @else
                      {{$task->assignee->name}}
                    @endif
                </td>
                <td>
                    @if($task->project_id ==null)
                    <a href="{{ route('assignProject', $task) }}">Assign To Project</a>
                    @else
                      {{$task->project->name}}
                    @endif
                </td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                    <a href="{{ route('tasks.destroy',$task) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


       
    @else
        <p>No tasks found.</p>
    @endif

@endsection