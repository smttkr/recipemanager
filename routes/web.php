<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
  if ($user = Auth::user()) {
    return view('top.welcome', ['user' => $user]);
  }
  return view('top.welcome');
});


Route::group(['middleware' => 'auth'], function () {
  //ユーザーであるが、しょっぷには属していない
  Route::resource('users', 'UserController', ['only' => ['show', 'update']]);
  Route::resource('shops', 'ShopController', ['only' => ['create', 'store']]);
  Route::resource('shopusers', 'ShopUserController', ['only' => ['create', 'store']]);

  Route::group(['middleware' => 'belong'], function () {
    // ユーザーかつ、ショップにも属している
    Route::resource('shops', 'ShopController', ['only' => ['update', 'destroy']]);
    Route::resource('shopusers', 'ShopUserController', ['only' => ['index', 'destroy']]);
    Route::resource('recipes', 'RecipeController', ['only' => ['index', 'create', 'store', 'show', 'update', 'destroy']]);
    Route::resource('news', 'NewsController', ['only' => ['store', 'destroy']]);
    // Route::delete('/news/{news}', 'NewsController@destroy');
    Route::resource('comments', 'CommentController', ['only' => ['store', 'destroy']]);
    Route::resource('bookmarks', 'BookmarkController', ['only' => ['store', 'destroy']]);
  });
});
