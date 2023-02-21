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

//Home Page Route
Route::get('/', [ListingController::class,'index']);
//Create Page Route
Route::get('/listing/create', [ListingController::class,'create'])->middleware("auth");
//Add a listing Route
Route::post('/listing', [ListingController::class,'store'])->middleware("auth");
//Manage Listings Page Route
Route::get('/listings/manage', [ListingController::class,'manage'])->middleware("auth");
//Edit Page Route
Route::get('/listing/{listing}/edit', [ListingController::class,'edit'])->middleware("auth");
//Delete a listing Route
Route::delete('/listing/{listing}/delete', [ListingController::class,'destroy'])->middleware("auth");
//Update a listing Route
Route::put('/listing/{listing}', [ListingController::class,'update'])->middleware("auth");
//Show one listing
Route::get('/listing/{listing}', [ListingController::class,'show']);


//Register Page Route
Route::get('/register', [UserController::class,'create'])->middleware("guest");

//Add user (Register)
Route::post('/users', [UserController::class,'store']);

//Logout Route
Route::post('/logout', [UserController::class,'logout']);

//Login Page Route
Route::get('/login', [UserController::class,'login'])->name("login")->middleware("guest");

//Authenticate user Route
Route::post('/users/authenticate', [UserController::class,'authenticate']);






