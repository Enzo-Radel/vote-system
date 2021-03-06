<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnqueteController;

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

Route::get('/', function() {
    return redirect()->route('enquete.index');
});
Route::resource('/enquete', EnqueteController::class)->except('show');
Route::get('/enquete/{id}', [EnqueteController::class, 'vote']);
Route::post('/enquete/{id}/save-vote', [EnqueteController::class, 'saveVote']);