<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@product')->name('products.id');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/addItem', 'CartController@addItem')->name('cart.addItem');
