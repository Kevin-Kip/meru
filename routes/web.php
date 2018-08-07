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
])->middleware('web');
Route::post('/logout', [
   Auth::logout()
]);

Route::get('/sign-out', [
   'as' => 'user.signout',
   'uses' => 'UserController@logOut'
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

Route::get('admin/report',[
    'as' => 'admin.report',
   'uses' => 'PdfController@showForAdmin'
]);
Route::get('/count',[
    'as' => 'count.all',
    'uses' => 'PdfController@count'
]);
Route::get('/count/ongoing',[
    'as' => 'count.ongoing',
    'uses' => 'PdfController@ongoing'
]);

Route::get('/admin/departments', [
   'as' => 'departments.all',
   'uses' => 'DepartmentController@index'
]);

Route::get('/admin/departments/create', [
    'as' => 'department.create',
    'uses' => 'DepartmentController@create'
]);

Route::post('/admin/departments/create', [
    'as' => 'department.save',
    'uses' => 'DepartmentController@store'
]);

Route::get('/admin/departments/{id}/edit', [
    'as' => 'department.edit',
    'uses' => 'DepartmentController@edit'
]);

Route::post('/admin/departments/{id}/edit', [
    'as' => 'department.update',
    'uses' => 'DepartmentController@update'
]);

Route::post('/admin/departments/{id}/delete', [
    'as' => 'department.delete',
    'uses' => 'DepartmentController@destroy'
]);

Route::get('/admin/messages/{id}/reply', [
    'as' => 'message.reply',
    'uses' => 'MessageController@showReply'
]);

Route::post('/admin/messages/{id}/reply', [
    'as' => 'message.respond',
    'uses' => 'MessageController@sendReply'
]);

Route::get('/admin/constituencies/new', [
   'as' => 'constituency.create',
   'uses' => 'ConstituencyController@create'
]);

Route::post('/admin/constituencies/new', [
    'as' => 'constituency.save',
    'uses' => 'ConstituencyController@store'
]);

Route::get('/admin/constituencies/{id}/edit', [
    'as' => 'constituency.edit',
    'uses' => 'ConstituencyController@edit'
]);

Route::post('/admin/constituencies/{id}/edit', [
    'as' => 'constituency.update',
    'uses' => 'ConstituencyController@update'
]);

Route::get('/admin/constituencies/{id}/delete', [
   'as' => 'constituency.delete',
    'uses' => 'ConstituencyController@destroy'
]);

Route::get('/admin/wards/new', [
    'as' => 'ward.create',
    'uses' => 'WardController@create'
]);

Route::post('/admin/wards/new', [
    'as' => 'ward.save',
    'uses' => 'WardController@store'
]);

Route::get('/admin/wards', [
   'as' => 'wards.all',
   'uses' => 'WardController@index'
]);

Route::get('/admin/wards/{id}/edit', [
    'as' => 'ward.edit',
    'uses' => 'WardController@edit'
]);

Route::post('/admin/wards/{id}/edit', [
    'as' => 'ward.update',
    'uses' => 'WardController@update'
]);

Route::get('/admin/wards/{id}/delete', [
    'as' => 'ward.delete',
    'uses' => 'WardController@delete'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reports/download', [
    'as' => 'report.download',
    'uses' => 'PdfController@index'
]);

Route::get('/reports/download/ongoing', [
    'as' => 'report.download',
    'uses' => 'PdfController@reportOngoing'
]);

Route::get('/reports/download/completed', [
    'as' => 'report.download',
    'uses' => 'PdfController@reportComplete'
]);

Route::get('/users/reports', [
    'as' => 'users.report',
    'uses' => 'PdfController@showForUsers'
]);

//Finance
Route::get('/users/finance', [
    'as' => 'finance.home',
    'uses' => 'FinanceController@goHome'
]);
Route::get('/users/finance/{id}/pay', [
    'as' => 'finance.pay',
    'uses' => 'FinanceController@makePayment'
]);