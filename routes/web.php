<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontController::class, 'post'])->name('post');
Route::get('/detail/{id}', [App\Http\Controllers\FrontController::class, 'detail'])->name('detail');

Route::group(['prefix' => 'backend', 'as' => 'backend.'], function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
    });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
