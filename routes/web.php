<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Görev işlemleri için oluşturuldu
Route::middleware(['auth'])->group(function () {
    Route::get('myTask',[TaskController::class,'myTask'])->name('my.task');
    Route::get('completed/{task}',[TaskController::class,'completed'])->name('task.completed');
    Route::resource('tasks', TaskController::class);
});
Route::get('dashboard',[TaskController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
