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
Route::get('/admin', ['as' => 'login', 'uses' =>'Admin\LoginController@loginPage']);
Route::post('/admin/login', ['uses' =>'Admin\LoginController@login'])->name("Admin.Login");
Route::get('/admin/logout', ['uses' =>'Admin\LoginController@logout'])->name("Admin.Logout");
Route::get('/admin/register', ['as' => 'register', 'uses' =>'Admin\LoginController@RegisterPage']);
Route::post('/admin/register', ['uses' =>'Admin\LoginController@register_user'])->name("Admin.PostRegister");

Route::group(['prefix' => 'admin','as' => 'Admin.','middleware' => ['admin']], function(){
    Route::get('/dashboard', 'Admin\LoginController@index')->name('Dashboard');
    Route::get('users', 'Admin\UserController@index')->name('userList');
});