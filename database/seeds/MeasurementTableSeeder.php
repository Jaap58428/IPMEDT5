<?php

use Illuminate\Database\Seeder;

class MeasurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $measurement_list = [
        ['bucket_id' => 1, 'sensor_a' => '40', 'sensor_b' => '39'],
        ['bucket_id' => 3, 'sensor_a' => '40', 'sensor_b' => '39'],
        ['bucket_id' => 1, 'sensor_a' => '22', 'sensor_b' => '39'],
        ['bucket_id' => 1, 'sensor_a' => '10', 'sensor_b' => '39'],
        ['bucket_id' => 1, 'sensor_a' => '10', 'sensor_b' => '39'],
        ['bucket_id' => 2, 'sensor_a' => '40', 'sensor_b' => '39'],
        ['bucket_id' => 2, 'sensor_a' => '20', 'sensor_b' => '39'],
      ];

      foreach ($measurement_list as $measurement) {
        DB::table('measurements')->insert($measurement);
      }
    }
}
