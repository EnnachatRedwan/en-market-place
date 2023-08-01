<?php


use App\Http\Controllers\GoodController;
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

Route::get('/', [GoodController::class,'index'])->name('home');

Route::get('/goods/create',[GoodController::class,'create']);

Route::get('/goods/{good}/edit',[GoodController::class,'edit']);

Route::put('/goods/{good}',[GoodController::class,'update']);

Route::post('/goods',[GoodController::class,'store']);

Route::get('/goods/{good}',[GoodController::class,'show']);

