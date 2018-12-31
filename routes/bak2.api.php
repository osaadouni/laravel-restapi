<?php

use App\Article;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// get all articles
Route::get('articles', 'ArticleController@index');

// get a single article 
Route::get('articles/{id}', 'ArticleController@show');

// create new article 
Route::post('articles', 'ArticleController@store');

// update an article 
Route::put('articles/{id}', 'ArticleController@update');

// delete an article 
Route::delete('articles/{id}', 'ArticleController@destory');
