<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SaleController::class, 'index'])->middleware(['auth'])->name('index');

Route::prefix('pos')->group(function () {
    Route::get('/pay', [SaleController::class, 'pay']); //returns the payment view
    Route::get('/receipt', [SaleController::class, 'receipt']); //displayes reciept
    Route::post('/save', [SaleController::class, 'save']); // store sales into db
});

Route::get('/dashboard', [SaleController::class, 'index'])->middleware(['auth'])->name('dashboard'); //Todo remove this one


Route::get('/product', [ProductController::class, 'index']);

Route::get('/pos', [SaleController::class, 'index'])->middleware(['auth'])->name('pos');


Route::get('/inventory', function () {
    return view('inventory');
})->middleware(['auth'])->name('inventory');

require __DIR__.'/auth.php';
