<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('notes', [NoteController::class, 'index']);
    Route::get('notes/{id?}', [NoteController::class, 'show']);
    Route::put('notes/{id}', [NoteController::class, 'update']);
    Route::post('notes', [NoteController::class, 'store']);
    Route::delete('notes/{id}', [NoteController::class, 'destroy']);
});
// Route::apiResource('notes', NoteController::class); //for at one bease url for api
// Route::get('notes', [NoteController::class, 'index']);
// Route::get('notes/{id?}', [NoteController::class, 'show']);
// Route::put('notes/{id}', [NoteController::class, 'update']);
// Route::post('notes', [NoteController::class, 'store']);
// Route::delete('notes/{id}', [NoteController::class, 'destroy']);

