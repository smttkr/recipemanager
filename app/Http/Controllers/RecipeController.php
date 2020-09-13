<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\RecipeCreateRequest;
use App\Http\Requests\RecipeUpdateRequest;
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
    $recipes = $shop->recipes;
    $this_month_news = collect([]);
    $last_month_news = collect([]);

    if (count($recipes) > 0) {
      $recipes = $shop->getAllRecipes();
    }

    if (count($shop->getThisMonthNews()) > 0) {
      $this_month_news = $shop->getThisMonthNews();
    }
    if (count($shop->getLastMonthNews()) > 0) {
      $last_month_news = $shop->getLastMonthNews();
    }

    $params = [
      "recipes" => $recipes,
      "this_month_news" => $this_month_news,
      "last_month_news" => $last_month_news
    ];
    return view("recipe.index", $params);
  }



  public function create()
  {
    //新規作成画面
    Gate::authorize("isOwner");
    return view("recipe.create");
  }


  public function store(RecipeCreateRequest $request)
  {
    //作成 オーナーGate
    Gate::authorize("isOwner");
    $shop = $this->shop;
    $image = basename($request->file("image")->store("public/images/dishes"));

    Recipe::create([
      "shop_id" => $shop->id,
      "name" => $request->name,
      "category" => $request->category,
      "image" => $image,
      "description" => $request->description,
    ]);
    return redirect(RouteServiceProvider::HOME);
  }



  public function show(Recipe $recipe)
  {
    //詳細 全員
    $this->authorize("view", $recipe);
    $user = $this->user;

    $comments = $recipe->getAllComments();
    $params = [
      "user" => $user,
      "recipe" => $recipe,
      "recipe_id" => $recipe->id,
      "recipe_name" => $recipe->name,
      "comments" => $comments,
    ];
    return view("recipe.show", $params);
  }



  public function edit(Recipe $recipe)
  {
    $this->authorize("view", $recipe);
    Gate::authorize("isOwner");
    $response = "dd";
    $params = [
      "recipe" => $recipe,
      "response" => $response,
    ];
    return view("recipe.edit", $params);
  }


  public function update(RecipeUpdateRequest $request, Recipe $recipe)
  {
    //詳細から編集 オーナーGate
    Gate::authorize("isOwner");
    $this->authorize("update", $recipe);

    if ($request->image) {
      $image = basename($request->file("image")->store("public/images/dishes"));
      $form = [
        "name" => $request->name,
        "category" => $request->category,
        "image" => $image,
        "description" => $request->description,
      ];
    } else {
      $form = [
        "name" => $request->name,
        "category" => $request->category,
        "description" => $request->description,
      ];
    }
    $recipe->fill($form)->save();
    return redirect()->route("recipes.show", $recipe->id);
  }



  public function destroy(Recipe $recipe)
  {
    //詳細から削除 オーナーGate
    $this->authorize("delete", $recipe);
    Gate::authorize("isOwner");

    $recipe->delete();
    return redirect(RouteServiceProvider::HOME);
  }
}
