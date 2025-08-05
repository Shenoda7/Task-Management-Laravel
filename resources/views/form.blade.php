@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create New Task')

@section('content')
    <div class="card">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">
                {{ isset($task) ? 'Edit Task' : 'Create New Task' }}
            </h2>
            <p class="text-gray-600">
                {{ isset($task) ? 'Update your task details below.' : 'Fill in the details to create a new task.' }}
            </p>
        </div>

        <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
              method="POST" class="space-y-6">
            @csrf
            @isset($task)
                @method('PUT')
            @endisset

            <div>
                <label for="title" class="flex items-center">
                    <i class="fas fa-heading mr-2 text-gray-500"></i>
                    Task Title
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ $task->title ?? old('title') }}"
                       placeholder="Enter task title..."
                       @class(['border-red-500 focus:ring-red-500 focus:border-red-500' => $errors->has('title')])>

                @error('title')
                    <div class="error">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="description" class="flex items-center">
                    <i class="fas fa-align-left mr-2 text-gray-500"></i>
                    Description
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="3"
                          placeholder="Brief description of your task..."
                          @class(['border-red-500 focus:ring-red-500 focus:border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description') }}</textarea>

                @error('description')
                    <div class="error">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="long_description" class="flex items-center">
                    <i class="fas fa-file-alt mr-2 text-gray-500"></i>
                    Detailed Description
                    <span class="text-gray-400 text-xs ml-2">(Optional)</span>
                </label>
                <textarea id="long_description" 
                          name="long_description" 
                          rows="6"
                          placeholder="Add more detailed information about your task..."
                          @class(['border-red-500 focus:ring-red-500 focus:border-red-500' => $errors->has('long_description')])>{{ $task->long_description ?? old('long_description') }}</textarea>

                @error('long_description')
                    <div class="error">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex items-center space-x-4 pt-6 border-t border-gray-200">
                <button type="submit" class="btn-primary">
                    <i class="fas {{ isset($task) ? 'fa-save' : 'fa-plus' }} mr-2"></i>
                    {{ isset($task) ? 'Update Task' : 'Create Task' }}
                </button>
                
                <a href="{{ route('tasks.index') }}" class="btn-secondary">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
