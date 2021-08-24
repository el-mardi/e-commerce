<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MarkDownController;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckAuth;
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

// users route

Route::get('/',[HomeController::class, 'home']);
Route::get('/about-us',[HomeController::class, 'about'])->name('about');
Route::get('/categories',[HomeController::class, 'categories'])->name('categories');
Route::get('/shop',[HomeController::class, 'shop'])->name('shop');

Route::get('/login',[UserController::class ,'logIn']);
Route::get('/logout',[UserController::class ,'logout']);

Route::resource('user',UserController::class)->except('index');

// admin route

Route::get('/adminPanel/login',[AdminController::class ,'logIn'])->name('addminLogin');
Route::post('/adminPanel/login',[AdminController::class ,'addminLoginValidation'])->name('addminLoginValidation');
Route::get('/adminPanel/logout',[AdminController::class ,'logout'])->name('addminLogout');

// dashboard


Route::middleware([CheckAuth::class])->group(function () {
    
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');   
    Route::resource('user',UserController::class)->only('index');
    Route::resource('category',CategoryController::class);
    Route::resource('admin',AdminController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('markdown',MarkDownController::class);
    Route::resource('picture',PictureController::class);
    Route::resource('order',OrderController::class);

   
});
