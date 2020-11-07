<?php


use App\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::prefix('{id}')->middleware('auth')->group(function () {
//         // DASHBOARD :  Meta View: manage all Todos (my and share)
//     Route::get('/dashboard', 'Board\BoardController@index')
//         ->name('board');
//     Route::post('/dashboard', 'Board\BoardController@store')
//         ->name('board.store');

//         Route::prefix('board/{boardId}')->group(function () {
//             // Manage 1 Todo
//         Route::get('/', 'Todo\TodoController@index')
//             ->name('todo');
//         Route::post('/', 'Todo\TodoController@store')
//             ->name('todo.store');

//             // Manage Tasks
//         // Route::get('{todoId}', 'Task\TaskController@index')
//         //     ->name('task');
//         Route::post('{todoId}', 'Task\TaskController@store')
//             ->name('task.store');
//         Route::put('{taskId}', 'Comment\CommentController@store')
//             ->name('comment.store');
//     });

//     // Route::get('/profile','Profile\ProfileController@index')
//     //     ->name('profile');
//     // Route::post('/profile','Profile\ProfileController@store')
//     //     ->name('profile.store');
// });




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

    Route::get('/profile','ProfileController@index')
        ->name('profile');
    Route::post('/profile','ProfileController@store')
        ->name('profile.store');

    // Route::prefix('board/{todoId}')->group(function () {
            // Manage 1 Todo
    Route::get('/board/{boardId}', 'TodoController@index')
        ->name('todo');
    Route::post('/board/{boardId}', 'TodoController@store')
        ->name('todo.store');
    // });

    Route::post('/task', 'TaskController@store')
        ->name('task.store');
    Route::put('/com', 'CommentController@store')
        ->name('comment.store');


});








// Route pour afficher la vue contenant le profil
Route::get('/prof', 'ProfController@index')->name('prof');

// Route pour envoyer les informations dans la BDD User
Route::post('/prof', 'ProfController@update')->name('prof.store');

// Route::get('/board/{boardname}, 'Board\BoardController@index')->middleware('auth')->name('board');

// Route::get('/{id}/board/{todoId}', 'Todo\TodoController@index')
//     ->middleware('auth')
//     ->name('todo');
// Route::post('/{id}/board/{todoId}', 'Todo\TodoController@store')
//     ->name('todo.store');
