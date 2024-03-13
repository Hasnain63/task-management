@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('assignToUser', $task->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" readonly class="form-control" value="{{ $task->title }}" required>

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