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
        // Always check if the user is loged in when this page is created
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
      // The center of the map is based on these coordinates
      // Ideally the map is configured to contain all markers
      // This either through an average or map.fitBounds(bounds)
      $mapCenter = [
        'lat' => 52.201885,
        'lng' => 4.389917
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
      // Check wether the user is an admin
      if (!auth()->user()->isAdmin) {
        return redirect('/home')->with('error', 'Deze pagina is alleen voor de administrator');
      }

      return view('pages.settings');
    }

    /**
     * Show the new user page.
     *
     * @return \Illuminate\Http\Response
     */
    public function newUser()
    {
      // Check wether the user is an admin
      if (!auth()->user()->isAdmin) {
        return redirect('/home')->with('error', 'Deze pagina is alleen voor de administrator');
      }

      return view('pages.new-user');
    }
}
