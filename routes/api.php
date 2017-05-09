<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/auth/register', 'Auth\AuthController@register');
Route::post('/auth/login', 'Auth\AuthController@login');
Route::get('/games/{game}/export','GamesController@export');
Route::get('/auth/activate', 'Auth\AuthController@activate');
Route::post('/auth/password/recover', 'Auth\PasswordResetController@recover');
Route::post('/auth/password/reset', 'Auth\PasswordResetController@reset');
Route::group(['middleware' => 'auth:api'], function() {
    Route::post('/groups', 'GroupsController@store');
    Route::get('/groups', 'GroupsController@index');
    Route::group(['middleware' => 'verify.group.ownership'], function()
    {
        Route::put('/groups/{group}', 'GroupsController@update');
        Route::delete('/groups/{group}', 'GroupsController@destroy');
        Route::get('/groups/{group}', 'GroupsController@show');
    });

    Route::post('/students', 'StudentsController@store');
    Route::get('/students', 'StudentsController@index');
    Route::group(['middleware' => 'verify.student.ownership'], function()
    {
        Route::put('/students/{student}', 'StudentsController@update');
        Route::delete('/students/{student}', 'StudentsController@destroy');
        Route::get('/students/{student}', 'StudentsController@show');
    });

    Route::group(['middleware' => 'verify.admin.role'], function()
    {
        Route::post('/users', 'UsersController@store');
        Route::get('/users', 'UsersController@index');
        Route::put('/users/{user}', 'UsersController@update');
        Route::delete('/users/{user}', 'UsersController@destroy');
        Route::get('/users/{user}', 'UsersController@show');
    });

    Route::post('/games','GamesController@store');
    Route::get('/games','GamesController@index');
    Route::get('/games/{game}','GamesController@show');
});
