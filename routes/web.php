<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhMucTruyenController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\chapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\theloaiController;
use App\Http\Controllers\SachController;


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
Route::get('/xem-chapter/{slug}',[IndexController::class,'xemchapter']); 
Route::get('/the-loai/{slug}',[IndexController::class,'theloai']); 

Route::get('/tag/{tag}',[IndexController::class,'tag']); 

Route::get('/doc-sach',[IndexController::class,'docsach']); 
Route::post('/xem-sach-nhanh',[IndexController::class,'xemsachnhanh']); 
 
Route::post('/tim-kiem',[IndexController::class,'timkiem']); 
Route::post('/timkiem-ajax',[IndexController::class,'timkiemajax']); 
Route::post('/truyen-noi-bat',[TruyenController::class,'truyennoibatajax']); 
Route::post('/tab-danh-muc',[IndexController::class,'tabsdanhmuc']); 

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', DanhMucTruyenController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/sach', SachController::class);
Route::resource('/chapter', chapterController::class);
Route::resource('/theloai', theloaiController::class);


