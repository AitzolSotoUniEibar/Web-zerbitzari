<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoreaController;
use App\Http\Controllers\LiburuaController;
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

Route::get('/index',function () {
    return view('app');
});

Route::get('/autoreak',function () {
    return view('autoreak.index');
});

##Autoreak
Route::post('/autoreak', [AutoreaController::class,'store'])->name('autoreak');

Route::get('/autoreak',[AutoreaController::class,'index'])->name('autoreak');

Route::get('/autoreak/{id}',[AutoreaController::class,'show'])->name('autorea-edit');

Route::patch('/autoreak/{id}',[AutoreaController::class,'update'])->name('autorea-update');

Route::delete('/autoreak/{id}',[AutoreaController::class,'destroy'])->name('autorea-destroy');

##Liburuak
Route::resource('liburua',LiburuaController::class);