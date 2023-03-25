<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PostController::class,'create'])->name('user#home');


Route::get('user/home',[PostController::class,'create'])->name('user#createPage');


Route::post('post/create',[PostController::class,'postCreate'])->name('user#create');


Route::get('post/delete/{id}',[PostController::class,'delete'])->name('user#delete');


Route::get('post/update/{id}',[PostController::class,'update'])->name('user#update');

Route::post('post/updateData/{id}',[PostController::class,'updateData'])->name('user#updateData');


Route::get('post/viewPage/{id}',[PostController::class,'view'])->name('user#view');
