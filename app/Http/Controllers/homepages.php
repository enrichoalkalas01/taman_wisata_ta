<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepages extends Controller
{
    public function index() {
        return view('homepages/index');
    }
}
