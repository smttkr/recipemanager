<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\ShopUser;
use App\Models\Recipe;
use App\Models\News;

class Shop extends Model
{
  protected $fillable = ["name", "auth_id"];

  public function shopUsers()
  {
    return $this->hasMany(ShopUser::class);
  }

  public function recipes()
  {
    return $this->hasMany(Recipe::class);
  }
  public function news()
  {
    return $this->hasMany(News::class);
  }


  public function getDisplayNews()
  //お店のニュースを今月のものだけ、新しい順に取得
  {
    $this_month = Carbon::now()->firstOfMonth();
    return $this->news->where("created_at", ">", $this_month)->sortByDesc("id")->values()->collect();
  }

  public function getAllRecipes()
  // お店のレシピを更新日が新しい順に取得
  {
    return $this->recipes->sortByDesc("updated_at")->values()->collect();
  }

  public function getAllShopUsers()
  // お店に所属する全てのユーザー情報を所得
  {
    $shop_users = $this->shopUsers;
    foreach ($shop_users as $obj) {
      $obj->user;
    }
    return $shop_users;
  }

  public function makeOwner($user_id)
  {
    //ショップが作成されたときに、作成したユーザーがオーナーとしてShopUsersテーブルに記録される
    ShopUser::create([
      "shop_id" => $this->id,
      "user_id" => $user_id,
      "position" => "owner",
    ]);
  }

  public function toAccept($user_id)
  {
    // ShopUserテーブルにユーザーのidを記録して一員とする
    ShopUser::create([
      "shop_id" => $this->id,
      "user_id" => $user_id,
      "position" => "staff",
    ]);
  }
}
