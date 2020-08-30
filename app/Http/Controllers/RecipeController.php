<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Http\Requests\RecipeRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;



class RecipeController extends Controller
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->user = Auth::user();
      $this->shop = $this->user->shopUser->shop;
      return $next($request);
    });
  }



  public function index()
  {
    //ホーム画面 全員
    $shop = $this->shop;
    $news = $shop->news;
    if (count($news) > 0) {
      $news = $news->sortByDesc('id')->values()->collect()->toJson();
    }

    $params = [
      'news' => $news,
      'recipes' => $shop->recipes->toJson(),
    ];
    return view('recipe.index', $params);
  }



  public function create()
  {
    //新規作成画面 オーナー
    return view('recipe.create');
  }



  public function store(RecipeRequest $request)
  {
    //作成 オーナー
    $shop = $this->shop;
    if ($request->file('image')->isValid()) {
      $path = $request->file('image')->store('public/images/dishes');
      $image = basename($path);

      Recipe::create([
        'shop_id' => $shop->id,
        'name' => $request->name,
        'category' => $request->category,
        'image' => $image,
        'description' => $request->description,
      ]);
    } else {
      return redirect()->back()->withErrors(['image', '画像のアップロードに失敗しました'])->withInput();
    }
  }



  public function show(Recipe $recipe)
  {
    //詳細 全員
    //ユーザーが持つショップIDとレシピの持つショップIDが違うなら戻す
    if ($this->shop->id !== $recipe->shop_id) {
      return redirect()->back();
    }

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



  public function destroy(Recipe $recipe)
  {
    //詳細から削除 オーナーのみ
    $recipe->delete();
    return redirect(RouteServiceProvider::HOME);
  }
}
