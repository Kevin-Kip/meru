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
Route::delete('admin/projects/{id}/delete', [
    'as' => 'project.delete',
    'uses' => 'ProjectControllerWeb@destroy'
]);
Route::put('admin/projects/{id}/edit', [
    'as' => 'project.edit',
    'uses' => 'WebProjectsController@update'
]);
Route::get('projects/constituency/{id}',[
    'as' => 'projects.constituency',
    'uses' => 'ProjectControllerWeb@byConstituency'
]);
Route::get('projects/category/{id}',[
    'as' => 'projects.category',
    'uses' => 'ProjectControllerWeb@byCategory'
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
Route::get('/users/people/new', [
   'as' => 'user.create',
   'uses' => 'UserController@newUser'
]);
Route::post('/users/people/new', [
    'as' => 'user.save',
    'uses' => 'UserController@store'
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
Route::post('/admin/projects/{id}/delete', [
    'as' => 'project.delete',
    'uses' => 'ProjectControllerWeb@destroy'
]);
Route::get('/admin/projects/{id}/edit', [
    'as' => 'project.edit',
    'uses' => 'ProjectControllerWeb@edit'
]);
Route::post('/admin/projects/{id}/edit', [
    'as' => 'project.update',
    'uses' => 'ProjectControllerWeb@update'
]);
Route::post('/admin/messages/{id}/delete', [
    'as' => 'message.delete',
    'uses' => 'MessageController@destroy'
]);
Route::post('/admin/people/{id}/delete',[
    'as' => 'user.delete',
    'uses' => 'UserController@destroy'
]);
Route::get('/admin/people/{id}/edit',[
    'as' => 'user.edit',
    'uses' => 'UserController@edit'
]);
Route::post('/admin/people/{id}/edit',[
    'as' => 'user.update',
    'uses' => 'UserController@update'
]);
Route::get('/admin/constituencies',[
   'as' => 'constituencies.all',
   'uses' => 'ManagerController@showConstituencies'
]);
Route::get('/admin/constituencies/new', [
   'as' => 'constituency.create',
   'uses' => 'ManagerController@create'
]);
Route::post('/admin/constituencies/new', [
    'as' => 'constituency.save',
    'uses' => 'ManagerController@store'
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

//get pdf TODO
Route::get('/report',[
    'as' => 'projects.report',
   'uses' => 'PdfController@index'
]);
Route::get('/count',[
    'as' => 'count.all',
    'uses' => 'PdfController@count'
]);
Route::get('/count/ongoing',[
    'as' => 'count.ongoing',
    'uses' => 'PdfController@ongoing'
]);

Route::get('/constituencies',[
   'as' => 'constituencies.all',
'uses' => 'ManagerController@showConstituencies'
//   'uses' => 'WardController@constituencies' TODO
]);
//counts
