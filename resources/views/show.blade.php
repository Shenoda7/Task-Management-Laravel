@extends("layouts.app")

@section('title', $task->title)

@section('content')
    <div class="mb-6">
        <a href="{{ route('tasks.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Tasks
        </a>
    </div>

    <div class="card">
        <div class="flex items-start justify-between mb-6">
            <div class="flex-1">
                <div class="flex items-center space-x-3 mb-4">
                    @if($task->completed)
                        <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                    @else
                        <i class="fas fa-circle text-gray-300 text-2xl"></i>
                    @endif
                    <h1 class="text-3xl font-bold text-gray-900 {{ $task->completed ? 'line-through text-gray-500' : '' }}">
                        {{ $task->title }}
                    </h1>
                </div>
                
                <div class="flex items-center space-x-4 mb-6">
                    <span class="status-badge {{ $task->completed ? 'status-completed' : 'status-pending' }}">
                        <i class="fas {{ $task->completed ? 'fa-check' : 'fa-clock' }} mr-1"></i>
                        {{ $task->completed ? 'Completed' : 'Pending' }}
                    </span>
                    <span class="text-sm text-gray-500">
                        <i class="fas fa-calendar mr-1"></i>
                        Created {{ $task->created_at->diffForHumans() }}
                    </span>
                    @if($task->updated_at != $task->created_at)
                        <span class="text-sm text-gray-500">
                            <i class="fas fa-edit mr-1"></i>
                            Updated {{ $task->updated_at->diffForHumans() }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        @if($task->description)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
                <p class="text-gray-700 leading-relaxed">{{ $task->description }}</p>
            </div>
        @endif

        @if($task->long_description)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Detailed Description</h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $task->long_description }}</p>
                </div>
            </div>
        @endif

        <div class="flex items-center space-x-3 pt-6 border-t border-gray-200">
            <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn-secondary">
                <i class="fas fa-edit mr-2"></i>Edit Task
            </a>

            <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST" class="inline">
                @csrf
                @method('PUT')
                <button type="submit" class="{{ $task->completed ? 'btn-secondary' : 'btn-success' }}">
                    <i class="fas {{ $task->completed ? 'fa-undo' : 'fa-check' }} mr-2"></i>
                    Mark as {{ $task->completed ? 'Not Completed' : 'Completed' }}
                </button>
            </form>

            <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" class="inline" 
                  onsubmit="return confirm('Are you sure you want to delete this task?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash mr-2"></i>Delete Task
                </button>
            </form>
        </div>
    </div>
@endsection
