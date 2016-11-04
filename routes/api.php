<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function () {
    Route::resource('task' , 'TasksController');
    Route::resource('user' , 'UsersController');
});



//Route::resource('user' , 'UsersController');
//Route::resource('user.tag','UserTasksController');