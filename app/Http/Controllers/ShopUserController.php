<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Gate;
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
    Gate::authorize("isOwner");
    $shop = $this->user->shopUser->shop;
    $shop_users = $shop->getAllShopUsers();

    $params = [
      "user" => $this->user,
      "shop" => $shop,
      "shop_users" => $shop_users
    ];
    return view("shopuser.index", $params);
  }

  public function create()
  {
    //無所属ユーザーのショップへの参加フォーム
    $user = $this->user;
    // 既にshop_idを持っているならホームへ
    if ($user->shopUser) {
      return redirect(RouteServiceProvider::HOME);
    }

    return view("shopuser.create", ["user" => $user]);
  }


  public function store(Request $request)
  {
    //無所属ユーザーをショップに結びつける shop_usersテーブルにuser_idを持ったデータを記録
    $user = $this->user;
    if ($user->shopUser) {
      return redirect(RouteServiceProvider::HOME);
    }

    if ($shop = Shop::where("auth_id", $request->shop_auth_id)->first()) {
      $shop->toAccept($user->id);
      return redirect(RouteServiceProvider::HOME);
    } else {
      return redirect()->back()->withErrors(["shop_auth_id" => "ショップIDが違います"]);
    }
  }

  public function destroy(ShopUser $shopuser)
  {
    $this->authorize("delete", $shopuser);
    //認証チェック
    if ($shopuser->position === "owner") {
      //オーナーの場合ショップごと削除
      $shopuser->shop->delete();
    } else if ($shopuser->position === "staff") {
      $shopuser->delete();
    } else {
      //リクエストがおかしいのでエラー画面に飛ばす
      return abort(404);
    }
    return redirect(RouteServiceProvider::WELCOME);
  }
}
