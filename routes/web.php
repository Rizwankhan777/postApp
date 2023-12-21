<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PostController::class, 'admin_login'])->name('login');
Route::get('/register', [PostController::class, 'register'])->name('register');
Route::post('/registeration', [PostController::class, 'register_form'])->name('registeration');
Route::post('/authentication', [PostController::class, 'authentication'])->name('authentication');

Route::get('/index', [PostController::class,'index'])->name('posts');
Route::post('/post', [PostController::class,'postData'])->name('post');

Route::get('/profile', [PostController::class,'profile'])->name('profile');

Route::post('/reaction', [PostController::class,'reaction'])->name('reaction');

Route::get('/product',[ProductController::class,'product'])->name('product');

Route::post('/addProduct',[ProductController::class,'addProduct'])->name('addProduct');

Route::get('/productDetail/{id}',[ProductController::class,'productDetail'])->name('productDetail');

Route::post('/addToCart',[CartController::class,'addToCart'])->name('addToCart');
// delete Cart Item
Route::post('/deleteCartItem',[CartController::class,'deleteCartItem'])->name('deleteCartItem');
// update cart

Route::post('/updateCart',[CartController::class,'updateCart'])->name('updateCart');

Route::middleware(['auth'])->group(function () {
    Route::get('/cartListing',[CartController::class,'cartView'])->name('cartListing');
    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
});

Route::post('/comment', [PostController::class,'commentData'])->name('comment');

Route::get('/getData', [PostController::class,'getData'])->name('getData');

