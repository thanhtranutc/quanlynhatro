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

Route::get('/', 'HomeController@loginPage');
Route::post('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');
Route::post('/register', 'HomeController@register');
Route::get('/forget-password', 'HomeController@showResetPasswordPage');
Route::get('/reset-password/{token}', 'HomeController@showFormReset')->name('reset.password');
Route::post('/forgetpassword', 'HomeController@submitForgetPassword');
Route::post('/update-password', 'HomeController@updatePassword');

Route::group(['midderware' => ['auth']], function () {
  Route::get('/list-apartment', 'ApartmentController@listApartment')->name('apartment.list');
  Route::get('/add-apartment', 'ApartmentController@showAddApartmentForm')->name('apartment.add');
  Route::post('/search-apartment', 'ApartmentController@search')->name('apartment.search');
  Route::post('/save-apartment', 'ApartmentController@save');
  Route::get('/delete-apartment{id}', 'ApartmentController@deleteApartment')->name('apartment.delete');
  Route::get('/edit-apartment{id}', 'ApartmentController@editApartment')->name('apartment.edit');
  Route::post('/update-apartment{id}', 'ApartmentController@updateApartment')->name('apartment.update');

  // apartment_room
  Route::get('/list-room', 'ApartmentRoomController@listRoom')->name('room.list');
  Route::get('/view-room{id}', 'ApartmentRoomController@viewRoom')->name('room.view');
  Route::get('/add-room', 'ApartmentRoomController@addRoom')->name('room.add');
  Route::post('/search-room', 'ApartmentRoomController@search')->name('room.search');
  Route::post('/save-room', 'ApartmentRoomController@save')->name('room.save');
  Route::get('/delete-room{id}', 'ApartmentRoomController@deleteRoom')->name('room.delete');
  Route::get('/edit-room{id}', 'ApartmentRoomController@editRoom')->name('room.edit');
  Route::post('/update-room{id}', 'ApartmentRoomController@updateRoom')->name('room.update');
  Route::get('/new-contract{id}', 'ApartmentRoomController@showFormAddContract')->name('room.addcontract');
  Route::post('/new-contract{id}', 'ApartmentRoomController@addContract')->name('room.savecontract');

  //room_fee
  Route::get('/list-roomfee', 'RoomfeeController@listRoom')->name('roomfee.list');
  Route::get('/list-roomfee{id}', 'RoomfeeController@listReceipt')->name('receipt.list');
  Route::get('/add-roomfee{id}', 'RoomfeeController@addReceipt')->name('receipt.add');
});
