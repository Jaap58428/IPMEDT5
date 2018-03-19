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
