<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class users extends Controller
{
    public function login() {
        return view('users/login');
    }

    public function register() {
        return view('users/register');
    }
}
