<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetsController;
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
Route::post('/generation', [TweetsController::class, 'generation']);

Route::prefix('tweet')->group(function(){
    Route::get('/nouveau', [TweetsController::class, 'new']);
});

Route::prefix('tweets')->group(function(){
    Route::post('/', [TweetsController::class, 'insert']);
    Route::get('/', [TweetsController::class, 'list']);
});


