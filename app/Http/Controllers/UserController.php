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
    $this->authorize("view", $user);
    if ($user->shopUser) $user->shopUser->shop;

    $params = [
      'user' => $user,
    ];
    return view('user.show', $params);
  }



  public function update(UserUpdateRequest $request, User $user)
  {
    $this->authorize("update", $user);
    //$signに  "name" と "profile_image" のどちらかが入って飛んでくる

    if ($request->type === 'name') {
      $user->name = $request->name;
      $user->save();
      return redirect()->back();
    } //画像
    else if ($request->type === 'image') {
      $user->profile_image = basename($request->file('profile_image')->store('public/images/profile_images'));
      $user->save();
      return redirect()->back();
    } else {
      // typeが間違っているのでエラー画面か、エラー表示
      return abort(404);
    }
  }
}
