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

Route::get('/welcom', function () {
  return view('welcome');
});
Route::get('/experiment', function () {
  return view('experiment.experiment');
});

Route::get('/', function () {
  return view('recipe.index');
});
