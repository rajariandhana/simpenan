<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;




Route::middleware(['guest'])->group(function () {
    Route::get('/register',[RegisteredUserController::class,'create']);
    Route::post('/register',[RegisteredUserController::class,'store']);

    Route::get('/login',[SessionController::class,'create'])->name('login');
    Route::post('/login',[SessionController::class,'store']);
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/', function () {
    //     return view('dashboard');
    // });
    Route::get('/account',function(){
        // return view('account');
    });
    Route::post('/logout',[SessionController::class,'destroy']);

    Route::get('/',[FileController::class,'index'])->name('files.index');
    Route::get('/files/create',[FileController::class,'create']);
    Route::post('/files',[FileController::class,'store'])->name('files.store');
    Route::get('/files/download/{id}', [FileController::class, 'download'])->name('files.download');

    Route::get('/files/{file}',[FileController::class,'show']);
    Route::get('/files/{file}',[FileController::class,'show']);
    Route::get('/files/{file}/edit',[FileController::class,'edit'])
        // ->middleware('auth')
        ->can('edit','file');
    Route::patch('/files/{file}',[FileController::class,'update']);
    Route::delete('/files/{file}',[FileController::class,'destroy']);
});
