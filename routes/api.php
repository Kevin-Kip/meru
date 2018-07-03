<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/projects', [
    'as' => 'projects.all',
    'uses' => 'ProjectsController@getProjects'
]);

Route::post('/projects/create', [
    'as' => 'projects.create',
    'uses' => 'ProjectsController@createProject'
]);

Route::put('/projects/{id}', [
    'as' => 'projects.update',
    'uses' => 'ProjectsController@updateProject'
]);

Route::get('/projects/{id}',[
    'as' => 'projects.one',
    'uses' => 'ProjectsController@getProjectById'
]);

Route::delete('/projects/{id}',[
    'as' => 'projects.delete',
    'uses' => 'ProjectsController@deleteProject'
]);
