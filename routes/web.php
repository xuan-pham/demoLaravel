<?php

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

Route::get('/', 'HomeController@index')->name('home.index'); //route(home.index)
Route::get('/shop', 'HomeController@shop')->name('home.shop');
/**
 * get => account.index => danh sach
 * get => account.create => form them moi
 * post => account.store => khi submit form them moi
 * get => account.show => xem chi tiet
 * get => account.edit => hien thi form edit
 * put => account.update => khi submit form edit
 * dalete => account.destroy => khi xoa
 */

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('admin/logout', 'AdminController@logout')->name('logout');
    Route::resources([
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'banner' => 'BannerController',
        'account' => 'AccountController',
        'blog' => 'BlogController',
        'order' => 'OrderController',
        'changepw'=>'ChangepwController'
    ]);
});

Route::get('admin/login', 'AdminController@login')->name('login');
Route::post('admin/login', 'AdminController@postLogin')->name('login');
Route::get('admin/forgot', 'AdminController@forgot')->name('forgot');
Route::get('admin/register', 'AdminController@register')->name('register');
Route::post('admin/register', 'AdminController@postregister')->name('register');
Route::get('admin/forgotpassword', 'AdminController@forgot')->name('forgot');



