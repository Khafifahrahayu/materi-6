<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ClientArtikelController;

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
    return view('welcome');
});

Route::get('/beranda',[HomeController:: class, 'showBeranda']);
Route::get('/index',[UserController:: class, 'homeIndex']);
Route::get('/create',[UserController:: class, 'userCreate']);
Route::get('/kategori',[HomeController:: class, 'showKategori']);

Route::get('/test/{produk}/{hargaMin?}/{hargaMax?}',[HomeController:: class, 'test']);
Route::prefix('admin')->middleware('auth')->group(function(){
        Route::post('artikel/filter', [ArtikelController:: class, 'filter']);
        Route::resource('artikel', ArtikelController:: class);
        Route::post('produk/filter', [ProdukController:: class, 'filter']);
        Route::resource('produk', ProdukController:: class);
        Route::resource('user', UserController:: class);

    });

Route::get('/', [ClientArtikelController::class, 'index']);
Route::post('/filter', [ClientArtikelController::class, 'filter']);
Route::get('baca/{artikel}', [ClientArtikelController::class, 'create']);
Route::post('baca/{artikel}', [ClientArtikelController::class, 'store']);
Route::get('detail/{artikel}', [ClientArtikelController::class, 'show']);
Route::get('komentar/{artikel}/edit', [ClientArtikelController::class, 'edit']);
Route::put('komentar/{artikel}', [ClientArtikelController::class, 'update']);
Route::delete('komentar/{artikel}', [ClientArtikelController::class, 'destroy']);


Route::get('/login',[AuthController:: class, 'showLogin'])->name('login');
Route::post('/login',[AuthController:: class, 'loginProcess']);
Route::get('/logout',[AuthController:: class, 'logout']);


Route::get('/contact', function() {
    return view("contact");
});

Route::get('/register', function() {
    return view("register");
});

Route::get('/home',[ProdukController:: class, 'index']);


Route::get('/about', function () {
    return view("about");
});

Route::get('/contact', function () {
    return view("contact");
});

Route::get('/cart', function () {
    return view("cart");
});

Route::get('/shop', function () {
    return view("shop");
});

Route::get('/checkout', function () {
    return view("checkout");
});

Route::get('/shop-single', function () {
    return view("shop-single");
});

Route::get('/thankyou', function () {
    return view("thankyou");
});

Route::get('/promo', function () {
    return view('promo');
});