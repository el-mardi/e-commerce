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
use App\Http\Controllers\UserAccountController;


use App\Http\Controllers\Ajax\AjaxSearchRequestController;
use App\Http\Controllers\Ajax\AjaxRequestController;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckUserAuth;

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
Route::get('/login',[UserController::class ,'logIn'])->name('login');
Route::resource('user',UserController::class)->only('create','store');

Route::post('/login-val',[UserController::class ,'login_Val'])->name('loginVal');
Route::get('/logout',[UserController::class ,'logout'])->name('logout');

Route::middleware([CheckUserAuth::class])->group(function(){

    Route::prefix('account')->group(function () {
        Route::get('/{user}/edit', [UserAccountController::class, 'edit'])->name('editAccount');
        Route::get('/notifications', [UserAccountController::class, 'notifications'])->name('notifications');
    });

});


// admin route

Route::get('/adminPanel/login',[AdminController::class ,'logIn'])->name('addminLogin');
Route::post('/adminPanel/login',[AdminController::class ,'addminLoginValidation'])->name('addminLoginValidation');
Route::get('/adminPanel/logout',[AdminController::class ,'logout'])->name('addminLogout');

// dashboard


Route::middleware([CheckAuth::class])->group(function () {
    
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');   
    Route::resource('user',UserController::class)->except('create','store');
    Route::resource('category',CategoryController::class);
    Route::resource('admin',AdminController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('markdown',MarkDownController::class);
    Route::resource('picture',PictureController::class);
    Route::resource('order',OrderController::class);

   
});


            // AJAX Routes

    Route::post('/addOrder',[AjaxRequestController::class, 'createOrder'])->name('createOrder');
    
    Route::post('/search-user',[AjaxSearchRequestController::class, 'searchUser'])->name('searchUser');
    Route::post('/search-admin',[AjaxSearchRequestController::class, 'searchAdmin'])->name('searchAdmin');
    Route::post('/search-category',[AjaxSearchRequestController::class, 'searchCategory'])->name('searchCategory');
    Route::post('/search-product',[AjaxSearchRequestController::class, 'searchProduct'])->name('searchProduct');
    Route::post('/search-order',[AjaxSearchRequestController::class, 'searchOrder'])->name('searchOrder');
    Route::post('/search-markdown',[AjaxSearchRequestController::class, 'searchMarkDown'])->name('searchMarkDown');
    