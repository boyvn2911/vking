<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.index');
    }
}
