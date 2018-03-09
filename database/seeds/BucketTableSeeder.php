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
        ['latitude' => 52.208088, 'longitude' => 4.395012, 'last_full' => date(05-03-2018 12:03:00), 'last_empty' => date(04-03-2018 12:03:00), 'emptied_by_user_id' => 1],
        ['latitude' => 52.206641, 'longitude' => 4.393720, 'last_full' => date(02-03-2018 12:03:00), 'last_empty' => date(03-03-2018 12:03:00), 'emptied_by_user_id' => 1],
        ['latitude' => 52.199438, 'longitude' => 4.387083, 'last_full' => date(07-03-2018 12:03:00), 'last_empty' => date(07-03-2018 13:03:00), 'emptied_by_user_id' => 2],
      ];

      foreach ($bucket_list as $bucket) {
        DB::table('buckets')->insert($bucket);
      }
    }
}
