<?php


use App\Http\Controllers\GoodController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/register',[UserController::class,'register'])->middleware('guest');

Route::get('/login',[UserController::class,'login'])->middleware('guest')->name('login');

Route::post('/users',[UserController::class,'store'])->middleware('guest');

Route::post('/authenticate',[UserController::class,'authenticate'])->middleware('guest');

Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

Route::get('/', [GoodController::class,'index'])->name('home');

Route::get('/goods/create',[GoodController::class,'create'])->middleware('auth');

Route::get('/goods/{good}/edit',[GoodController::class,'edit'])->middleware('auth');

Route::put('/goods/{good}',[GoodController::class,'update'])->middleware('auth');

Route::post('/goods',[GoodController::class,'store'])->middleware('auth');

Route::get('/goods/{good}',[GoodController::class,'show']);

Route::delete('/goods/{good}',[GoodController::class,'delete'])->middleware('auth');


