<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepages;
use App\Http\Controllers\taman_wisata;
use App\Http\Controllers\users;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Homepages
Route::get('/', [homepages::class, 'index']);

// Tempat Wisata
Route::get('/tempat-wisata', [taman_wisata::class, 'index']);
Route::get('/tempat-wisata/detail/{id}', [taman_wisata::class, 'detail']);

// Users
Route::get('/login', [users::class, 'login']);
Route::get('/register', [users::class, 'register']);