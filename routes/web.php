<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/register',[RegisteredUserController::class,'create']);
Route::post('/register',[RegisteredUserController::class,'store']);

Route::get('/login',[SessionController::class,'create']);
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);


Route::get('/files',[FileController::class,'index']);
Route::get('/files/create',[FileController::class,'create']);
Route::post('/files',[FileController::class,'store'])->middleware('auth');

Route::get('/files/{file}',[FileController::class,'show']);
Route::get('/files/{file}',[FileController::class,'show']);
Route::get('/files/{file}/edit',[FileController::class,'edit'])
    ->middleware('auth')
    ->can('edit','file');
Route::patch('/files/{file}',[FileController::class,'update']);
Route::delete('/files/{file}',[FileController::class,'destroy']);