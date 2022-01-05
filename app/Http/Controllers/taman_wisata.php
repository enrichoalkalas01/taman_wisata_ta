<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class taman_wisata extends Controller
{
    public function index() {
        return view('wisata/index');
    }

    public function detail() {
        return view('wisata/detail');
    }
}
