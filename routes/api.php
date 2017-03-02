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

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function($api)
{
    $api->group(['namespace'=>'App\Http\Controllers', 'middleware' => 'cors'], function($api)
    {
        $api->post('/auth/register', 'Auth\AuthController@register');
        $api->post('/auth/login', 'Auth\AuthController@login');
        $api->get('/auth/activate', 'Auth\AuthController@activate');
        $api->post('/auth/password/recover', 'Auth\PasswordResetController@recover');
        $api->post('/auth/password/reset', 'Auth\PasswordResetController@reset');
        $api->group(['middleware' => 'auth:api'], function($api) {
            $api->post('/groups', 'GroupsController@store');
            $api->get('/groups', 'GroupsController@index');
            $api->group(['middleware' => 'verify.group.ownership'], function($api)
            {
                $api->put('/groups/{groupId}', 'GroupsController@update');
                $api->delete('/groups/{groupId}', 'GroupsController@destroy');
                $api->get('/groups/{groupId}', 'GroupsController@show');
            });

            $api->post('/students', 'StudentsController@store');
            $api->get('/students', 'StudentsController@index');
            $api->group(['middleware' => 'verify.student.ownership'], function($api)
            {
                $api->put('/students/{studentId}', 'StudentsController@update');
                $api->delete('/students/{studentId}', 'StudentsController@destroy');
                $api->get('/students/{studentId}', 'StudentsController@show');
            });

            $api->post('/games','GamesController@store');
            $api->get('/games/{gameId}','GamesController@show');
        });
    });
});

$exceptionHandler = app('Dingo\Api\Exception\Handler');

$exceptionHandler->register(function (AuthenticationException $exception) {
    throw new UnauthorizedHttpException($exception->getMessage(), "Invalid token");
});