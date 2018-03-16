<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.map');
    }

    /**
     * Returns the GeoJSON of bucket coordinates
     */
    public function getGeoJSON()
    {
      return null;
    }

    /**
     * Show the list of trashbuckets.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
      return view('pages.list');
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
