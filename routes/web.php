<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\ArsipController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('admin/stock', StockController::class)->names([
    'index'   => 'admin.stock',
    'create'  => 'admin.stock.create',
    'store'   => 'admin.stock.store',
    'edit'    => 'admin.stock.edit',
    'update'  => 'admin.stock.update',
    'destroy' => 'admin.stock.destroy',
]);

// Routes untuk Memo
Route::get('/memo', [MemoController::class, 'index'])->name('memo.index');
Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create');
// Tambahkan route lain untuk memo sesuai kebutuhan

// Routes untuk Arsip
Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
// Tambahkan route lain untuk arsip sesuai kebutuhan