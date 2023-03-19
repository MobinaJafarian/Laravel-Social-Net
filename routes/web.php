<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();
Route::get('/' , [HomeController::class , 'mainPage']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/submit_feed' ,[FeedController::class  ,'submit_feed'] )->name('submit_feed');
Route::post('/like_feed' , [FeedController::class , 'like_feed'])->name('like_feed');

Route::get('/user/{user}' , [ProfileController::class , 'index'])->name('profile_page');
Route::post('/user/{user}/follow' , [ProfileController::class , 'follow'])->name('follow_user');