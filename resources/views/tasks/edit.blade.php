@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}" class="form-control" required>
                <label for="priority">Priority:</label>
                <select class="form-control" id="priority" name="priority">
                    <option value="low" {{ $task->priority === 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>High</option>
                </select>
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            <label for="description">Description</label>
            <textarea  name="description" id="description" class="form-control"> </textarea>
        </div>

        <!-- Add other fields if needed -->

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection