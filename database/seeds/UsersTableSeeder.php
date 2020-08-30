<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'オーナーA',
      'email' => 'owner-a@test.com',
      'password' => Hash::make('ownerowner'),
      // 'remember_token' => str_random(10),
      'created_at'     => now(),
      'updated_at'     => now()
    ]);

    User::create([
      'name' => 'スタッフA',
      'email' => 'staff@test.com',
      'password' => Hash::make(''),
      // 'remember_token' => str_random(10),
      'created_at'     => now(),
      'updated_at'     => now()
    ]);
  }
}
