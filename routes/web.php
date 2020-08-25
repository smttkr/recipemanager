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
return view('top.welcome');
});



Route::group(['middleware' => 'auth'], function () {
  Route::resource('users', 'UserController', ['only' => ['edit', 'update', 'destroy']]);
  Route::resource('shopusers', 'ShopUserController', ['only' => ['index']]);
  Route::resource('recipes', 'RecipeController', ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
  Route::resource('comments', 'CommentController', ['only' => ['store', 'destroy']]);
  Route::resource('bookmarks', 'BookmarkController', ['only' => ['store', 'destroy']]);
});
