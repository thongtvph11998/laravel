<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\DetailProController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginFeController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




Route::get('login', [LoginController::class, 'getLoginForm'])->name('auth.getLoginForm');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');

  //fronted
  Route::group([
    'as'=>'frontend.'
], function(){
        Route::get('/',[HomeController::class,'index'])->name('home');
        Route::get('login_fe',[LoginFeController::class,'index'])->name('login');
        Route::get('cart',[CartController::class,'index'])->name('cart');
        Route::get('categories/{id}',[HomeController::class,'products'])->name('cate-pro');
        Route::get('detail/{id}',[HomeController::class,'productDetail'])->name('pro-detail');
        Route::get('register',[HomeController::class,'register'])->name('register');
        Route::post('register_user',[HomeController::class,'store'])->name('register-user');
});
Route::group([
    'middleware' => ['check_login'],
], function () {

    Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['check_admin'],

], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::group([
        'prefix' => 'users',
        'as' => 'users.',

    ], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update');
        Route::post('delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
    });
    //category
    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.',
    ], function () {

        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('create', [CategoryController::class, 'create'])->name('create');

        Route::post('store', [CategoryController::class, 'store'])->name('store');

        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');

        Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
    //products
    Route::group([
        'prefix' => 'products',
        'as' => 'products.'
    ], function () {

        Route::get('/', [ProductController::class, 'index'])->name('index');

        Route::get('create', [ProductController::class, 'create'])->name('create');

        Route::post('store', [ProductController::class, 'store'])->name('store');

        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');

        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');

        Route::post('delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });
    // Invoices
    Route::group([
        'prefix' => 'invoices',
        'as' => 'invoices.',

    ], function () {
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
        Route::get('create', [InvoiceController::class, 'create'])->name('create');
        Route::post('store', [InvoiceController::class, 'store'])->name('store');
        Route::get('edit/{id}', [InvoiceController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [InvoiceController::class, 'update'])->name('update');
        Route::post('delete/{id}', [InvoiceController::class, 'delete'])->name('delete');
    });
});
});



// Products
