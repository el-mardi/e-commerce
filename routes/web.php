<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
Route::resource('user',UserController::class);
Route::get('/login',[UserController::class ,'logIn']);
Route::get('/logout',[UserController::class ,'logout']);



// admin route

Route::get('/adminPanel/login',[AdminController::class ,'logIn'])->name('addminLogin');
Route::post('/adminPanel/login',[AdminController::class ,'addminLoginValidation'])->name('addminLoginValidation');
Route::get('/adminPanel/logout',[AdminController::class ,'logout'])->name('addminLogout');

// dashboard



Route::middleware([CheckAuth::class])->group(function () {

    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');   
    Route::get('/dashboard/category',[CategoryController::class,'home'])->name('categoryHome');
    Route::get('/dashboard/product',[ProductController::class,'home'])->name('productHome');
    Route::get('/dashboard/admins',[AdminController::class,'home'])->name('adminsHome');
    Route::get('/dashboard/users',[UserController::class,'home'])->name('usersHome');
    // Route::get('/dashboard/commande',[CategoryController::class,'home'])->name('categoryHome');
    Route::resource('category',CategoryController::class);
    Route::resource('admin',AdminController::class);

   
});