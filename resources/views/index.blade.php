@extends("layouts.app")
@section('title', 'My Tasks')

@section("content")
    <div class="card">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">My Tasks</h2>
                <p class="text-gray-600 mt-1">Manage and organize your daily tasks</p>
            </div>
            <a href="{{ route('tasks.create') }}" class="btn-primary">
                <i class="fas fa-plus mr-2"></i>Add New Task
            </a>
        </div>

        @if($tasks->isNotEmpty())
            <div class="space-y-4">
                @foreach($tasks as $task)
                    <div class="task-item">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        @if($task->completed)
                                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                        @else
                                            <i class="fas fa-circle text-gray-300 text-xl"></i>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <a href="{{route('tasks.show', ['task' => $task->id])}}"
                                           class="block text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors duration-200 {{ $task->completed ? 'line-through text-gray-500' : '' }}">
                                            {{$task->title}}
                                        </a>
                                        @if($task->description)
                                            <p class="text-gray-600 mt-1 text-sm line-clamp-2">
                                                {{ Str::limit($task->description, 100) }}
                                            </p>
                                        @endif
                                        <div class="flex items-center space-x-4 mt-2 text-xs text-gray-500">
                                            <span>
                                                <i class="fas fa-clock mr-1"></i>
                                                {{ $task->created_at->diffForHumans() }}
                                            </span>
                                            <span class="status-badge {{ $task->completed ? 'status-completed' : 'status-pending' }}">
                                                {{ $task->completed ? 'Completed' : 'Pending' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 ml-4">
                                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                                   class="text-blue-600 hover:text-blue-800 transition-colors duration-200"
                                   title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                                   class="text-gray-600 hover:text-blue-600 transition-colors duration-200"
                                   title="Edit Task">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($tasks->hasPages())
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <nav>
                        {{ $tasks->links() }}
                    </nav>
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-tasks text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No tasks yet</h3>
                <p class="text-gray-600 mb-6">Get started by creating your first task</p>
                <a href="{{ route('tasks.create') }}" class="btn-primary">
                    <i class="fas fa-plus mr-2"></i>Create Your First Task
                </a>
            </div>
        @endif
    </div>
@endsection
