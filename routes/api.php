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

Route::get('/constituencies', [
    'uses' => 'ProjectsController@getConstituencies'
]);
Route::get('/constituency/{id}/projects', [
    'uses' => 'ProjectsController@getProjectsByConstituency'
]);
Route::get('/wards', [
    'uses' => 'WardController@all'
]);
Route::get('/departments', [
    'uses' => 'ProjectsController@getDepartments'
]);
Route::get('/departments/{id}/projects', [
    'uses' => 'ProjectsController@getProjectsByDepartment'
]);
Route::get('/photos', [
    'uses' => 'ProjectsController@getPhotos'
]);
Route::get('/projects', [
    'uses' => 'ProjectsController@getProjects'
]);
Route::get('/projects/{id}', [
    'uses' => 'ProjectsController@getProjectById'
]);
Route::post('/feedback', [
    'uses' => 'ProjectsController@sendFeedback'
])->middleware('cors');
//For Charts
Route::get('/count/',[
    'as' => 'count',
    'uses' => 'PdfController@count'
])->middleware('cors');

Route::get('/projects/completed',[
    'as' => 'projects.completed',
    'uses' => 'PdfController@completed'
])->middleware('cors');

Route::get('/projects/ongoing',[
    'as' => 'projects.ongoing',
    'uses' => 'PdfController@ongoing'
])->middleware('cors');

Route::get('/chart-data/',[
    'as' => 'chart-data',
    'uses' => 'PdfController@chartData'
])->middleware('cors');

Route::get('constituencies/{id}/wards',[
    'as' => 'wards',
    'uses' => 'WardController@getByConstituency'
])->middleware('cors');