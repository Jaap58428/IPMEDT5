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
        ['latitude' => 52.208088, 'longitude' => 4.395012, 'last_full' => Carbon::now()->format('d-m-Y H:i:s'), 'last_empty' => Carbon::now()->format('d-m-Y H:i:s'), 'emptied_by_user_id' => 1],
        ['latitude' => 52.206641, 'longitude' => 4.393720, 'last_full' => Carbon::now()->format('d-m-Y H:i:s'), 'last_empty' => Carbon::now()->format('d-m-Y H:i:s'), 'emptied_by_user_id' => 1],
        ['latitude' => 52.199438, 'longitude' => 4.387083, 'last_full' => Carbon::now()->format('d-m-Y H:i:s'), 'last_empty' => Carbon::now()->format('d-m-Y H:i:s'), 'emptied_by_user_id' => 2],
      ];

      foreach ($bucket_list as $bucket) {
        DB::table('buckets')->insert($bucket);
      }
    }
}
