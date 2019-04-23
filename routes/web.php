<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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



Auth::routes();

Route::get('/', 'HomeController@index')->name('dashboard');


Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');


Route::resource('categories', 'CategoryController');

Route::resource('brands', 'BrandController');

Route::resource('products', 'ProductController');

Route::resource('orders', 'OrderController');

//Route::get('/orders/getproduct/{id}','OrderController@myformAjax');
//Route::post('get-cities/{id}', 'OrderController@myformAjax');

Route::get('/orders/getselectproduct/','OrderController@selectproduct')->name('orders.getselectproduct');

Route::get('/orders/getproduct/{id}','OrderController@getproduct')->name('orders.getproductdata');

 



// Route::get('/create_role_permission', function(){
// 	$role = Role::create(['name' => 'Administer']);
//     $permission = Permission::create(['name' => 'Administer roles & permissions']);
//     auth()->user()->assignRole('Administer');
//     auth()->user()->givePermissionTo('Administer roles & permissions');

// });