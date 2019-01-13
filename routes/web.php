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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'HomeController@index')->name('home');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// システム管理者のみ
Route::group(['middleware' => ['auth', 'can:system-only']], function () {
    //
});

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    
    // Registration Routes...
    //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    //Route::post('register', 'Auth\RegisterController@register');

});

// 作業ユーザ以上に許可
Route::group(['middleware' => ['auth', 'can:worker-higher']], function () {
    Route::resource('users', 'UsersController');

    Route::resource('departments', 'DepartmentsController');
    Route::resource('roles', 'RolesController');
    Route::resource('test_eqs', 'Test_EqController');
    Route::resource('katabans', 'KatabansController');
    Route::resource('kataban_kensa_items', 'Kataban_kensa_itemsController', ['except' => ['create']]);
    Route::get('kataban_kensa_items/{kataban_id}/create', 'Kataban_kensa_itemsController@create')->name('kataban_kensa_items.create');
    
    Route::resource('samples', 'SamplesController');
    Route::resource('meas_records', 'Meas_recordsController', ['except' => ['create']]);
    Route::get('meas_records/{sample_id}/create', 'Meas_recordsController@create')->name('meas_records.create');
});