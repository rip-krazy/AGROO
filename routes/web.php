<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\UnitController;

>>>>>>> 772c99cc0fba803d913f6735d2bccdb5c00fd1c2

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

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
=======
Route::get('/welcome2', function () {
    return view('welcome2');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
>>>>>>> 772c99cc0fba803d913f6735d2bccdb5c00fd1c2

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<<<<<<< HEAD
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
});
=======
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
>>>>>>> 772c99cc0fba803d913f6735d2bccdb5c00fd1c2
