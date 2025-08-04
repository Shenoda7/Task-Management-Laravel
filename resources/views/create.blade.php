@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" >

            @error('title')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="3" >{{ old('description') }}</textarea>

            @error('description')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea id="long_description" name="long_description" rows="6">{{ old('long_description') }}</textarea>

            @error('long_description')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Create Task</button>
        </div>
    </form>
@endsection
