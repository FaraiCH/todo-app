<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        //Validate Data input
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required'
        ]);

        // Store data into new Task Model Object
        $task = new Task();
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->admin_id = Auth::user()->id;
        $task->save();

        // Redirect to main page
        return redirect(route('tasks.index'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
