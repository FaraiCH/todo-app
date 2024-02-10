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
    return redirect()->route('tasks.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Show All Tasks
    Route::get('/tasks', function () {
        $tasks = Task::where('admin_id', Auth::user()->id)->get();
        return view('index',[
            'tasks' => $tasks
        ] );
    })->name('tasks.index');

// Load create view
    Route::view('/tasks/create', 'create');

    Route::get('/tasks/edit/{id}', function ($id){
        $task = Task::where('id', $id)->where('admin_id', Auth::user()->id)->first();
        if(!empty($task))
            return view('upated', ['task' => $task]);
        else
            return 'does not exist';
    })->name('tasks.edit');

// Show selected Tasks
    Route::get('/tasks/{id}', function ($id) {
        $task = Task::where('id', $id)->where('admin_id', Auth::user()->id)->first();
        if(!empty($task))
            return view('show', ['task' => $task]);
        else
            return 'does not exist';
    })->name('tasks.show');

// Add CRUD to Task List
    Route::post('task/store', [TasksController::class, 'store'])->name('tasks.store');
    Route::post('task/update/{id}', [TasksController::class, 'update'])->name('tasks.update');
    Route::post('task/delete/{id}', [TasksController::class, 'destroy'])->name('tasks.delete');
});

require __DIR__.'/auth.php';


