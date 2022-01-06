<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;

class users extends Controller
{
    public function login() {
        return view('users/login');
    }

    public function register() {
        return view('users/register');
    }

    public function logout(Request $request) {
        $request->session()->forget('users');
        $request->session()->forget('profile');

        return redirect('/');
    }

    public function registerPost(Request $request) {
        $UserData = User::where('username', $_POST['username'])->get();
        if ( count($UserData) != 0 ) {
            return redirect('/register');
        } else {
            $model = new User;
            $model->username = $_POST["username"];
            $model->password = $_POST["password"];
            $model->email = $_POST["email"];

            if ( $model->save() ) {
                $model2 = new profile;
                $model2->users_id = $model->id;
                $model2->fullname = $_POST['fullname'];
                $model2->description = '';

                if ( $model2->save() ) {
                    return redirect('/login');
                } else {
                    return redirect('/register');
                }
            } else {
                return redirect('/register');
            }
        }
    }

    public function loginPost(Request $request) {
        $UserData = User::where('username', $_POST['username'])->get()->first();
        $ProfileData = profile::where('users_id', $UserData->id)->get()->first();
        if ( $UserData->password != $_POST['password'] ) {
            return redirect('/login');
        } else {
            $request->session()->put('users', $UserData);
            $request->session()->put('profile', $ProfileData);
            return redirect('/');
        }
    }
}
