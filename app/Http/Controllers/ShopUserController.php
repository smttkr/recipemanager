<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\ShopUser;

class ShopUserController extends Controller
{

  public function index()
  {
    //ショップのユーザーを全員表示 オーナーのみ
    $user = Auth::user();
    $shop = $user->shopUser->shop;

    if ($shop_users = ShopUser::where('shop_id', $shop->id)->get()) {
      foreach ($shop_users as $obj) {
        $obj->user;
      }
      $shop_users->toJson();
    }

    $params = [
      'user' => $user,
      'shop' => $shop,
      'shop_users' => $shop_users
    ];
    return view('user.index', $params);
  }

  public function destroy(ShopUser $shopuser)
  {
    $shopuser->delete();
    return redirect()->back();
  }
}
