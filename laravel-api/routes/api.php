<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Article;
use App\Http\Controllers\ArticleController;

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

Route::get('articles',function(){
    return Article::all();
});

Route::get('articles/{id}',function($id){
    return Article::find($id);
});

Route::post('articles', function(Request $request) {
    $data = $request->all();
        return Article::create([
            'title' => $data['title'],
            'body' => $data['body'],
        ]);
});

Route::put('articles/{id}', function(Request $request,$id) {
    $article = Article::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('articles/{id}', function($id) {
    Article::find($id)->delete();
    return 204;
});


Route::get('articles',function(){
    return Article::all();
});

/*Route::get('articles','ArticleController@index');
Route::get('articles/{article}','ArticleController@show');
Route::post('articles','ArticleController@store');
Route::put('articles/{article}','ArticleController@update');
Route::delete('articles/{article}','ArticleController@delete');*/