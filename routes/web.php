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

//Маршруты Администратора:
Route::get('/admin', \App\Http\Controllers\AdminController::class)->middleware('is_admin');

//Маршруты Фотоаппаратов
Route::resource('cameras', \App\Http\Controllers\CamerasController::class)->middleware('is_admin');

//Маршруты Видеокамер
Route::resource('videcameras', \App\Http\Controllers\VideocamerasController::class)->middleware('is_admin');

//Маршруты Пользователей
Route::resource('users', \App\Http\Controllers\UsersController::class)->middleware('is_admin');