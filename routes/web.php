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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/customer', function () {
    return view('customer');
});


Route::get('/Exercise', function () {
    return view('Exercise');
});

Route::get('/explorer', function () {
    return view('explorer');
});

Route::get('/header', function () {
    return view('header');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/order_item', function () {
    return view('order_item');
});

Route::get('/report', function () {
    return view('report');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/sidebar', function () {
    return view('sidebar');
});

Route::get('/user', function () {
    return view('user');
});

Route::get('/login', function () {
    return view('login');
});

//proses_delete_katmenu
use App\Http\Controllers\proses_delete_katmenu;

Route::post('/hapus-kategori', [proses_delete_katmenu::class, 'deleteKategori'])->name('kategori.delete');

//proses_delete_menu
use App\Http\Controllers\proses_delete_menu;

Route::post('/hapus-menu', [proses_delete_menu::class, 'deleteMenu'])->name('menu.delete');

//proses_delete_order
use App\Http\Controllers\proses_delete_order;

Route::post('/hapus-order', [proses_delete_order::class, 'deleteOrder'])->name('order.delete');

//proses_delete_user
use App\Http\Controllers\proses_delete_user;

Route::post('/hapus-user', [proses_delete_user::class, 'deleteUser'])->name('user.delete');

//proses_edit_katmenu
use App\Http\Controllers\proses_edit_katmenu;

Route::post('/hapus-user', [proses_edit_katmenu::class, 'deleteUser'])->name('user.delete');

//proses_edit_menu
use App\Http\Controllers\proses_edit_menu;

Route::post('/update-menu', [proses_edit_menu::class, 'updateMenu'])->name('menu.update');

//proses_edit_order
use App\Http\Controllers\proses_edit_order;

Route::post('/order/update', [proses_edit_order::class, 'updateOrder'])->name('order.update');

//proses_edit_user
Route::put('/user/{id}', [proses_edit_user::class, 'update'])->name('user.update');

//proses_input_katmenu
Route::post('/katmenu/insert', 'proses_input_katmenu@insert')->name('katmenu.insert');


//proses_input_menu
Route::post('/menu/insert', 'proses_input_menu@insert')->name('menu.insert');

//proses_input_order
Route::post('/order/insert', 'proses_input_order@insert')->name('order.insert');





//proses_login
use App\Http\Controllers\proses_login;

Route::post('/login', [proses_login::class, 'login'])->name('login');






// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
