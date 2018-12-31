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
Route::get('articles', function() { 
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Articles::all();
});

// get a single article 
Route::get('articles/{id}', function($id) { 
    return Article::find($id);
});


// create new article 
Route::post('articles', function(Request $request) { 
    return Article::create($request->all());
});

// update an article 
Route::put('articles/{id}', function(Request $request, $id) { 
    $article = Article::findOrFail($id);
    $article->update($request->all());

    return $article;
});


// delete an article 
Route::delete('articles/{id}', function($id) { 
    Article::find($id)->delete();

    return 204;
});
