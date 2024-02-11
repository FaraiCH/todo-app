<x-app-layout>
    @if(!empty($task))

    @endif
        <!-- Task List Container -->
<div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    <div class="max-w-xl w-full bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold mb-4">Task Details</h1>
        <!-- Task Details -->
        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Task Title:</h2>
            <p class="text-gray-800">{{$task->title}}</p>
        </div>
        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Task Description:</h2>
            <p class="text-gray-800">{{$task->description}}</p>
        </div>
        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Due Date:</h2>
            <p class="text-gray-800">{{$task->long_description}}</p>
        </div>
        <!-- Buttons -->
        <div class="flex justify-end">
            <a href="/tasks/edit/{{$task->id}}" target="_blank" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded mr-2">Edit</a>
            <form method="POST" action="/task/delete/{{$task->id}}">
                @csrf
                @method('post')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded mr-2">Delete</button>
            </form>
            <a href="/dashboard" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded">Cancel</a>
        </div>
    </div>
</div>

</x-app-layout>

