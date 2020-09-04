<?php

use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i = 0; $i < 30; $i++) {
      $category = ["salad", "meat", "fried", "dessert"];
      $images = ["greensalad.jpg", "beefsteak.jpg", "firedpotato.jpg", "chocolatecake.jpg"];

      Recipe::create([
        "shop_id" => 1,
        "category" => $category[$i % 4],
        "name" => "サンプル" . $i,
        "image" => $images[$i % 4],
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
        "created_at" => "2019-01-01 ",
        "updated_at" => date("2020/01/02 01:01:$i")
      ]);
    }
    // Recipe::create([
    //   "shop_id" => 1,
    //   "category" => "meat",
    //   "name" => "ビーフステーキ",
    //   "image" => "beefsteak.jpg",
    //   "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
    // ]);
    // Recipe::create([
    //   "shop_id" => 1,
    //   "category" => "dessert",
    //   "name" => "チョコレートケーキ",
    //   "image" => "chocolatecake.jpg",
    //   "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
    // ]);
    // Recipe::create([
    //   "shop_id" => 1,
    //   "category" => "salad",
    //   "name" => "グリーンサラダ",
    //   "image" => "greensalad.jpg",
    //   "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
    // ]);
    // Recipe::create([
    //   "shop_id" => 1,
    //   "category" => "fried",
    //   "name" => "フライドポテト",
    //   "image" => "firedpotato.jpg",
    //   "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
    // ]);
  }
}
