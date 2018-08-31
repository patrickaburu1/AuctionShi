<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('modal', function () {
    return view('products.modal');
});


Route::get('/', 'ProductController@allproducts');

Route::get('/dashboard', 'ProductController@allproducts');

Route::get('/upload-product','ProductController@index');

Route::post('/upload-product', 'ProductController@uploadProduct');

Route::get('/all-products', 'ProductController@allproducts');

Route::post('/place-bid/{product}', 'ProductController@placeBid');

/*products based on category*/
Route::get('/category/{category}', 'CategoryController@productsBasedOnCategory');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

