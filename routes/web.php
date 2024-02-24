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

// FE
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/detail/{id}', 'App\Http\Controllers\HomeController@detail');
Route::get('/shop', 'App\Http\Controllers\HomeController@shop');
Route::get('/shop', 'App\Http\Controllers\HomeController@search');
Route::get('/shop/{id}', 'App\Http\Controllers\HomeController@shop_category');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact');
Route::get('/cart', 'App\Http\Controllers\HomeController@cart');
Route::get('/check_out', 'App\Http\Controllers\HomeController@check_out');
Route::get('/cart/{id}', 'App\Http\Controllers\CartController@AddCart');
Route::post('/update_cart', 'App\Http\Controllers\CartController@UpdateCart');
Route::get('/delete_cart/{id}', 'App\Http\Controllers\CartController@DeleteCart');
Route::get('/delete_all', 'App\Http\Controllers\CartController@DeleteAll');
Route::post('/add_detail', 'App\Http\Controllers\CartController@AddDetail');
Route::get('/shop_filter', 'App\Http\Controllers\HomeController@filter');
Route::get('/shop_filterP', 'App\Http\Controllers\HomeController@filterP');
Route::get('/user', 'App\Http\Controllers\HomeController@login');
Route::post('/user/sign_in', 'App\Http\Controllers\HomeController@sign_in');
Route::get('/user/log_out', 'App\Http\Controllers\HomeController@log_out');
Route::get('/place_order', 'App\Http\Controllers\CartController@PlaceOrder');
Route::get('/history_checkout', 'App\Http\Controllers\CartController@history_checkout');
Route::get('/detail_checkout', 'App\Http\Controllers\CartController@detail_checkout');


// BE

    Route::get('admin_register', 'App\Http\Controllers\AdminController@register');
    Route::post('admin/register', 'App\Http\Controllers\AdminController@admin_register');
    Route::get('admin', 'App\Http\Controllers\AdminController@login')->name('login');
    Route::post('admin/sign_in', 'App\Http\Controllers\AdminController@sign_in');

Route::group(['prefix' => 'admin', 'middleware' => 'checkLogin'], function() {
    Route::get('dashboard', 'App\Http\Controllers\AdminController@index');
    Route::get('log_out', 'App\Http\Controllers\AdminController@log_out');
    Route::get('add_category', 'App\Http\Controllers\CategoryController@add_category');
    Route::get('list_category', 'App\Http\Controllers\CategoryController@list_category');
    Route::get('category', 'App\Http\Controllers\CategoryController@category');
    Route::get('list_category', 'App\Http\Controllers\CategoryController@get_category');
    Route::get('list_category/{id}', 'App\Http\Controllers\CategoryController@delete_category');
    Route::get('edit_category/{id}', 'App\Http\Controllers\CategoryController@edit_category');
    Route::get('update_category', 'App\Http\Controllers\CategoryController@update_category');

    Route::get('add_product', 'App\Http\Controllers\ProductController@add_product');
    Route::post('product', 'App\Http\Controllers\ProductController@product');
    Route::get('list_product', 'App\Http\Controllers\ProductController@get_product');
    Route::get('list_product/{id}', 'App\Http\Controllers\ProductController@delete_product');
    Route::get('edit_product/{id}', 'App\Http\Controllers\ProductController@edit_product');
    Route::post('update_product', 'App\Http\Controllers\ProductController@update_product');
    Route::get('list_checkout', 'App\Http\Controllers\CartController@admin_checkout');
    Route::get('detail_checkout', 'App\Http\Controllers\CartController@admin_detail_checkout');
    Route::get('detail_checkout_update', 'App\Http\Controllers\CartController@detail_checkout_update');
    Route::get('search_check_out', 'App\Http\Controllers\CartController@search_check_out');
    Route::get('list_user', 'App\Http\Controllers\UserController@index');
    Route::get('add_user', 'App\Http\Controllers\UserController@add_user');
    Route::get('create', 'App\Http\Controllers\UserController@create');
    Route::get('index_permission', 'App\Http\Controllers\PermissionController@index_permission');
    Route::get('index_role', 'App\Http\Controllers\PermissionController@index_role');
    Route::get('create_permission', 'App\Http\Controllers\PermissionController@create_permission');
    Route::get('create_role', 'App\Http\Controllers\PermissionController@create_role');
    Route::get('list_role', 'App\Http\Controllers\PermissionController@list_role');
    Route::get('list_permission', 'App\Http\Controllers\PermissionController@list_permission');
    Route::get('phan_quyen', 'App\Http\Controllers\PermissionController@phan_quyen');
    Route::get('vai_tro', 'App\Http\Controllers\PermissionController@vai_tro');
    Route::post('add_permission', 'App\Http\Controllers\PermissionController@add_permission');
    Route::post('add_role', 'App\Http\Controllers\PermissionController@add_role');
});
