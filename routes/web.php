<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HomeController;
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
    Route::match(['get', 'post'], '/user', 'UserController@index')->name('user');
    Route::match(['get', 'post'], '/users', 'UserController@userList')->name('users.list');
    Route::match(['get', 'post'], '/users/{userId}', 'UserController@show')->name ('get.user.showUser');
    Route::match(['get', 'post'], '/user/update', 'UserController@updateUserAdress')->name('user.update');
    Route::match(['get', 'post'], '/user/upload', 'UserController@uploadAvatar')->name('user.avatarUpload');
    Route::match(['get', 'post'], '/user/updateBio', 'UserController@updateUserBio')->name('user.updateBio');
    Route::match(['get', 'post'], '/showAddress', 'UserController@showAddress')->name('show.address');

    //RESET PASSWORD
    Route::post('/password/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/reset-password', 'Auth\ResetPasswordController@reset')->name('password.update');

    //COMMENTS
    Route::match(['get', 'post'], '/saveComment', 'CommentsController@saveComment')->name('save.comment');
    Route::match(['get', 'post'], '/deleteComment/{commentId}', 'CommentsController@deleteComment')->name('delete.comment');

    //MAILS
    Route::get('/sendMail', 'MailController@sendMail')->name('send.mail');
});

Route::match(['get', 'post'], '/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();


