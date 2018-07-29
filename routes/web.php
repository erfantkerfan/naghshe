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

Auth::routes();

Route::get('/','ArticleController@home');
Route::get('/Category/{id}','CategoryController@index');
Route::get('/Article/{id}','ArticleController@index');
Route::get('/About','Controller@about');

//Route::middleware(['auth'])->group(function () {
    Route::post('/Category/Create','CategoryController@create');
    Route::get('/Category/Delete/{id}','CategoryController@delete');

    Route::post('/Article/Create','ArticleController@create');
    Route::post('/Article/Delete/{id}','ArticleController@delete');
    Route::post('/Article/Hits/Clear/{id}','ArticleController@clear_hits');
//});

