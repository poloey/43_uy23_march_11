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
    return redirect('notes');
});

// Route::group(['prefix' => 'dhaka', 'middleware' => 'auth'], function () {
//   Route::get('/hello', function () {
//     echo 'hello world';
//   });
// });

// Route::get('/hello', [
//   'uses' => 'NoteController@index',
//   'as' => 'hello',
//   'middleware' => 'auth'
// ]);

Route::resource('notes', 'NoteController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
