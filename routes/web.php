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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/place', 'PlaceController');
Route::resource('/room', 'RoomController');
Route::get('/book-room','BookRoomController@bookRoom')->name('book-room');
Route::POST('/book-room','BookRoomController@store')->name('book-room-store');
Route::get('/get-room/{id}','BookRoomController@getRoom');
Route::get('/list-operations','BookRoomController@listOperations');