<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::any("/", function () {
    return view('welcome');
});

Route::get('/users',[UsersController::class,'users']);

Route::post("/log", [UsersController::class, 'log']);

Route::get("/logged",[UsersController::class, 'logged']);

Route::post("/checkout",[UsersController::class, 'checkout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{slug}',function(){
    return view('welcome');
});