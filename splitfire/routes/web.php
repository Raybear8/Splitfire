<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
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

Route::get('/', function (){
    return view('welcome');
});
Route::post('/generation', [TweetController::class, 'generation']);

Route::prefix('tweet')->group(function(){
    Route::get('/nouveau', [TweetController::class, 'new']);
});

Route::prefix('tweets')->group(function(){
    Route::post('/', [TweetController::class, 'insert']);
    Route::get('/', [TweetController::class, 'list']);
});


