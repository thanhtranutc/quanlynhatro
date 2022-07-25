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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','HomeController@loginPage');

Route::post('/login','HomeController@login');
Route::get('/logout','HomeController@logout');
Route::post('/register','HomeController@register');
Route::get('/forget-password','HomeController@showResetPasswordPage');
Route::get('/reset-password/{token}','HomeController@showFormReset')->name('reset.password');
Route::post('/forgetpassword','HomeController@submitForgetPassword');
Route::post('/update-password','HomeController@updatePassword');
