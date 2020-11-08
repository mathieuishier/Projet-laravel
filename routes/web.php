<?php

use App\Admin;

// use App\User;

Route::get('/', function () {
    return view('welcome');
});

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

    // PROFILE : View & Edit
    Route::get('/profile', 'ProfileController@index')
        ->name('profile');
    Route::post('/profile', 'ProfileController@update')
        ->name('profile.update');

    // Route::prefix('board/{todoId}')->group(function () {
    // Manage Todo
    Route::get('/board/{board_id}', 'TodoController@show')
        ->name('todo')
        ->where('board_id', '[0-9]+');
    Route::post('/board/{board_id}', 'TodoController@store')
        ->name('todo.store')
        ->where('board_id', '[0-9]+');
    // });

    Route::post('/task/{task_id}', 'TaskController@store')
        ->name('task.store');                                   //  ->where('task_id', '[0-9]+'); '[A-Za-z]+'
    Route::put('/com/{comment_id}', 'CommentController@store')
        ->name('comment.store');                                //  ->where('comment_id', '[0-9]+'); '[A-Za-z]+'
});



// Test User === admin
// Route::middleware('admin')->group(function () {
//     // Page Compte Admin
// });

// use App\Admin;
