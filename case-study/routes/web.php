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
})->name('/');

Route::get('/users',[UsersController::class,'users'])->name('users');

Route::post("/checkin", [UsersController::class, 'checkin'])->name("checkin")->middleware('signed');

Route::get("/logged",[UsersController::class, 'logged'])->name("logged");

Route::post("/checkout",[UsersController::class, 'checkout'])->name("checkout");

Route::get('{slug}',function(){
    return view('welcome');
});