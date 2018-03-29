<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bucket;
use App\Measurement;

class BucketsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Always check if the user is loged in when this page is created
        $this->middleware('auth');
    }

    /**
     * Show a list of all the buckets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $buckets = Bucket::all();

      $data = array(
        'buckets' => $buckets
      );

      return view('buckets.index')->with($data);
    }

    /**
     * Display the specified bucket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $bucket = Bucket::findOrFail($id);
      // Get all measurements from a specific bucket sorted chronologically
      $measurements = Measurement::where('bucket_id', $bucket->id)->latest('updated_at')->get();

      $data = array(
        'bucket' => $bucket,
        'measurements' => $measurements
      );

      return view('buckets.show')->with($data);
    }


}
