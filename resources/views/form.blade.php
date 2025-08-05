@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
          method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title ?? old('title') }}">

            @error('title')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"
                      rows="3">{{ $task->description ?? old('description') }}</textarea>

            @error('description')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea id="long_description" name="long_description"
                      rows="6">{{ $task->long_description ?? old('long_description') }}</textarea>

            @error('long_description')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">
                @isset($task)
                    Create Task
                @else
                    Update Task
                @endisset
            </button>
        </div>
    </form>
@endsection
