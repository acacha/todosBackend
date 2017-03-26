<?php

Route::group(['prefix' => 'v1','middleware' => ['cors','auth:api']], function () {
    Route::resource('task', 'TasksController');
    Route::resource('users', 'UsersController');
    Route::resource('users.task', 'UserTasksController');
    Route::get('/user', function () {
        return Auth::user();
    });

    Route::post('/user/gcmtoken', 'GcmTokensController@addToken');

    Route::get('/user/messages', 'MessagesController@fetchMessages');

});

