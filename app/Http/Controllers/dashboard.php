<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function __construct() {
        if ( Session::get('users') == NULL ) {
            return redirect('/login');
        }
    }

    public function index(Request $request) {
        return view('dashboard/index');
    }

    public function tamanWisata(Request $request) {
        return view('dashboard/taman_wisata');
    }
}
