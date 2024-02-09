<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaldeaController;
use App\Http\Controllers\JokalariaController;

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

Route::get('/taldeak', function () {
    return view('taldeak.index');
});

##TALDEAK
Route::post('/taldeak', [TaldeaController::class,'store'])->name('taldeak');

Route::get('/taldeak',[TaldeaController::class,'index'])->name('taldeak');

Route::get('/taldeak/{id}',[TaldeaController::class,'show'])->name('taldea-edit');

Route::patch('/taldeak/{id}',[TaldeaController::class,'update'])->name('taldea-update');

Route::delete('/taldeak/{id}',[TaldeaController::class,'destroy'])->name('taldea-destroy');

##JOKALARIAK
Route::resource('jokalaria',JokalariaController::class);