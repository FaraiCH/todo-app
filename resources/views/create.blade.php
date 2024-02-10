<x-app-layout>

    @section('title', 'Add Task')

    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
        <input type="text" name="title" id="title">
        <textarea type="text" name="description" id="description"></textarea>
        <textarea type="text" name="long_description" id="long_description"></textarea>
        <button class="btn btn-primary" type="submit">Send</button>
    </form>

</x-app-layout>
