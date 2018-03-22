<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Measurement;
use App\Http\Resource\Measurement as MeasurementResource;
use App\Bucket;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get measurements
        $measurements = Measurement::all();

        return $measurements;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Check if an instance of this bucket already exists
      $bucketCount = (Bucket::where('id', $request->input('bucket_id'))->count());

      // Find or Create a bucket and update its values
      if ($bucketCount == 0) {
        $bucket = new Bucket;
      } else {
        $bucket = Bucket::find($request->input('bucket_id'));
      }

      $bucketFull = ((int)$request->input('SA') > 20) && ((int)$request->input('SB') > 20);
      if ($bucketFull) {
        $bucket->last_full = date("Y-m-d H:i:s");
      } else {
        $bucket->last_empty = date("Y-m-d H:i:s");
      }

      $measurement = new Measurement;
      $measurement->bucket_id = $request->input('bucket_id');
      $measurement->sensor_a = $request->input('SA');
      $measurement->sensor_b = $request->input('SB');


      if ($bucket->save() && $measurement->save()) {
        return $measurement;
      }
    }

}
