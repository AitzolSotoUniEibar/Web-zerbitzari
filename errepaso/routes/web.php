<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DjController;
use App\Http\Controllers\KantuaController;

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

Route::get('/dj', function () {
    return view('dj.index');
});

##DJ
Route::post('/dj', [DjController::class,'store'])->name('dj');

Route::get('/dj',[DjController::class,'index'])->name('dj');

Route::get('/dj/{id}',[DjController::class,'show'])->name('dj-edit');

Route::patch('/dj/{id}',[DjController::class,'update'])->name('dj-update');

Route::delete('/dj/{id}',[DjController::class,'destroy'])->name('dj-destroy');

##KANTUA
Route::resource('kantua',KantuaController::class);