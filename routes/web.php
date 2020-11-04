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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ProductListController@index');
Route::get('/product/{id}', 'ProductListController@show') -> name('product.view');
Route::get('/category/{name}', 'ProductListController@allProduct') -> name('product.list');
Route::get('/checkout/{amount}', 'CardController@checkout') -> name('card.checkout');
Route::get('/addToCard/{product}', 'CardController@addToCard') -> name('add.card');
Route::get('/card', 'CardController@showCard') -> name('card.show');
Route::post('/products/{product}', 'CardController@updateCard') -> name('card.update');
Route::post('/product/{product}', 'CardController@destroyCard') -> name('card.destroy');


Auth::routes();
Route::get('/home', 'HomeController@index') -> name('home');

Route::group(['prefix' => 'auth', 'middleware' => ['auth', 'isAdmin']],
function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubcategoryController');
    Route::resource('product', 'ProductController');
    Route::get('subcategories/{id}', 'ProductController@loadSubCategories');

});

