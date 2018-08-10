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
Route::get('/Category/{id}','CategoryController@index')->name('category');
Route::get('/Article/{id}','ArticleController@index')->name('article');
Route::get('/About','Controller@about')->name('about');

Route::middleware(['auth'])->group(function () {
    Route::post('/Category/Create','CategoryController@create');#
    Route::get('/Category/Delete/{id}','CategoryController@delete');#link
    Route::get('/Category/ClearHits/{id}','CategoryController@clear_hits');#link
    Route::post('/Article/Create','ArticleController@create');#
    Route::get('/Article/Delete/{id}','ArticleController@delete');#link
    Route::get('/Article/ClearHits/{id}','ArticleController@clear_hits');#link
    Route::get('/User/Assistant/OnOff','Controller@assistant')->name('assistant');
});