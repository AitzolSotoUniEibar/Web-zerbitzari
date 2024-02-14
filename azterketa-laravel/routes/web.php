<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YateController;
use App\Http\Controllers\AlokairuaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/yateak', function () {
    return view('yateak.index');
});

Route::post('/yateak', [YateController::class,'store'])->name('yateak');
Route::get('/yateak',[YateController::class,'index'])->name('yateak');
Route::get('/yateak/{id}',[YateController::class,'show'])->name('yateak-edit');
Route::patch('/yateak/{id}',[YateController::class,'update'])->name('yateak-update');

Route::resource('alokairua',AlokairuaController::class);