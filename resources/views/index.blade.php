@extends("layouts.app")
@section('title', 'This is the list of tasks')

@section("content")
    @forelse($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['id' => $task->id])}}">{{$task->title}}</a>
        </div>
    @empty
        <div>No Tasks</div>
    @endforelse
@endsection
