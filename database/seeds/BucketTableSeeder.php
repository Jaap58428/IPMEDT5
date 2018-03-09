<?php

use Illuminate\Database\Seeder;

class BucketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $bucket_list = [
        ['latitude' => 52.208088, 'longitude' => 4.395012, 'last_full' => 05/03/2018 12:03, 'last_empty' => 05/03/2018 12:24, 'emptied_by_user_id' => 1],
        ['latitude' => 52.206641, 'longitude' => 4.393720, 'last_full' => 06/03/2018 11:03, 'last_empty' => 05/03/2018 8:10, 'emptied_by_user_id' => 1],
        ['latitude' => 52.199438, 'longitude' => 4.387083, 'last_full' => 09/03/2018 14:03, 'last_empty' => 09/03/2018 19:24, 'emptied_by_user_id' => 2],
      ];

      foreach ($bucket_list as $bucket) {
        DB::table('buckets')->insert($bucket);
      }
    }
}
