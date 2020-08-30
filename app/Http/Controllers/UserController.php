<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{

  public function show(User $user)
  {
    // 自分のプロフィール表示
    if ($user->shopUser) {
      $user->shopUser->shop;
    }

    $params = [
      'user' => $user,
    ];
    return view('user.show', $params);
  }



  public function update(UserUpdateRequest $request, User $user)
  {
    //$signに  "name" と "profile_image" のどちらかが入って飛んでくる
    $sign = $request->sign;

    if ($sign === 'name') {
      $user->name = $request->name;
      $user->save();
      return redirect()->back();
    } //画像
    else if ($sign === 'profile_image') {
      if ($request->file('profile_image')->isValid()) {
        $path = $request->file('profile_image')->store('public/images/profile_images');
      }
      $user->profile_image = basename($path);
      $user->save();
      return redirect()->back();
    } else {
      return view('top.welcome');
    }
  }
}
