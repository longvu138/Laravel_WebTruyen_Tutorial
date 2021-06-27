<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhMucTruyenController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\chapterController;
use App\Http\Controllers\IndexController;


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

Route::get('/',[IndexController::class,'home']); 
Route::get('/danh-muc/{slug}',[IndexController::class,'danhmuc']); 

Route::get('/xem-truyen/{slug}',[IndexController::class,'xemtruyen']); 


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', DanhMucTruyenController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', chapterController::class);


