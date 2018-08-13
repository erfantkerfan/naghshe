<?php

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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/','ArticleController@home')->name('home');
Route::get('/Aategory/{id}','CategoryController@index')->name('category');
Route::get('/Article/{id}','ArticleController@index')->name('article');
Route::get('/About','Controller@about')->name('about');

Route::middleware(['auth'])->group(function () {
    Route::get('/category/create','CategoryController@form')->name('category_form');
    Route::post('/category/create','CategoryController@create')->name('category_create');
    Route::get('/category/delete/{id}','CategoryController@delete')->name('category_delete');
    Route::get('/category/clearHits/{id}','CategoryController@clear_hits')->name('category_hits');
    Route::get('/article/create','ArticleController@form')->name('article_form');
    Route::post('/article/create','ArticleController@create')->name('article_create');
    Route::get('/article/delete/{id}','ArticleController@delete')->name('article_delete');
    Route::get('/article/clearHits/{id}','ArticleController@clear_hits')->name('article_hits');
    Route::get('/user/assistant/OnOff','Controller@assistant')->name('assistant');
});
