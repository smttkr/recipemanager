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
    $shop = Auth::user()->shopUser->shop;
    $news = $shop->news->toJson();
    $recipes = $shop->recipes->toJson();

    $params = [
      'news' => $news,
      'recipes' => $recipes,
    ];
    return view('recipe.index', $params);
  }

  public function create()
  {
    //新規作成画面 オーナー
    return view('recipe.create');
  }

  public function store(Request $request)
  {
    //作成 オーナー
  }

  public function show(Recipe $recipe)
  {
    //詳細 全員
    $comments = $recipe->comments;
    if (count($comments) > 0) {
      //コメントのコレクションに、ショップユーザー、ユーザーと連結させてユーザーの名前を取得
      foreach ($comments as $obj) {
        $obj->shopUser->user;
      }
      $comments = $comments->toJson();
    } else {
      $comments = [];
    }

    $params = [
      'recipe' => $recipe->toJson(),
      'recipe_id' => $recipe->id,
      'recipe_name' => $recipe->name,
      'comments' => $comments,
      'recipe' => $recipe,
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
