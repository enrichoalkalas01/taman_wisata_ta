<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepages;
use App\Http\Controllers\taman_wisata;
use App\Http\Controllers\users;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\comment;
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
Route::get('/logout', [users::class, 'logout']);
Route::get('/register', [users::class, 'register']);
Route::post('/register', [users::class, 'registerPost']);
Route::post('/login', [users::class, 'loginPost']);
Route::get('/dashboard/profile', [users::class, 'profile']);
Route::get('/dashboard/profile/edit/{id}', [users::class, 'edit']);
Route::post('/dashboard/profile/editPost', [users::class, 'editPost']);

// Dashboard
Route::get('/dashboard', [dashboard::class, 'index']);
Route::get('/dashboard/taman-wisata', [dashboard::class, 'tamanWisata']);
Route::get('/dashboard/taman-wisata/create', [dashboard::class, 'tamanWisataCreate']);
Route::post('/dashboard/taman-wisata/create', [dashboard::class, 'tamanWisataCreatePost']);
Route::get('/dashboard/taman-wisata/delete/{id}', [dashboard::class, 'tamanWisataDelete']);
Route::get('/dashboard/taman-wisata/edit/{id}', [dashboard::class, 'tamanWisataEdit']);
Route::post('/dashboard/admin/taman-wisata/edit', [dashboard::class, 'tamanWisataEditPost']);

// Comments
Route::post('/comments/{id}', [comment::class, 'create']);