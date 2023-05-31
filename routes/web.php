<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardGroupController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardCategoryController;

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

Route::get('/', function () {
    return view('index');
});

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
);


Route::resource('/dashboard/product', DashboardProductController::class);
Route::resource('/dashboard/product-categories', DashboardCategoryController::class);
Route::resource('/dashboard/group-user', DashboardGroupController::class);
Route::resource('/dashboard/user', DashboardUserController::class);