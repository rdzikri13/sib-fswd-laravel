<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', [UserController::class, 'getUser'])->name('home');
Route::middleware('admin')->group(function (){
    Route::resource('user', UserController::class);
    Route::resource('produk', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('slider', SliderController::class);
    Route::get('/admin',[HomeController::class, 'showAdmin'])->name('admin');
    Route::get('/staff',[HomeController::class, 'showStaff'])->name('staff');
    Route::get('/users',[HomeController::class, 'showUser'])->name('user');
    Route::get('/dashboard',[HomeController::class, 'showDashboard']);
});
Route::middleware('staff')->group(function(){
    Route::get('/dashboard',[HomeController::class, 'showDashboard']);
    Route::get('/user/create',[UserController::class, 'create']);
    Route::get('/user',[UserController::class, 'index'])->name('user.index');
    Route::get('/user/{id}',[UserController::class, 'show']);
    Route::get('/categories/create',[CategoryController::class, 'create']);
    Route::get('/categories',[CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}',[CategoryController::class, 'show']);
    Route::get('/produk/create',[ProductController::class, 'create']);
    Route::get('/produk',[ProductController::class, 'index'])->name('produk.index');
    Route::get('/produk/{id}',[ProductController::class, 'show']);
    Route::get('/slider/create',[SliderController::class, 'create']);
    Route::get('/slider',[SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/{id}',[SliderController::class, 'show']);
});
Route::get('/',[HomeController::class, 'index'])->name('dashboard');
Route::get('/products/{id}',[HomeController::class, 'detailProducts'])->name('product.detail')->middleware('auth');
Route::get('/products',[HomeController::class, 'getProducts'])->name('user.products');
Route::get('/search',[HomeController::class, 'search'])->name('search');
Route::get('/price',[HomeController::class, 'price'])->name('price');
Route::get('/login',[LoginRegisterController::class, 'login'])->name('login');
Route::get('/register',[LoginRegisterController::class, 'register'])->name('register');
Route::get('/logout',[LoginRegisterController::class, 'logout']);
Route::post('store',[LoginRegisterController::class, 'storeUser'])->name('store');
Route::post('auth',[LoginRegisterController::class, 'auth'])->name('auth');
// Route::get('/insert',[UserController::class,'showInsert']);
// Route::post('add',[UserController::class,'addUser']);
// Route::get('/detail/{id}',[UserController::class, 'showUser']);
// Route::get('/edit/{id}',[UserController::class, 'editUser']);
// Route::post('update',[UserController::class, 'updateUser'])->name('users.update');