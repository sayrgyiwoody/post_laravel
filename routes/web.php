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

// Route::get('/',[PostController::class,'create'])->name('admin#home');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PostController::class,'welcome'])->name('welcome');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[PostController::class,'create'])->name('dashboard');

    Route::group(['middleware'=>'post_middleware'],function(){
        Route::post('post/create',[PostController::class,'postCreate'])->name('admin#create');
        Route::get('post/delete/{id}',[PostController::class,'delete'])->name('admin#delete');
        Route::get('post/update/{id}',[PostController::class,'update'])->name('admin#update');
        Route::post('post/updateData/{id}',[PostController::class,'updateData'])->name('admin#updateData');
    });

    //which user can dos
    Route::get('post/viewPage/{id}',[PostController::class,'view'])->name('admin#view');//view all data
    Route::get('admin/home',[PostController::class,'create'])->name('admin#home');//for search bar


});



