<?php

use Illuminate\Support\Facades\Route;

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
Route::redirect('/', '/admin');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::redirect('/', '/admin/dashboard');

    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/login', 'admin\AuthController@loginForm')->name('login');
        Route::post('/login', 'admin\AuthController@login')->name('login.post');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::post('/logout', 'admin\AuthController@logout')->name('logout');
        Route::get('/dashboard', 'admin\DashboardController@index')->name('dashboard');

        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('/', 'admin\AdminController@index')->name('list');
            Route::get('/create', 'admin\AdminController@create')->name('create');
            Route::post('/create', 'admin\AdminController@createPost')->name('create.post');
            Route::get('/edit/{admin}', 'admin\AdminController@edit')->name('edit');
            Route::patch('/edit/{admin}', 'admin\AdminController@editPatch')->name('edit.patch');
            Route::delete('/delete/{admin}', 'admin\AdminController@destroy')->name('delete');
        });

        Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
            Route::get('/', 'admin\RoleController@index')->name('list');
            Route::get('/create', 'admin\RoleController@create')->name('create');
            Route::post('/create', 'admin\RoleController@createPost')->name('create.post');
            Route::get('/edit/{role}', 'admin\RoleController@edit')->name('edit');
            Route::patch('/edit/{role}', 'admin\RoleController@editPatch')->name('edit.patch');
            Route::delete('/delete/{role}', 'admin\RoleController@destroy')->name('delete');
        });

        Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {
            Route::get('/', 'admin\PermissionController@index')->name('list');
            Route::get('/create', 'admin\PermissionController@create')->name('create');
            Route::post('/create', 'admin\PermissionController@createPost')->name('create.post');
            Route::get('/edit/{permission}', 'admin\PermissionController@edit')->name('edit');
            Route::patch('/edit/{permission}', 'admin\PermissionController@editPatch')->name('edit.patch');
            Route::delete('/delete/{permission}', 'admin\PermissionController@destroy')->name('delete');
        });

        Route::group(['prefix' => 'permission-group', 'as' => 'permission-group.'], function () {
            Route::get('/', 'admin\PermissionGroupController@index')->name('list');
            Route::get('/create', 'admin\PermissionGroupController@create')->name('create');
            Route::post('/create', 'admin\PermissionGroupController@createPost')->name('create.post');
            Route::get('/edit/{id}', 'admin\PermissionGroupController@edit')->name('edit');
            Route::patch('/edit/{id}', 'admin\PermissionGroupController@editPatch')->name('edit.patch');
            Route::delete('/delete/{id}', 'admin\PermissionGroupController@destroy')->name('delete');
        });
    });
});
