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
    for ($i = 0; $i < 30; $i++) {
      News::create([
        "shop_id" => mt_rand(1, 2),
        "content" => "hello this is test2 news hello this is test2 news hello this is test2 news hello this is test2 news",
        "created_at" => "2020-09-" . $i
      ]);
    }
  }
}
