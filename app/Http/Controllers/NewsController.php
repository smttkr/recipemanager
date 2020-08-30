<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class NewsController extends Controller
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->user = Auth::user();
      return $next($request);
    });
  }

  public function store(Request $request)
  {
    $request->validate([
      'category' => 'required|',    //categoryのどれか
      'content' => 'required|string',
    ]);
    News::create([
      'shop_id' => $this->user->shopUser->shop_id,
      'category' => $request->category,
      'content' => $request->content,
    ]);
    return redirect(RouteServiceProvider::HOME);
  }



  public function destroy(News $news)
  {
    $news->delete();
    return redirect(RouteServiceProvider::HOME);
  }
}
