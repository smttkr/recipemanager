<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Comment::create([
      'recipe_id' => 1,
      'shop_user_id' => 2,
      'comment' => 'hello test comment.'
    ]);
  }
}
