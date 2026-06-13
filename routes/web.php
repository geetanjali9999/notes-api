<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\COntrollers\NoteController;


Route::get('/', function () {
    return redirect('/login');
});

//show login page
Route::get('/login',[AuthController::class,'showlogin'])->name('login');
// show register page
Route::get('/register',[AuthController::class,'showregister'])->name('register');

// process login
Route::post('/login',[AuthController::class,'login'])->name('login');
// process register
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::middleware('auth')->group(function(){
    Route::get('/notes',[NoteController::class,'index'])->name('notes');
    Route::get('/notes/{id}',[NoteController::class,'show'])->name('notes.show');
    Route::post('/notes/create',[NoteController::class,'store'])->name('notes.create');
    Route::get('/notes/{id}/edit',[NoteController::class,'update'])->name('notes.edit');
    Route::post('/notes/{id}/delete',[NoteController::class,'destroy'])->name('notes.delete');
});
