<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('yateak', [YateController::class, 'index_api'])->name('yateak');
Route::get('yateak/{id}', [YateController::class, 'show_api'])->name('yateak/{id}');
Route::delete('yateak/{id}', [YateController::class, 'delete'])->name('yateak/{id}');