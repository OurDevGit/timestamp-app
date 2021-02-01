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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'HomeController@index');
Route::get('/events', 'EventController@index')->name('events');
Route::get('/add-event', 'EventController@add')->name('add-event');
Route::post('/create-event', 'EventController@create')->name('create-event');
Route::get('/edit-event/{id}', 'EventController@edit')->name('edit-event');
Route::patch('/update-event/{id}', 'EventController@update')->name('update-event');
Route::delete('/delete-event/{id}', 'EventController@destroy')->name('delete-event');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
