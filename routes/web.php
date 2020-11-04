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
// Route::get('/home', function(){
//     dd(User::all());
// });

// Route::get('/form', 'Form\FormController@form')->middleware('auth')->name('form');
// Route::post('/form', 'Form\FormController@store')->name('store');

Route::get('/board', 'Board\BoardController@index')->middleware('auth')->name('board');
Route::post('/board', 'Board\BoardController@store')->name('board.store');

// Route::get('/{id}/board','Board\BoardController@index')
//     ->middleware('auth')
//     ->name('board');
// Route::post('/{id}/board','Board\BoardController@store')
//     ->name('board.store');

Route::get('/board/{boardname}, 'Board\BoardController@index')->middleware('auth')->name('board');
