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



Route::get('/all-products', 'ProductController@allproducts');



/*products based on category*/
Route::get('/category/{category}', 'CategoryController@productsBasedOnCategory');



Auth::routes();

Route::get('/home', 'ProductController@allproducts')->name('home');

/*protect routes*/
Route::group(['middleware'=>'auth'], function () {
    Route::get('/upload-product','ProductController@index');

    Route::post('/upload-product', 'ProductController@uploadProduct');

    Route::any('/place-bid/{product}', 'ProductController@placeBid');


    Route::get('/my-products', 'MyProductsController@myProducts');

    Route::get('/running-products', 'MyProductsController@runningProducts');

    Route::get('/sold-products', 'MyProductsController@soldProducts');

    Route::get('/suspended-products', 'MyProductsController@suspendedProducts');

    Route::get('/close-bid/{product_id}/{bid_id}', 'MyProductsController@closeBid');

    Route::get('/bidders/{product_id}', 'BiddersController@bidders');


    Route::get('/won-bids', 'BiddersController@wonBids');

    Route::get('/placed-bids', 'BiddersController@placedBids');


    Route::get('/withdraw-bid/{bid_id}', 'BiddersController@withdrawBid');


    Route::get('/top-up', 'AccountController@index');

    Route::post('/top-up', 'AccountController@topup');
    Route::get('/transactions', 'AccountController@transactions');


    Route::get('/products', 'AdminController@products');

    Route::get('/suspend-product/{productId}', 'AdminController@suspendProduct');

    Route::get('/addcategory', 'AdminController@category');

    Route::post('/add-category', 'AdminController@addCategory');

});