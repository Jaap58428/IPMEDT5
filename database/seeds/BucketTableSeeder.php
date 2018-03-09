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
        ['latitude' => 52.208088, 'longitude' => 4.395012, 'last_full' => date('Y-m-d H:i:s', mktime(12,11,00,3,5,2018)), 'last_empty' => date('Y-m-d H:i:s', mktime(14,11,00,3,6,2018)), 'emptied_by_user_id' => 1],
        ['latitude' => 52.206641, 'longitude' => 4.393720, 'last_full' => date('Y-m-d H:i:s', mktime(12,11,00,3,9,2018)), 'last_empty' => date('Y-m-d H:i:s', mktime(16,11,00,3,12,2018)), 'emptied_by_user_id' => 1],
        ['latitude' => 52.199438, 'longitude' => 4.387083, 'last_full' => date('Y-m-d H:i:s', mktime(22,11,00,3,9,2018)), 'last_empty' => date('Y-m-d H:i:s', mktime(12,11,00,3,9,2018)), 'emptied_by_user_id' => 2],
      ];

      foreach ($bucket_list as $bucket) {
        DB::table('buckets')->insert($bucket);
      }
    }
}
