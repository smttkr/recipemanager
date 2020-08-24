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
    Bookmark::create([
      'shop_user_id' => 2,
      'recipe_id' => 1,
    ]);
    Bookmark::create([
      'shop_user_id' => 2,
      'recipe_id' => 2,
    ]);
    Bookmark::create([
      'shop_user_id' => 2,
      'recipe_id' => 3,
    ]);
  }
}
