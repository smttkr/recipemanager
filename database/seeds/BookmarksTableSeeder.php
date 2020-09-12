<?php

use Illuminate\Database\Seeder;
use App\Models\Bookmark;

class BookmarksTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 1; $i < 31; $i++) {
      Bookmark::create([
        "shop_user_id" => mt_rand(1, 2),
        "recipe_id" => $i,
      ]);
    }
  }
}
