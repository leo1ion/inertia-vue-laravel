<?php

use Illuminate\Support\Facades\Route;
// require('../App/Http/Controllers/ProductsController.php');
use App\Http\Controllers\ProductsController;
use Inertia\Inertia;

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

Route::get('/', [ProductsController::class, 'addProduct'])->name('add-products');
Route::post('/save-product', [ProductsController::class, 'saveProduct'])->name('save-product');

