<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/email', function () {
    return view('auth.password.email');
});
Route::get('logout','Auth\AuthController@logout');
Route::get('forgot-password','Auth\PasswordController@forgotPassView');
Route::post('forgot-password','Auth\PasswordController@forgotPassword');
Route::get('forgot-password/{id}/{password_reset_code}','Auth\PasswordController@postForgotPassword');
Route::get('password-reset/{id}/{password_reset_code}','Auth\PasswordController@passresetview');
Route::post('password-reset','Auth\PasswordController@passwordReset');
Route::get('register', 'RegisterController@regView');
Route::post('register', 'RegisterController@register');
Route::get('user/activation/{token}', 'RegisterController@userActivation');
Route::get('login', function () {
    return view('auth.login');
});
Route::post('login','Auth\AuthController@authenticate');
Route::resource('user', 'RegisterController');





// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');
//
// // Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');
