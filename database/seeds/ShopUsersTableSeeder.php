<?php

use Illuminate\Database\Seeder;
use App\Models\ShopUser;

class ShopUsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ShopUser::create([
      "shop_id" => 1,
      "user_id" => 1,
      "position" => "owner",
    ]);

    ShopUser::create([
      "shop_id" => 1,
      "user_id" => 2,
      "position" => "staff",
    ]);
    ShopUser::create([
      "shop_id" => 2,
      "user_id" => 3,
      "position" => "owner",
    ]);
  }
}
