<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use \App\Http\Controllers\TasksController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$tasks = Task::all();
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Show All Tasks
Route::get('/tasks', function () use ($tasks) {
    return view('index',[
        'tasks' => $tasks
    ] );
})->name('tasks.index');

// Load create view
Route::view('/tasks/create', 'create');

// Show selected Tasks
Route::get('/tasks/{id}', function ($id) {
    $task = Task::find($id);
    return view('show', ['task' => $task]);
})->name('tasks.show');


Route::post('task/store', [TasksController::class, 'store'])->name('tasks.store');
Route::post('task/update', [TasksController::class, 'update'])->name('tasks.update');
Route::post('task/delete', [TasksController::class, 'delete'])->name('tasks.delete');
