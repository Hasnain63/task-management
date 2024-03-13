@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('assignToProject', $task->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" readonly class="form-control" value="{{ $task->title }}" required>

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