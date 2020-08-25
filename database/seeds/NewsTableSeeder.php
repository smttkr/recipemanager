<?php

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    News::create([
      'shop_id' => 1,
      'category' => 'salad',
      'content' => 'hello this is test news hello this is test news hello this is test news hello this is test news'
    ]);
    News::create([
      'shop_id' => 1,
      'category' => 'other',
      'content' => 'hello this is test2 news hello this is test2 news hello this is test2 news hello this is test2 news'
    ]);
  }
}
