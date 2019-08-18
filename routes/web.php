<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{code}', 'CategoryController@category')->name('category.code');
Route::get('/products/{id}', 'ProductController@product')->name('products.id');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/addItem', 'CartController@addItem')->name('cart.addItem');

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    Route::get('/','HomeController@index')->name('home');
    Route::get('/dashboard','HomeController@index')->name('home');

    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::get('/products', 'ProductController@index')->name('products');

    Route::namespace('Auth')->group(function() {

        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login')->name('login');
        Route::post('/logout','LoginController@logout')->name('logout');

//        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
//        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
//        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    });
});
