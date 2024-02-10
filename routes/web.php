<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Show All Tasks
Route::get('/tasks', function () {
    $tasks = Task::where('id', Auth::user()->id)->get();
    return view('index',[
        'tasks' => $tasks
    ] );
})->middleware(['auth', 'verified'])->name('tasks.index');

// Load create view
Route::view('/tasks/create', 'create')->middleware(['auth', 'verified']);

// Show selected Tasks
Route::get('/tasks/{id}', function ($id) {
    $task = Task::find($id);
    return view('show', ['task' => $task]);
})->middleware(['auth', 'verified'])->name('tasks.show');

// Add CRUD to Task List
Route::post('task/store', [TasksController::class, 'store'])->name('tasks.store');
Route::post('task/update', [TasksController::class, 'update'])->name('tasks.update');
Route::post('task/delete', [TasksController::class, 'delete'])->name('tasks.delete');
