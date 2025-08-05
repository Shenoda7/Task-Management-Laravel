@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title }}" >

            @error('title')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3" >{{ $task->description }}</textarea>

            @error('description')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea id="long_description" name="long_description" rows="6">{{ $task->long_description }}</textarea>

            @error('long_description')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Update Task</button>
        </div>
    </form>
@endsection
