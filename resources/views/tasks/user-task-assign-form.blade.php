@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('taskAssignToUser') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="task_id"> Select Task</label>
            <select class="form-control" id="task_id" name="task_id">
                @foreach ($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->title }}</option>
                @endforeach
            </select>
            <label for="user">Select User:</label>
            <select class="form-control" id="user" name="user">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Add other fields if needed -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection