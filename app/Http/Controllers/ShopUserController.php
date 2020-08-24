<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopUserController extends Controller
{

  public function index()
  {
    //ショップのユーザーを全員表示 オーナーのみ
    $user = Auth::user();

    $params = [
      'user' => $user,
    ];
    return view('user.index', $params);
  }


  // public function update(Request $request, $id)
  // {
  //   //ショップのユーザーをお店から消す オーナーのみ
  //   //shop_idは外部キーなので、何かデフォルトにつなぎ直す？
  // }

}
