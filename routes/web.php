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
Route::get('/ttt', function () {
    return view('Вход');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
