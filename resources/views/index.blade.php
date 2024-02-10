
<x-app-layout>
    <h1>Task List</h1>

    @foreach($tasks as $task)
        <p><a href="/tasks/{{$task->id}}" target="_blank">{{$task->description}}</a></p>
    @endforeach
</x-app-layout>
