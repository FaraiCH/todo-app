<x-app-layout>
    @if(!empty($task))
        <p>{{$task->long_description}}</p>
    @endif
</x-app-layout>

