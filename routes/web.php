<?php

use App\Task;

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'can:show,App\Task'], function () {
        Route::get('/tasks', function () {
            $token = "TODO";
            $data = [
                "access_token" => $token
            ];
            return view('tasks',$data);
        });
    });

    Route::get('tasks1', function()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    });

    Route::get('/profile/tokens', function () {
        return view('tokens');
    });

    Route::get('users', function () {
        dd(App\User::paginate());
    });
    #adminlte_routes
    Route::get('bootstraplayout', 'BootstraplayoutController@index')->name('bootstraplayout');

    Route::get('flexboxlayout2', 'Flexboxlayout2Controller@index')->name('flexboxlayout2');

    Route::get('flexboxlayout1', 'Flexboxlayout1Controller@index')->name('flexboxlayout1');

    Route::get('flexboxlayout', 'FlexboxlayoutController@index')->name('flexboxlayout');

    Route::get('csstables', 'CsstablesController@index')->name('csstables');

    Route::get('layoutfloat', 'LayoutfloatController@index')->name('layoutfloat');

    Route::get('boxmodel', 'BoxmodelController@index')->name('boxmodel');

    Route::get('float', function () {
        return view('float');
    });

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phpinfo', function () {
    phpinfo();
});