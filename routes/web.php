<?php


use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/board/{boardname}, 'Board\BoardController@index')->middleware('auth')->name('board');

Route::prefix('{id}')->middleware('auth')->group(function () {
        // DASHBOARD : Meta View: all(my and share) & Create
    Route::get('/dashboards', 'Board\BoardController@index')
        ->name('board');
    Route::post('/dashboards', 'Board\BoardController@store')
        ->name('board.store');

        // View 1 & Set Tasks
    Route::prefix('board')->group(function () {
        Route::get('/{boardId}', 'Project\ProjectController@index')
            ->name('project');
        Route::post('/{boardId}', 'Project\ProjectController@store')
            ->name('project.store');

            // Create & Set Task
        Route::get('{todoId}', 'Todo\ProjectController@index')
            ->name('todo');
        Route::post('{todoId}', 'Todo\ProjectController@store')
            ->name('todo.store');
    });

    // Route::get('/profile','Profile\ProfileController@index')
    //     ->name('profile');
    // Route::post('/profile','Profile\ProfileController@store')
    //     ->name('profile.store');
});



// Route::get('/{id}/board/{todoId}', 'Todo\ProjectController@index')
//     ->middleware('auth')
//     ->name('todo');
// Route::post('/{id}/board/{todoId}', 'Todo\ProjectController@store')
//     ->name('todo.store');

// Route pour afficher la vue contenant le profil
Route::get('/prof', 'ProfController@index')->name('prof');

// Route pour envoyer les informations dans la BDD User
Route::post('/prof', 'ProfController@update')->name('prof.store');
