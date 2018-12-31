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

// Using Middleware to Restrict Access 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Register new user
Route::post('register', 'Auth\RegisterController@register');

// Login/Authenticate user
Route::post('login', 'Auth\LoginController@login');

// Logout User
Route::post('logout', 'Auth\LoginController@logout');


Route::group(['middleware' => 'auth:api'], function() { 

    // get all articles
    Route::get('articles', 'ArticleController@index');

    // get a single article 
    Route::get('articles/{article}', 'ArticleController@show');

    // create new article 
    Route::post('articles', 'ArticleController@store');

    // update an article 
    Route::put('articles/{article}', 'ArticleController@update');

    // delete an article 
    Route::delete('articles/{article}', 'ArticleController@destory');

});
