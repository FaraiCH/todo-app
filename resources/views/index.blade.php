
<x-app-layout>

        <div class="max-w-2xl mx-auto">
            <!-- Task List Container -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Task List Header -->
                <div class="bg-gray-200 px-4 py-2 border-b border-gray-300">
                    <h2 class="text-lg font-semibold text-gray-800">Task List</h2>
                </div>
                <!-- Task List Items -->
                <ul class="divide-y divide-gray-300">
                    <!-- Sample Task Item -->
                    @foreach($tasks as $task)
                        <li class="flex items-center justify-between px-4 py-3">
                            <span class="text-gray-800"><a href="/tasks/{{$task->id}}" >{{$task->title}} &nbsp;<span class="px-2 py-1 bg-green-200 text-green-700 text-xs font-semibold rounded-full">view</span></a></span>
                            <div class="flex space-x-2">
                                <!-- Task Status Indicator -->

                                <a href="{{route('tasks.edit', $task->id)}}" class="px-2 py-1 bg-blue-200 text-blue-700 text-xs font-semibold rounded-full">Edit</a>
                                <!-- Delete Task Button -->
                                <form method="POST" action="/task/delete/{{$task->id}}">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="px-2 py-1 bg-red-200 text-red-800 text-xs font-semibold rounded-full">Delete</button>
                                </form>

                            </div>
                        </li>
                    @endforeach
                </ul>
                <!-- Add Task Button -->
                <div class="bg-gray-200 px-4 py-3 border-t border-gray-300">
                    <a href="/tasks/create" class="px-4 py-2 bg-blue-500 text-white text-sm font-semibold rounded-full hover:bg-blue-600">Add Task</a>
                </div>
            </div>
        </div>

</x-app-layout>
