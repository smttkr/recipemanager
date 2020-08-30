<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\ShopUser;

class ShopUserController extends Controller
{

  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->user = Auth::user();
      return $next($request);
    });
  }



  public function index()
  {
    //ショップのユーザーを全員表示 オーナーのみ
    $user = $this->user;
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

  public function create()
  {
    //無所属ユーザーをショップに結びつける shop_usersテーブルにuser_idを持ったデータを記録

    $user = $this->user;
    // 既にshop_idを持っているならホームへ
    if ($user->shopUser) {
      return redirect(RouteServiceProvider::HOME);
    }

    return view('shopuser.create', ['user' => $user]);
  }


  public function store(Request $request)
  {
    if ($shop = Shop::where('auth_id', $request->shop_auth_id)->first()) {
      ShopUser::create([
        'shop_id' => $shop->id,
        'user_id' => Auth::id(),
        'position' => 'staff',
      ]);
      return redirect(RouteServiceProvider::HOME);
    } //
    else {
      return redirect()->back()->withErrors(['shop_auth_id' => 'ショップIDが違います'])->withInput();
    }
  }

  public function destroy(ShopUser $shopuser)
  {
    $user = $this->user;
    if ($user->shopUser->position === "owner") {
      //syopuser全員のshop_id削除してからショップも削除
      $user->shopUser->shop->delete();
    }

    $shopuser->delete();
    return redirect(RouteServiceProvider::WELCOME);
  }
}
