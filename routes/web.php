<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes!
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
<<<<<<< Updated upstream
    return redirect('/login');
=======
    return view('auth.login');
>>>>>>> Stashed changes
});


Route::post('/habits/{id}','RatingController@store');
Route::get('/habits/{id}/rate','RatingController@show');

Route::get('/habits','HabitController@index');
Route::post('/habits','HabitController@store');
Route::get('/habits/{id}','HabitController@show');
Route::delete('/habits/{id}','HabitController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<<<<<<< Updated upstream
Route::resource('/ratings', 'RatingController');
Route::resource('/habits', 'HabitController');
=======
Route::post('/habits/{id}','RatingController@store');
>>>>>>> Stashed changes
