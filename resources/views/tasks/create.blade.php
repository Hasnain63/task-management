@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
                <label for="priority">Priority:</label>
                <select class="form-control" id="priority" name="priority">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Complete</option>
                </select>
            <label for="description">Description</label>
            <textarea  name="description" id="description" class="form-control"> </textarea>
        </div>

        <!-- Add other fields if needed -->

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection