<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\TaskController;


// Home page routes
Route::get('/', [HomeController::class , 'home'])->name('user.home');
Route::get('/signup', [HomeController::class , 'signup'])->name('user.signup');
Route::post('/', [HomeController::class , 'store'])->name('user.store');
Route::get('/login', [HomeController::class , 'login'])->name('user.login');
Route::post('/login', [HomeController::class , 'authenticate'])->name('user.authenticate');

// dashboard routes
Route::get('/dashboard/{userId}', [SpaceController::class , 'index'])->name('user.index');
Route::get('/dashboard/{userId}/create', [SpaceController::class , 'create'])->name('space.create');
Route::post('/dashboard/{userId}', [SpaceController::class , 'store'])->name('space.store');
Route::get('/dashboard/{userId}/edit/{spaceId}', [SpaceController::class , 'edit'])->name('space.edit');
Route::put('/dashboard/{userId}/{spaceId}', [SpaceController::class , 'update'])->name('space.update');
Route::delete('/dashboard/{userId}/{spaceId}', [SpaceController::class , 'destroy'])->name('space.destroy');
Route::get('/dashboard/{userId}/search', [SpaceController::class , 'search'])->name('space.search');
Route::get('/dashboard/{userId}/searchTag/{tagId}', [SpaceController::class , 'searchTag'])->name('space.searchTag');
Route::get('/dashboard/{userId}/tag/{tagId}', [SpaceController::class , 'tag'])->name('space.tag');
Route::put('/dashboard/{userId}/pin/{spaceId}', [SpaceController::class , 'pin'])->name('space.pin');
Route::put('/dashboard/{userId}/unpin/{spaceId}', [SpaceController::class , 'unpin'])->name('space.unpin');

// task routes
Route::get('/dashboard/{userId}/{spaceId}', [TaskController::class , 'index'])->name('task.index');
Route::get('/dashboard/{userId}/{spaceId}/create', [TaskController::class , 'create'])->name('task.create');
Route::post("/dashboard/{userId}/{spaceId}", [TaskController::class , 'store'])->name('task.store');
Route::get('/dashboard/{userId}/{spaceId}/edit/{taskId}', [TaskController::class , 'edit'])->name('task.edit');
Route::put('/dashboard/{userId}/{spaceId}/{taskId}', [TaskController::class , 'update'])->name('task.update');
Route::delete('/dashboard/{userId}/{spaceId}/{taskId}', [TaskController::class , 'destroy'])->name('task.destroy');
Route::get('/dashboard/{userId}/{spaceId}/search', [TaskController::class , 'search'])->name('task.search');
Route::put('/dashboard/{userId}/{spaceId}/check/{taskId}', [TaskController::class , 'check'])->name('task.check');
Route::put('/dashboard/{userId}/{spaceId}/uncheck/{taskId}', [TaskController::class , 'uncheck'])->name('task.uncheck');
Route::put('/dashboard/{userId}/{spaceId}/star/{taskId}', [TaskController::class , 'star'])->name('task.star');
Route::put('/dashboard/{userId}/{spaceId}/unstar/{taskId}', [TaskController::class , 'unstar'])->name('task.unstar');
