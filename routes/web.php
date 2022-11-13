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
//     return view('welcome');
// });

Auth::routes();
// Route::resource('events', 'EventController')->middleware('auth');
Route::get('/','EventController@index')->middleware('auth');
Route::post('/events','EventController@store')->middleware('auth');

Route::post('/affectation', 'EventController@updateMultiple')->middleware('auth');

Route::PATCH('/update/{id}', 'EventController@update')->middleware('auth');
Route::delete('/delete/{id}', 'EventController@destroy')->middleware('auth');
Route::get('/edit/{id}', 'EventController@edit')->middleware('auth');


// Route::post('/affectation', 'EventController@updateMultiple')->name('multiple-update')->middleware('auth');
