<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ListingController::class,'index']);
Route::get('/listing/create', [ListingController::class,'create']);
Route::post('/listing', [ListingController::class,'store']);
Route::get('/listing/{listing}/edit', [ListingController::class,'edit']);
Route::delete('/listing/{listing}/delete', [ListingController::class,'destroy']);
Route::put('/listing/{listing}', [ListingController::class,'update']);
Route::get('/listing/{listing}', [ListingController::class,'show']);



Route::get('/register', [UserController::class,'create']);
Route::post('/users', [UserController::class,'store']);

Route::post('/logout', [UserController::class,'logout']);

Route::get('/login', [UserController::class,'login']);

Route::post('/users/authenticate', [UserController::class,'authenticate']);




