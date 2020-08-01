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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminController@index');

Route::get('/admin/users', 'UserController@userList');

Route::get('/admin/roles', 'UserPermissionController@showAllRoles');

Route::get('/admin/role/create', 'UserPermissionController@createRole');

Route::get('/admin/role/editRole/{id}', 'UserPermissionController@editRole');

Route::post('/admin/role/submit', 'UserPermissionController@submitRole');

Route::get('/admin/permissions', 'UserPermissionController@showAllPermissions');
