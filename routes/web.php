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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomerouteController@home')->name('home');
Route::get('/search', 'HomerouteController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth','admin']],function(){
	Route::get('/dashboard', function () {
    return view('admin.dashboard');
	});
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
});
Route::get('/about', 'HomerouteController@about')->name('about');

Route::get('/role-Register','Admin\DashboardController@register');
Route::delete('/role-Register-delete/{id}','Admin\DashboardController@delete');
Route::get('userchangeStatus','Admin\DashboardController@userchangeStatus')->name('user.status');
Route::get('/my-profile','Admin\DashboardController@myprofile');
Route::get('/my-order-view/{id}','Admin\DashboardController@view');

Route::get('/change-password','ChangePassword@index');
Route::post('/password-update','ChangePassword@update')->name('change.password');
// Route::get('/change-password-','ChangePassword@index');



Route::get('/food','Food\FoodController@food');
Route::get('/food-create','Food\FoodController@foodup');
Route::post('/food-store','Food\FoodController@foodstore');
Route::get('/food/{id}','Food\FoodController@foodedit');
Route::put('/food-update/{id}','Food\FoodController@foodupdate');
Route::delete('/food-delete/{id}','Food\FoodController@fooddelete');
Route::get('foodchangeStatus','Food\FoodController@foodchangeStatus')->name('food.status');

Route::get('/food-categories','Food\FoodController@foodcategories');
Route::get('/food-categories-create','Food\FoodController@foodcategoriescreate');
Route::post('/category-store','Food\FoodController@foodcategoriesstore');
Route::get('/food-categories/{id}','Food\FoodController@foodcategoriesedit');
Route::put('/food-categories-update/{id}','Food\FoodController@foodcategoriesupdate');
Route::delete('/food-categories-delete/{id}','Food\FoodController@foodcategoriesdelete');
Route::get('/food-order/{id}','Food\FoodController@order');

Route::get('/calculator','CalculatorController@calculator');

// Route::post('/calculator',[
//      'uses' => 'CalculatorController@calculator', 
//      'as' => 'test.route'
// ]);


Route::get('/cart','Food\CartController@index');
Route::post('/cart','Food\CartController@store');
Route::delete('/cart-delete/{id}','Food\CartController@delete');
Route::post('/cart-update','Food\CartController@updateQuantity');
Route::get('/check-out','Food\CheckoutController@index');


Route::get('/order','Food\OrderController@index');
Route::post('/order-store','Food\OrderController@store');
Route::get('/order-view/{id}','Food\OrderController@view');
Route::delete('/order-delete/{id}','Food\OrderController@delete');
Route::get('orderStatus','Food\OrderController@orderStatus')->name('order.status');

Route::get('/my-order/','Admin\DashboardController@myorder');
Route::get('categorieschangeStatus','Food\FoodController@categorieschangeStatus')->name('categories.status');


Route::get('/medical-term','Food\MedicalController@index');
Route::get('/medical-term-create','Food\MedicalController@create');
Route::post('/medical-term-store','Food\MedicalController@store');
Route::get('/medical-term/{id}','Food\MedicalController@edit');
Route::put('/medical-term-update/{id}','Food\MedicalController@update');
Route::delete('/medical-term-delete/{id}','Food\MedicalController@delete');
Route::get('changedStatus','Food\MedicalController@changedStatus')->name('changed.status');


