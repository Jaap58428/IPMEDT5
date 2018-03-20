<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bucket;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the map overview.
     *
     * @return \Illuminate\Http\Response
     */
    public function map()
    {
      $coordinates = Bucket::all();
      $mapCenter = [
        'lat' => 52.209868,
        'lng' => 4.396633
      ];

      $data = array(
        'mapCenter' => $mapCenter,
        'coordinates' => $coordinates
      );

      return view('pages.map')->with($data);
    }

    /**
     * Show the application settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
      return view('pages.settings');
    }

    public function newUser()
    {
      return view('pages.new-user');
    }
}
