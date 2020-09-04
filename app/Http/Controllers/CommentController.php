<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->user = Auth::user();
      $this->shop = $this->user->shopUser->shop;
      return $next($request);
    });
  }

  public function store(CommentRequest $request)
  {
    if ($this->shop->recipes->contains("id", $request->recipe_id)) {
      //ユーザーの所属しているお店のレシピかどうかのチェック
      Comment::create([
        "recipe_id" => $request->recipe_id,
        "shop_user_id" => $this->user->Shopuser->id,
        "comment" => $request->comment,
      ]);
      return redirect()->back();
    }
    return view("error");
  }

  public function destroy(Comment $comment)
  {
    $this->authorize("delete", $comment);
    $comment->delete();
    return redirect()->back();
  }
}
