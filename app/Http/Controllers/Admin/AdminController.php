<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display the main page of admin
     *
     * @return view
     */
    public function index()
    {
        return view('admin.index');
    }
}
