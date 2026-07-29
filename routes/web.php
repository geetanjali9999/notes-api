<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\COntrollers\NoteController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return redirect('/login');
});

//show login page
Route::get('/login',[AuthController::class,'showlogin'])->name('login');
// show register page
Route::get('/register',[AuthController::class,'showregister'])->name('register');

// process login for web
Route::post('/login',[AuthController::class,'weblogin'])->name('login.submit');
// Route::post('login', [AuthController::class, 'login']);


// process register for web
Route::post('/register',[AuthController::class,'webregister'])->name('register.submit');

// logout route
Route::post('/logout', [AuthController::class, 'weblogout'])->name('logout');

Route::get('/index', function () {
    return view('index');
})->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/notes',[NoteController::class,'index'])->name('notes');
    // Route::post('/notes/create',[NoteController::class,'store'])->name('notes.create');
    Route::get('/notes/create', [NoteController::class,'create'])->name('notes.create');
    Route::post('/notes/create', [NoteController::class,'store'])->name('notes.store');
    Route::get('/notes/{id}',[NoteController::class,'show'])->name('notes.show'); // check any specfic nte by id
    Route::put('/notes/{id}/edit',[NoteController::class,'update'])->name('notes.edit');
    // Route::post('/notes/{id}/delete',[NoteController::class,'destroy'])->name('notes.delete');
    Route::delete('/notes/{id}/delete', [NoteController::class,'destroy'])
    ->name('notes.delete');
});

