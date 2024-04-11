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
Route::get('/dashboard/{userId}/tag/{tagId}', [SpaceController::class , 'tag'])->name('space.tag');
