<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function edit($id)
  {
    //自分のプロフィール表示
  }

  public function update(Request $request, $id)
  {
    //プロフィールの編集 ニックネームと画像だけ
  }

  public function destroy($id)
  {
    //退会 オーナーの退会＝shopごと消す
  }
}
