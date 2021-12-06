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


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
  Route::middleware(['guest:admin'])->group(function () {
    Route::get('/login', 'admin\AuthController@loginForm')->name('login');
    Route::post('/login', 'admin\AuthController@login')->name('login.post');
  });

  Route::group(['middleware' => 'auth:admin'], function(){
    Route::post('/logout', 'admin\AuthController@logout')->name('logout');
    Route::get('/dashboard', 'admin\DashboardController@index')->name('dashboard');
  });
});
