<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{

  public function index()
  {
    //ホーム画面 全員
    $user = Auth::user();

    $params = [
      'user' => $user,
    ];
    return view('recipe.index',$params);
  }

  public function create()
  {
    //新規作成画面 オーナー
    $user = Auth::user();

    $params = [
      'user' => $user,
    ];
    return view('recipe.create',$params);
  }

  public function store(Request $request)
  {
    //作成 オーナー
  }

  public function show($id)
  {
    //詳細 全員
    $user = Auth::user();

    $params = [
        'user' => $user,
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
