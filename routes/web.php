<?php


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

Route::get('/{id}/board/{boardId}','Project\ProjectController@index')
    ->middleware('auth')
    ->name('project');
Route::post('/{id}/board/{boardId}','Project\ProjectController@store')
    ->name('project.store');

Route::get('/{id}/board/{todoId}','Todo\ProjectController@index')
    ->middleware('auth')
    ->name('todo');
Route::post('/{id}/board/{todoId}','Todo\ProjectController@store')
    ->name('todo.store');
