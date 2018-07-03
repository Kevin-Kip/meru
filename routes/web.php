<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', [
    'as' => 'projects.home',
    'uses' => 'ProjectControllerWeb@index'
]);

//Projects
Route::get('/projects', [
    'as' => 'projects.all',
    'uses' => 'ProjectControllerWeb@fetchAll'
]);
Route::get('/projects/{id}', [
    'as' => 'project.one',
    'uses' => 'ProjectControllerWeb@show'
]);
Route::get('admin/projects/create', [
    'as' => 'project.create',
    'uses' => 'ProjectControllerWeb@create'
]);
Route::post('admin/projects/create', [
    'as' => 'project.save',
    'uses' => 'ProjectControllerWeb@store'
]);
Route::delete('/projects/{id}', [
    'as' => 'project.delete',
    'uses' => 'ProjectControllerWeb@destroy'
]);
Route::put('/projects/{id}', [
    'as' => 'project.edit',
    'uses' => 'WebProjectsController@update'
]);
Route::get('/projects/constituency/{id}',[
    'as' => 'projects.constituency',
    'uses' => 'ProjectControllerWeb@byConstituency'
]);
//Users
Route::get('/admin/people',[
    'as' => 'users.all',
    'uses' => 'UserController@index'
]);
Route::get('/auth/login',[
    'as' => 'user.showlogin',
    'uses' => 'UserController@create'
]);
Route::post('/auth/login/',[
    'as' => 'user.signin',
    'uses' => 'UserController@loguserin',
    'middleware' => 'guest'
]);
Route::post('/logout', [
   Auth::logout()
]);
Route::get('/users/dashboard',[
   'as' => 'users.home',
   'uses' => 'ManagerController@userDashboard'
]);
Route::get('/users/projects',[
    'as' => 'users.projects',
    'uses' => 'ManagerController@userProjects'
]);
Route::get('/users/constituencies',[
    'as' => 'users.constituencies',
    'uses' => 'ManagerController@userConstituencies'
]);
Route::get('/users/messages',[
    'as' => 'users.messages',
    'uses' => 'ManagerController@userMessages'
]);
/*admin panel*/
Route::get('/users/admin', [
   'as' => 'admin.home',
   'uses' => 'ManagerController@index'
]);
Route::get('/admin/messages', [
   'as' => 'messages.all',
   'uses' => 'MessageController@index'
]);
Route::get('/users/logout', [
   'as' => 'users.logout',
   'uses' => 'UserController@logOut'
]);
Route::get('/admin/projects', [
    'as' => 'admin.projects',
    'uses' => 'ProjectControllerWeb@showForAdmin'
]);
Route::delete('/admin/messages/{id}/delete', [
    'as' => 'message.delete',
    'uses' => 'MessageController@destroy'
]);
Route::get('/admin/constituencies',[
   'as' => 'constituencies.all',
   'uses' => 'ManagerController@showConstituencies'
]);
/*admin panel*/
Route::get('/contact', [
   'as' => 'message.create',
   'uses' => 'MessageController@create'
]);

Route::post('/contact/', [
   'as' => 'message.save',
   'uses' => 'MessageController@store'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
