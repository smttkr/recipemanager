<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class ShopController extends Controller
{

  public function create()
  {
    $user = Auth::user();
    // 既にshop_idを持っているならホームへ
    if ($user->shopUser) {
      return redirect(RouteServiceProvider::HOME);
    }
    return view('shop.create', ['user' => $user]);
  }


  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:10',
      'shop_auth_id' => 'required|string|alpha_num|between:6,10|unique'
    ]);

    Shop::create([
      'name' => $request->name,
      'auth_id' => $request->shop_auth_id,
    ]);
    return redirect(RouteServiceProvider::HOME);
  }


  public function update(Request $request, $id)
  {
    //
  }


  public function destroy($id)
  {
    //
  }
}
