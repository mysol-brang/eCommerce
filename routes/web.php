<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', function () {
    return view('cart');
});
//user
Route::get('/products',[App\Http\Controllers\ProductController::class,'index'])->name('products');
Route::view('/about','about')->name('about');
Route::view('/contact','contact')->name('contact');

//Super Admin
Route::prefix('superadmin')->name('superadmin.')->middleware(['admin'])->group(function(){
    Route::get('index',[\App\Http\Controllers\Admin\SuperAdminController::class, 'index'])->name('index');
    Route::get('addpermission',[App\Http\Controllers\Admin\SuperAdminController::class, 'addpermission'])->name('addpermission');
    Route::get('added/{id}',[\App\Http\Controllers\Admin\SuperAdminController::class, 'added'])->name('added');
    Route::get('edit/{id}',[\App\Http\Controllers\Admin\SuperAdminController::class,'edit'])->name('edit');
    Route::post('update/{id}',[\App\Http\Controllers\Admin\SuperAdminController::class,'update'])->name('update');
    Route::get('del/{id}',[\App\Http\Controllers\Admin\SuperAdminController::class,'delete'])->name('delete');
});

//admin & editor
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function(){
    //userlist
    Route::get('userlist',[App\Http\Controllers\Admin\UserListController::class,'index'])->name('userlist');
    Route::get('userlist/{id}/edit',[App\Http\Controllers\Admin\UserListController::class,'edit'])->name('userlist.edit');
    Route::post('userlist/{id}/update',[\App\Http\Controllers\Admin\UserListController::class,'update'])->name('userlist.update');
    Route::get('userlist/{id}/del',[\App\Http\Controllers\Admin\UserListController::class,'delete'])->name('userlist.delete');
    //productlist
    Route::get('productlist',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('productlist');
    Route::get('addproduct',[App\Http\Controllers\Admin\ProductController::class,'addProduct'])->name('addproduct');
    Route::post('addedproduct',[\App\Http\Controllers\Admin\ProductController::class,'addedProduct'])->name('addedproduct');
    Route::get('productlist/{id}/edit',[App\Http\Controllers\Admin\ProductController::class,'edit'])->name('productlist.edit');
    Route::post('productlist/{id}/update',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('productlist.update');
    Route::get('productlist/{id}/del',[\App\Http\Controllers\Admin\ProductController::class,'delete'])->name('productlist.delete');
});

//user
Route::name('user.')->middleware('auth')->group(function(){
   Route::get('/profile/{id}',[\App\Http\Controllers\UserController::class,'edit'])->name('profile');
   Route::post('user/{id}/update',[\App\Http\Controllers\UserController::class,'update'])->name('update');

});
//cart
Route::get('/cart',[\App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart',[\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

