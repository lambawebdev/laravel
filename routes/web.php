<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
/**
 * GET /articles (index)
 * GET /articles/create (create)
 * GET /articles/1 (show)
 * POST /articles (store)
 * GET /articles/1/edit (edit)
 * PATCH /articles/1 (update)
 * DELETE /articles/1 (destroy)
*/

Route::get('/statistics', 'App\Http\Controllers\StatisticsController@index')->name('statistics');


Route::get('/articles/tags/{tag}', 'App\Http\Controllers\TagsController@index')->name('articles.tags');
Route::get('/news/tags/{tag}', 'App\Http\Controllers\TagsController@news')->name('news.tags');


Route::resource('/articles', 'App\Http\Controllers\ArticlesController')->names([
    'create' => 'articles.create',
    'store' => 'articles.store',
    'show' =>'articles.article',
    'index' =>'articles',
]);

Route::get('/about', 'App\Http\Controllers\ArticlesController@about')->name('about');
Route::get('/contacts', 'App\Http\Controllers\ContactsController@index')->name('contacts');
Route::post('/contacts', 'App\Http\Controllers\ContactsController@store')->name('contacts');
Route::get('/admin/feedback', 'App\Http\Controllers\ContactsController@show')->name('admin.feedback')->middleware('auth');
Route::get('/admin/articles', 'App\Http\Controllers\ContactsController@articles')->name('admin.articles')->middleware('auth');
Route::get('/admin/news', 'App\Http\Controllers\ContactsController@news')->name('admin.news')->middleware('auth');
Route::get('/admin/news/{news}/edit', 'App\Http\Controllers\ContactsController@newsEdit')->name('admin.news.edit');
Route::patch('/admin/news/{news}', 'App\Http\Controllers\ContactsController@newsUpdate')->name('admin.news.update');
Route::delete('/admin/news/{news}', 'App\Http\Controllers\ContactsController@newsDestroy')->name('admin.news.delete');

Route::post('/articles/{article}/comments', 'App\Http\Controllers\ArticleCommentsController@store')->name('article.comments');
Route::post('/news/{news}/comments', 'App\Http\Controllers\NewsCommentsController@store')->name('news.comments');


Route::post('/articles/{article}/steps', 'App\Http\Controllers\ArticleStepsController@store');
Route::post('/completed-steps/{step}', 'App\Http\Controllers\CompletedStepsController@store');
Route::delete('/completed-steps/{step}', 'App\Http\Controllers\CompletedStepsController@destroy');

Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('news');
Route::get('/news/create', 'App\Http\Controllers\NewsController@create')->name('news.create');
Route::get('/news/{news}', 'App\Http\Controllers\NewsController@show')->name('news.news');
Route::post('/news/store', 'App\Http\Controllers\NewsController@store')->name('news.store');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::get('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.request');