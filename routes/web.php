<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Yield_;

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
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pb', [PageController::class, 'pb']);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);

Route::patch('/cart/cookie', [CartController::class, 'updateCookie'])->name('cart.cookie.update');
Route::delete('/cart/cookie', [CartController::class, 'deleteCookie'])->name('cart.cookie.delete');
Route::resource('cart', CartController::class);

Route::get('/js_test', function () {
    return view('js_test.index');
});

Route::get('/download/{id}', [pageController::class, 'download'])
    ->where('id', '[0-9]+'); //where代表id只能在0-9
