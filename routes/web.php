<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function() {
    return view('welcome');
})->name('index');

/**
 * GET /articles (index)
 * GET /articles/create (create)
 * GET /articles/1 (show)
 * POST /articles (store)
 * GET /articles/1/edit (edit)
 * PATCH /articles/1 (update)
 * DELETE /articles/1 (destroy)
*/


Route::resource('/articles', 'App\Http\Controllers\ArticlesController')->names([
    'create' => 'articles.create',
    'store' => 'articles.store',
    'show' =>'articles.article',
    'index' =>'articles',
]);

/*Route::get('/articles', 'App\Http\Controllers\ArticlesController@index')->name('articles');
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show');
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store')->name('articles');
Route::get('/articles/{article}/edit','App\Http\Controllers\ArticlesController@edit')->name('articles.edit');
Route::patch('/articles/{article}', 'App\Http\Controllers\ArticlesController@update')->name('articles.id');
Route::delete('/articles/{article}', 'App\Http\Controllers\ArticlesController@destroy')->name('articles.article');
*/
Route::get('/about', 'App\Http\Controllers\ArticlesController@about');
Route::get('/contacts', 'App\Http\Controllers\ContactsController@index')->name('contacts');
Route::post('/contacts', 'App\Http\Controllers\ContactsController@store')->name('contacts');
Route::get('/admin/feedback', 'App\Http\Controllers\ContactsController@show');