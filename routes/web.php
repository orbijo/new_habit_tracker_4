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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/habits','HabitController@index');
Route::get('/habits/create','HabitController@create');
Route::post('/habits','HabitController@store');
Route::get('/habits/{id}','HabitController@show');
Route::delete('/habits/{id}','HabitController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
