<?php


use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/board/{boardname}, 'Board\BoardController@index')->middleware('auth')->name('board');

Route::prefix('{id}')->middleware('auth')->group(function () {
    Route::get('/board','Board\BoardController@index')
        ->name('board');
    Route::post('/board','Board\BoardController@store')
        ->name('board.store');

    Route::prefix('board')->group(function () {
        Route::get('/{boardId}','Project\ProjectController@index')
            ->name('project');
        Route::post('/{boardId}','Project\ProjectController@store')
            ->name('project.store');
    });

    // Route::get('/profile','Profile\ProfileController@index')
    //     ->name('profile');
    // Route::post('/profile','Profile\ProfileController@store')
    //     ->name('profile.store');
});





Route::get('/{id}/board/{todoId}','Todo\ProjectController@index')
    ->middleware('auth')
    ->name('todo');
Route::post('/{id}/board/{todoId}','Todo\ProjectController@store')
    ->name('todo.store');
