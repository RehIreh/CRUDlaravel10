<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

Route::middleware(['guest'])->group(function(){
  Route::get('/',[SesiController::class,'index'])->name('login');
  Route::post('/',[SesiController::class,'login']);
});


Route::middleware(['auth'])->group(function(){
    Route::resource('admin',AdminController::class)->middleware('userAkses:admin');
    Route::resource('mahasiswa',MahasiswaController::class)->middleware('userAkses:mahasiswa');
    Route::get('/logout',[SesiController::class,'logout']);
    Route::get('/home',[DefaultController::class,'home']);
});




