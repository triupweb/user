<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Triup\User\Http\Controllers'], function()
{
    Route::get('/', 'UserController@index');
});
