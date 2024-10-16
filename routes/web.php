<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\BlogController as BackendBlogController;



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



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog'); // Updated to follow naming convention
Route::get('/blog/{id}', [BlogController::class, 'detail'])->name('blog.detail'); // Include {id} for detail
Route::get('/slider', [HomeController::class, 'slider'])->name('slider');

//backend login
Route::get('/backend/login',[LoginController::class,'index'])->name('login');
//backend

 Route::get('backend/blog/tambah',[BackendBlogController::class,'tambah'])->name('backend.blog.tambah');
 Route::post('backend/blog/aksi_tambah',[BackendBlogController::class,'aksi_tambah'])->name('backend.blog.aksi_tambah');
 Route::get('backend/blog',[BackendBlogController::class,'index'])->name('backend.blog');

Route::get('backend/slider',[SliderController::class,'index'])->name('backend.slider');
Route::get('backend/service',[ServiceController::class,'index'])->name('backend.service');

