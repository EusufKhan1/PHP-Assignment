@extends('layouts.app')

@section('content')
    <h1>To-Do List</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary">Create New To-Do</a>

    <ul class="list-group mt-3">
        @foreach ($todos as $todo)
            <li class="list-group-item">
                <strong>{{ $todo->title }}</strong> 
                <span class="badge badge-secondary">{{ $todo->completed ? 'Completed' : 'Pending' }}</span>
                <div>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
