@extends("layouts.app")
@section('title', 'This is the list of tasks')

@section("content")
    <div>
        <a href="{{ route('tasks.create') }}">Add Tasks</a>
    </div>
    @forelse($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['task' => $task->id])}}">{{$task->title}}</a>
        </div>
    @empty
        <div>No Tasks</div>
    @endforelse

    @if($tasks->isNotEmpty())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
