<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user_list = [
        ['name' => 'Johan Dewit', 'email' => 'johan@fakemail.com', 'password' => bcrypt('qwerty')],
        ['name' => 'Kees Degroen', 'email' => 'kees@fakemail.com', 'password' => bcrypt('qwerty')],
        ['name' => 'Bob Derooij', 'email' => 'bob@fakemail.com', 'isAdmin' => true, 'password' => bcrypt('qwerty')],
      ];

      foreach ($user_list as $user) {
        DB::table('users')->insert($user);
      }
    }
}
