<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Admin\PanduanController;



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

Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan');

Route::get('/dashboard', function () {
    return view('dashboard');



})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/welcome2', function () {
    return view('welcome2');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
});
// Routes untuk Arsip
Route::get('admin/arsip', [ArsipController::class, 'index'])->name('admin.arsip.index');
Route::get('admin/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');

// Tambahkan route lain untuk arsip sesuai kebutuhan

Route::resource('admin/unit', UnitController::class)->names([
    'index'   => 'admin.unit',
    'create'  => 'admin.unit.create',
    'store'   => 'admin.unit.store',
    'edit'    => 'admin.unit.edit',
    'update'  => 'admin.unit.update',
    'destroy' => 'admin.unit.destroy',
]);

Route::resource('admin/stock', StockController::class)->names([
    'index'   => 'admin.stock',
    'create'  => 'admin.stock.create',
    'store'   => 'admin.stock.store',
    'edit'    => 'admin.stock.edit',
    'update'  => 'admin.stock.update',
    'destroy' => 'admin.stock.destroy',
]);

// Routes untuk Memo
Route::get('admin/memo', [MemoController::class, 'index'])->name('admin.memo.index');
Route::get('admin/memo/create', [MemoController::class, 'create'])->name('memo.create');
// Tambahkan route lain untuk memo sesuai kebutuhan

// Routes untuk Arsip
Route::get('admin/arsip', [ArsipController::class, 'index'])->name('admin.arsip.index');
Route::get('admin/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');