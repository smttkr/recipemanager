<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\ShopUser;
use App\Models\Recipe;
use App\Models\News;

class RecipeController extends Controller
{

  public function index()
  {
    //ホーム画面 全員
    $user = Auth::user();
    $shop = Shop::find($user->shopUser->id);
    $news = News::where('shop_id', $shop->id)->get()->toJson();

    $dishes = Recipe::where('shop_id', $shop->id)->get()->toJson();

    $params = [
      'user' => $user,
      'shop' => $shop,
      'news' => $news,
      'dishes' => $dishes,
    ];
    return view('recipe.index', $params);
  }

  public function create()
  {
    //新規作成画面 オーナー
    $user = Auth::user();
    $shop = Shop::find($user->shopUser->id);

    $params = [
      'user' => $user,
      'shop' => $shop
    ];
    return view('recipe.create', $params);
  }

  public function store(Request $request)
  {
    //作成 オーナー
  }

  public function show(Recipe $recipe)
  {
    //詳細 全員
    $user = Auth::user();
    $shop = Shop::find($user->shopUser->id);

    $dish_id = $recipe->id;
    $dish_name = $recipe->name;
    $dish = $recipe->toJson();

    if ($temp = $recipe->comments) {
      //コメントのコレクションに、ショップユーザー、ユーザーと連結させてユーザーの名前を取得
      foreach ($temp as $obj) {
        $obj->shopUser->user;
      }
      $comments = $temp->toJson();
    }

    $params = [
      'user' => $user,
      'shop' => $shop,
      'dish' => $dish,
      'dish_id' => $dish_id,
      'dish_name' => $dish_name,
      'comments' => $comments,
    ];
    return view('recipe.show', $params);
  }

  public function update(Request $request, $id)
  {
    //詳細から編集 オーナーのみ
  }

  public function destroy($id)
  {
    //詳細から削除 オーナーのみ
  }
}
