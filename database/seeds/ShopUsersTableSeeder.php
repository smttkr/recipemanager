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
      'shop_id' => 1,
      'user_id' => 1,
      'position' => 'owner',
      'created_at' => now(),
      'updated_at' => now()
    ]);

    ShopUser::create([
      'shop_id' => 1,
      'user_id' => 2,
      'position' => 'staff',
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
