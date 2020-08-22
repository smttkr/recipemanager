<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
  if (Auth::check()) {
    return view('home');       //name付きroute()に変える
  }
  return view('top.welcome');
});



Route::group(['middleware' => 'auth'], function () {
});
Route::get('/home2', 'HomeController@index')->name('home');
Route::get('/home', function () {
  return view('recipe.show');
});
