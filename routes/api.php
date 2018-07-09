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

//TODO import routes for api

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

//For Charts
Route::get('/count/',[
    'as' => 'count',
    'uses' => 'PdfController@count'
])->middleware('cors');
Route::get('/count/completed',[
    'as' => 'count.completed',
    'uses' => 'PdfController@completed'
])->middleware('cors');
Route::get('/chart-data/',[
    'as' => 'chart-data',
    'uses' => 'PdfController@chartData'
])->middleware('cors');
Route::get('constituencies/{id}/wards',[
    'as' => 'wards',
    'uses' => 'WardController@getById'
])->middleware('cors');