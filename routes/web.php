<?php

use App\Admin;

// use App\User;

Route::get('/', function () {return view('welcome');})->name('/');
Route::get('/auto', 'AutoController@auto')->name('auto');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// ROUTING [Authentifier]
// > /user/profile/
// > /user/dashboard/
// > /user/board/

// ADMIN ROUTES----------------
// ----------------------------
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('home');            //TEST >> DO ADMIN THREE
    });
});

// AUTH ROUTES----------------
// ----------------------------
Route::prefix('user')->middleware('auth')->group(function () {
    // DASHBOARD :  Meta View: manage all Todos (my and share)
    Route::get('/dashboard', 'BoardController@index')
        ->name('board');
    Route::post('/dashboard', 'BoardController@store')
        ->name('board.store');
    Route::post('/dashboard/edit/{edit_id}', 'BoardController@update')
        ->where('edit_id', '[0-9]+')
        ->name('board.update');

    Route::get('/profile', 'ProfileController@index')
        ->name('profile');
    Route::post('/profile', 'ProfileController@update')
        ->name('profile.update');

    // Route::prefix('board/{todoId}')->group(function () {
    // Manage Todo
    Route::get('/board/{board_id}', 'TodoController@show')
        ->where('board_id', '[0-9]+')
        ->name('todo');
    Route::post('/board/{board_id}', 'TodoController@store')
        ->where('board_id', '[0-9]+')
        ->name('todo.store');
    Route::post('/board/edit/{board_id}', 'TodoController@store')
        ->where('board_id', '[0-9]+')
        ->name('todo.update');
    // });

    Route::post('/task/{task_id}', 'TaskController@store')
        ->where('task_id', '[0-9]+')
        ->name('task.store');
    Route::post('/task/edit/{task_id}', 'TaskController@update')
        ->where('task_id', '[0-9]+')
        ->name('task.update');

    Route::put('/com/{comment_id}', 'CommentController@store')
     ->where('comment_id', '[0-9]+')
        ->name('comment.store');
    Route::post('/com/edit/{comment_id}', 'CommentController@update')
        ->where('comment_id', '[0-9]+')
        ->name('comment.update');

        // Master D. (pending)
    Route::post('/crud{id}', 'CrudController@destroy')
    ->name('destroy')
    ->where('id', '[0-9]+');

});



// Test User === admin
// Route::middleware('admin')->group(function () {
//     // Page Compte Admin
// });

// use App\Admin;
