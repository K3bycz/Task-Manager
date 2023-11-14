<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() { // tylko dla zalogowanego uzytkownika
    
    //TASKS 
    Route::resource('tasks', 'TaskController'); //cała pula adresow z prefixem tasks
    Route::get('/', 'TaskController@main');

    Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');

    Route::get('/tasks', 'TaskController@index')->name('tasks.list');

    Route::post('/tasks', 'TaskController@store')->name('tasks.store');

    Route::delete('/tasks/{taskId}', 'TaskController@destroy')->name('tasks.destroy');

    //USERS
    Route::get('/users', 'UserController@userList')->name('users.list');

    Route::get('users/{userId}', 'UserController@show')->name ('get.user.showUser');

    Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user');

    //FILES
    Route::match(['get', 'post'], "/upload", 'FileController@upload')->name('file.upload');
    Route::match(['get', 'post'], "/view", 'FileController@viewAvatar')->name('view.avatar');
});

Auth::routes();


