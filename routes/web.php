<?php


use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// > /admin/... (soon implementation) [Role admin]


// ROUTING [Authentifier]
// > /user/profile/
// > /user/dashboard/
// > /user/board/


Route::prefix('user')->middleware('auth')->group(function () {
    // DASHBOARD :  Meta View: manage all Todos (my and share)
    Route::get('/dashboard', 'BoardController@index')
        ->name('board');
    Route::post('/dashboard', 'BoardController@store')
        ->name('board.store');

    Route::get('/try', 'ProfileController@index')
        ->name('profile');
    Route::post('/profile', 'ProfileController@update')
        ->name('profile.update');

    // Route::prefix('board/{todoId}')->group(function () {
    // Manage 1 Todo
    Route::get('/board/{boardId}', 'TodoController@index')
        ->name('todo');
    Route::post('/board/{boardId}', 'TodoController@store')
        ->name('todo.store');
    // });

    Route::post('/task/{taskid}', 'TaskController@store')
        ->name('task.store');
    Route::put('/com/{commentId}', 'CommentController@store')
        ->name('comment.store');
});

// Route for update the view of profile User
// Route::post('/profile', 'ProfileController@update')->name('profile.update');
