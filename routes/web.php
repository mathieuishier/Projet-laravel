<?php


use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/board/{boardname}, 'Board\BoardController@index')->middleware('auth')->name('board');

Route::prefix('{id}')->middleware('auth')->group(function () {
    // DASHBOARD :  Meta View: manage all Todos (my and share)
    Route::get('/dashboard', 'Board\BoardController@index')
        ->name('board');
    Route::post('/dashboard', 'Board\BoardController@store')
        ->name('board.store');

    Route::prefix('board/{boardId}')->group(function () {
        // Manage 1 Todo
        Route::get('/', 'Todo\TodoController@index')
            ->name('todo');
        Route::post('/', 'Todo\TodoController@store')
            ->name('todo.store');

        // Manage Tasks
        // Route::get('{todoId}', 'Task\TaskController@index')
        //     ->name('task');
        Route::post('{todoId}', 'Task\TaskController@store')
            ->name('task.store');
        Route::put('{taskId}', 'Comment\CommentController@store')
            ->name('comment.store');
    });

    // Route::get('/profile','Profile\ProfileController@index')
    //     ->name('profile');
    // Route::post('/profile','Profile\ProfileController@store')
    //     ->name('profile.store');
});



// Route::get('/{id}/board/{todoId}', 'Todo\TodoController@index')
//     ->middleware('auth')
//     ->name('todo');
// Route::post('/{id}/board/{todoId}', 'Todo\TodoController@store')
//     ->name('todo.store');

// Route for display the view of profile User
Route::get('/profile', 'ProfileController@index')->name('profile');

// Route for update the view of profile User
Route::post('/profile', 'ProfileController@update')->name('profile.update');

// Route for update the view of profile User
// Route::get('/profile/home', function () {
//     return view('profile.mathieu');
// });
