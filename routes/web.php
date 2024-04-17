<?php

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
//Главные маршруты сайта
Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('О-нас');
});
Route::get('/contacts', function () {
    return view('Контакты');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Маршруты Магазина
Route::get('/magazin', function () {
    return view('Магазин');
});

Route::get('/cameras/shop', [\App\Http\Controllers\CamerasController::class, 'shop']);

Route::get('/videocameras/shop', [\App\Http\Controllers\VideocamerasController::class, 'shop']);

Route::get('/accessories/shop', [\App\Http\Controllers\AccessoriesController::class, 'shop']);

Route::get('/cart/add/{type}/{id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');

Route::get('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/checkout/form', [App\Http\Controllers\CartController::class, 'showCheckoutForm'])->name('checkout');

Route::post('/checkout', [App\Http\Controllers\CartController::class, 'submitCheckoutForm'])->name('checkout.submit');


Route::get('/cart', function () {
    return view('cart');
})->name('cart');


//Маршруты Администратора:
Route::get('/admin', \App\Http\Controllers\AdminController::class)->middleware('is_admin');

//Маршруты Фотоаппаратов
Route::resource('cameras', \App\Http\Controllers\CamerasController::class)->middleware('is_admin');

//Маршруты Видеокамер
Route::resource('videocameras', \App\Http\Controllers\VideocamerasController::class)->middleware('is_admin');

//Маршруты Аксессуаров
Route::resource('accessories', \App\Http\Controllers\AccessoriesController::class)->middleware('is_admin');

//Маршруты Пользователей
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('is_admin');

Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders.index');