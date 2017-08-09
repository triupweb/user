<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Skill\User\Http\Controllers'], function()
{
    Route::get('/', 'UserController@index');
});
