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

Route::get('/', 'GuestController@index')->name('index');
Route::get('/about', 'GuestController@about')->name('about');
Route::get('/blog', 'GuestController@blog')->name('blog');
Route::get('/boy-single', 'GuestController@boy')->name('boy');
Route::get('/boys', 'GuestController@boys')->name('boys');
Route::get('/checkout', 'GuestController@checkout')->name('checkout');
Route::get('/contact', 'GuestController@contact')->name('contact');
Route::get('/faq', 'GuestController@faq')->name('faq');
Route::get('/girl-single', 'GuestController@girl')->name('girl');
Route::get('/girls', 'GuestController@girls')->name('girls');
Route::get('/men-single', 'GuestController@men')->name('men');
Route::get('/mens', 'GuestController@mens')->name('mens');
Route::get('/payment', 'GuestController@payment')->name('payment');
Route::get('/shop', 'GuestController@shop')->name('shop');
Route::get('/blog-single', 'GuestController@blog_single')->name('blogs.single');
Route::get('/women-single', 'GuestController@women')->name('women');
Route::get('/womens', 'GuestController@womens')->name('womens');
Route::get('/registration', 'GuestController@registration')->name('registration');
Route::get('/u/login', 'GuestController@login')->name('user-login');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
//Route::get('photo', 'PhotoController@index')->name('photo');
//Route::post('photo', 'PhotoController@upload');

//                           UserController

Route::post('/u/login','UserController@login')->name('u.login.check');


//                         AdminUserController

Route::resource('admin-user', 'AdminUserController')->middleware('verified');


//                         AdminRoleController

Route::resource('roles','AdminRoleController')->middleware('verified');

//                       AdminDashboardController

Route::resource('dashboard','AdminDashboardController')->middleware('verified');



//                        AdminProfileController

Route::resource('profile','AdminProfileController')->middleware('verified');


//                       AdminPermissionController

Route::resource('permission','AdminPermissionController')->middleware('verified');

//                        AdminCategoryController

Route::resource('categories','AdminCategoryController')->middleware('verified');
//
//Route::GET('categories','AdminCategoryController@index')->name('categories.index');
//Route::GET('categories/create','AdminCategoryController@create')->name('categories.create');
//Route::POST('categories','AdminCategoryController@store')->name('categories.store');
//Route::GET('categories/{id}','AdminCategoryController@show')->name('categories.show');
//Route::GET('categories/{id}/edit','AdminCategoryController@edit')->name('categories.edit');
//Route::PUT('categories/{id}','AdminCategoryController@update')->name('categories.update');
//Route::DELETE('categories/{id}','AdminCategoryController@destroy')->name('categories.destroy');

//                         AdminBrandController

Route::resource('brands','AdminBrandController')->middleware('verified');

//Route::GET('brands','AdminBrandController@index')->name('brands.index');
//Route::GET('brands/create','AdminBrandController@create')->name('brands.create');
//Route::POST('brands','AdminBrandController@store')->name('brands.store');
//Route::GET('brands/{id}','AdminBrandController@show')->name('brands.show');
//Route::GET('brands/{id}/edit','AdminBrandController@edit')->name('brands.edit');
//Route::PUT('brands/{id}','AdminBrandController@update')->name('brands.update');
//Route::DELETE('brands/{id}','AdminBrandController@destroy')->name('brands.destroy');

Route::resource('products','AdminProductController')->middleware('verified');

//Route::GET('products','AdminProductController@index')->name('products.index');
//Route::GET('products/create','AdminProductController@create')->name('products.create');
//Route::POST('products','AdminProductController@store')->name('products.store');
//Route::GET('products/{id}','AdminProductController@show')->name('products.show');
//Route::GET('products/{id}/edit','AdminProductController@edit')->name('products.edit');
//Route::PUT('products/{id}','AdminProductController@update')->name('products.update');
//Route::DELETE('products/{id}','AdminProductController@destroy')->name('products.destroy');
