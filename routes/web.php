<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\logInContoller;
use App\Http\Controllers\memberController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/logIn', [logInContoller::class, 'logIn']);

Route::get('/members', [memberController::class, 'index']);
Route::put('/members/{id}', [memberController::class, 'update']);
Route::delete('/members/{id}', [memberController::class, 'destroy']);


Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');
Route::post('/coaches', [CoachController::class, 'store'])->name('coaches.store');
Route::put('/coaches/{id}', [CoachController::class, 'update'])->name('coaches.update');
Route::delete('/coaches/{id}', [CoachController::class, 'destroy'])->name('coaches.destroy');
