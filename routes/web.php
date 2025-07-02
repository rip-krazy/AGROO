<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StockController;


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


