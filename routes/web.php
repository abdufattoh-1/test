<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\AdresController;
use App\Http\Controllers\CollectiveController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\VidioController;
use App\Http\Controllers\DownloadFileController;

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

Route::get('/',[IndexController::class,'index']);
Route::get('/about',[IndexController::class,'about']);
Route::get('/contact',[IndexController::class,'contact']);
Route::get('/videos',[IndexController::class,'videos']);
Route::get('/video-detail',[IndexController::class,'video_detail']);
Route::get('/photo-detail/{id}',[IndexController::class,'photo_detail']);


Route::resource('admin/images',ImageController::class)->middleware('auth');
Route::resource('tags',TagsController::class)->middleware('auth');
Route::resource('adres',AdresController::class)->middleware('auth');
Route::resource('collective',CollectiveController::class)->middleware('auth');
Route::resource('media',MediaController::class)->middleware('auth');
Route::resource('admin/videos',VidioController::class)->middleware('auth');

Route::get('get/{filename}', [DownloadFileController::class, 'getFile'])->name('getfile');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
