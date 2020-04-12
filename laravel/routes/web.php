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

Route::group(
    array('prefix' => 'quotes'),
    function() {
        // Load all quotes.
        Route::get('/data', function () {
            // TODO - tenant specific data
            return response()->json(Haddock::all(), 200);
        });
        // Vote for the current quote.
        Route::post('/vote/{id}', 'QuoteController@vote');
    }
);
