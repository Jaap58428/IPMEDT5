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
     * Store a newly created measurement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Check for hardcoded API key
      $api_key = 'oQNMyBjHxhIKK5wNrZANbaWRHCR5Rix2aEHRTJWdJ5u3UrM2keHpm6AA44FH';
      if ($request->input('api_key') != $api_key) {
        // When invalid we return http responsecode 'Unautherized'
        return "Unautherized request 401 - Refer to CatchTTN API key";
      }

      // Set the limit for when a bucket is full here in centimeters
      $bucketLimit = 20;

      // Check if an instance of this bucket already exists
      $bucketCount = (Bucket::where('id', $request->input('bucket_id'))->count());
      // Find or Create a bucket and update its values
      if ($bucketCount == 0) {
        $bucket = new Bucket;
      } else {
        $bucket = Bucket::find($request->input('bucket_id'));
      }

      // When the GPS input is 0, this means its blank
      // Therefor we only modify it when its not 0
      if ($request->input('LAT') != 0) {
        $bucket->latitude = $request->input('LAT');
        $bucket->longitude = $request->input('LNG');
      }

      // When a measurement is over the limit this will be marked as a last_full in the bucket id
      // Otherwise it will be last_empty
      $bucketFull = (($request->input('SA') < $bucketLimit) && ($request->input('SB') < $bucketLimit));
      if ($bucketFull) {
        $bucket->last_full = date("Y-m-d H:i:s");
      } else {
        $bucket->last_empty = date("Y-m-d H:i:s");
      }

      // Create a new measurement object to be stored
      $measurement = new Measurement;
      $measurement->bucket_id = $request->input('bucket_id');
      $measurement->sensor_a = $request->input('SA');
      $measurement->sensor_b = $request->input('SB');

      // If both items can be saved we return the new saved value
      if ($bucket->save() && $measurement->save()) {
        return $measurement;
      }
    }

}
