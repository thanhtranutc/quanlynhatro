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

Route::group(['middleware' => ['auth']], function () {
  Route::get('/list-apartment', 'ApartmentController@listApartment')->name('apartment.list');
  Route::get('/add-apartment', 'ApartmentController@showAddApartmentForm')->name('apartment.add');
  Route::post('/search-apartment', 'ApartmentController@search')->name('apartment.search');
  Route::post('/save-apartment', 'ApartmentController@save')->name('apartment.save');
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
  Route::post('/add-roomfee{id}', 'RoomfeeController@saveReceipt')->name('receipt.save');
  Route::get('/edit-receipt{id}', 'RoomfeeController@editReceipt')->name('edit.receipt');
  Route::post('/update-receipt{id}', 'RoomfeeController@updateReceipt')->name('update.receipt');

  //statistic
  Route::get('/statistics', 'StatisticController@statistic')->name('statistic');
  Route::get('statistic', 'StatisticController@statisticUser')->name('user.statistic');
  //admin 
  Route::get('/user', 'UserController@index')->name('admin.user');  //user
  Route::get('/monthly-cost', 'MonthlyCostController@index')->name('admin.monthlycost');  // monthly_costs
  Route::get('/add-monthlycost', 'MonthlyCostController@add')->name('admin.monthlycost.add');  // monthly_costs
  Route::post('/save-monthlycost', 'MonthlyCostController@save')->name('admin.monthlycost.save');  // monthly_costs
  Route::get('/delete-monthlycost{id}', 'MonthlyCostController@delete')->name('admin.monthlycost.delete');  // monthly_costs
  Route::get('/edit-monthlycost{id}', 'MonthlyCostController@edit')->name('admin.monthlycost.edit');  // monthly_costs
  Route::post('/save-monthlycost{id}', 'MonthlyCostController@update')->name('admin.monthlycost.update');  // monthly_costs
});

Route::prefix('api')->middleware('auth')->group(function () {
  Route::get('/user/statistics', 'Api\StatisticController@getStatisticByUser')->name('api.statistic');
});
