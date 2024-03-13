@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('assignTaskToProject') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
        <label for="task_id"> Select Task</label>
            <select class="form-control" id="task_id" name="task_id">
                @foreach ($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->title }}</option>
                @endforeach
            </select>

            <label for="project_id">Select User:</label>
            <select class="form-control" id="project_id" name="project_id">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Add other fields if needed -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection