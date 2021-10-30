<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;


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



Route::get('/', [HomeController::class, 'index']);
Route::get('/admin/login', [LoginController::class, 'index']);
Route::post('/admin/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::get('/admin/akun', [AdminController::class, 'index']);
    Route::get('/admin/akun/tambah', [AdminController::class, 'create']);
    Route::post('/admin/akun/tambah', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('/admin/akun/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/akun/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/akun/{id}', [AdminController::class, 'update'])->name('admin.update');

    Route::get('/admin/katalog', [CatalogueController::class, 'index']);
    Route::get('/admin/katalog/tambah', [CatalogueController::class, 'create']);
    Route::post('/admin/katalog/tambah', [CatalogueController::class, 'store'])->name('catalogue.store');
    Route::delete('/admin/katalog/{id}', [CatalogueController::class, 'destroy'])->name('catalogue.destroy');
    Route::get('/admin/katalog/{id}', [CatalogueController::class, 'edit'])->name('catalogue.edit');
    Route::post('/admin/katalog/{id}', [CatalogueController::class, 'update'])->name('catalogue.update');
    Route::get('/admin/katalog/detail/{id}', [CatalogueController::class, 'show'])->name('catalogue.show');
   
    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');
 
});


