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
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/board/{boardname}, 'Board\BoardController@index')->middleware('auth')->name('board');
Route::get('/{id}/board','Board\BoardController@index')
    ->middleware('auth')
    ->name('board');
Route::post('/{id}/board','Board\BoardController@store')
    ->name('board.store');

Route::get('/{id}/board/project/{boardId}','Project\ProjectController@index')
    ->middleware('auth')
    ->name('project');
Route::post('/{id}/board/project/{boardId}','Project\ProjectController@store')
    ->name('project.store');

