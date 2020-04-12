<?php

use Illuminate\Support\Facades\Route;
use App\Haddock;

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

Route::get('/', function () {
    return view('application');
});

Route::get('/tenant-data', function () {
    return response()->json(Haddock::all(), 200);
});
