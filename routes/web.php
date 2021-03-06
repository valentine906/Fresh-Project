<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
	// $article = App\Models\Article::latest()->get();     //take(2)->get();  //  all();
	// return $article;
    return view('about',[
    	'articles'=> App\Models\Article::take(20)->latest()->get()
    ]);
});

Route::get('/articles','ArticleController@index')->name('articles.index');;

Route::post('/articles','ArticleController@store');

Route::get('/articles/create','ArticleController@create');

Route::get('/articles/{article}','ArticleController@show')->name('articles.show');

Route::get('/articles/{article}/edit','ArticleController@edit');

Route::put('/articles/{article}','ArticleController@update');


