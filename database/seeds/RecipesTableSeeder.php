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
    Recipe::create([
      'shop_id' => 1,
      'category' => 'meat',
      'name' => 'ビーフステーキ',
      'image' => '../images/dishes/beefsteak.jpg',
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ]);
    Recipe::create([
      'shop_id' => 1,
      'category' => 'dessert',
      'name' => 'チョコレートケーキ',
      'image' => '../images/dishes/chocolatecake.jpg',
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ]);
    Recipe::create([
      'shop_id' => 1,
      'category' => 'salad',
      'name' => 'グリーンサラダ',
      'image' => '../images/dishes/greensalad.jpg',
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ]);
    Recipe::create([
      'shop_id' => 1,
      'category' => 'fried',
      'name' => 'フライドポテト',
      'image' => '../images/dishes/firedpotato.jpg',
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
    ]);
  }
}
