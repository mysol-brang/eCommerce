<?php

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

Route::get('/', function () {
    return view('home');
});
//user
Route::get('/products',[App\Http\Controllers\ProductController::class,'index'])->name('products');
Route::view('/about','about')->name('about');
Route::view('/contact','contact')->name('contact');

//admin
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function(){
    Route::get('index',[App\Http\Controllers\AdminController::class, 'index'])->name('index');
    Route::get('products',[App\Http\Controllers\Admin\ProductController::class,'index'])->name('products');
    //userlist
    Route::get('userlist',[App\Http\Controllers\Admin\UserListController::class,'index'])->name('userlist');
    Route::get('userlist/{id}/edit',[App\Http\Controllers\Admin\UserListController::class,'edit'])->name('userlist.edit');
    Route::post('userlist/{id}/update',[\App\Http\Controllers\Admin\UserListController::class,'update'])->name('userlist.update');
    Route::delete('userlist/{id}/del',[\App\Http\Controllers\Admin\UserListController::class,'delete'])->name('userlist.delete');
    //productlist
    Route::get('productlist',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('productlist');
    Route::get('addproduct',[App\Http\Controllers\Admin\ProductController::class,'addProduct'])->name('addproduct');
    Route::post('addedproduct',[\App\Http\Controllers\Admin\ProductController::class,'addedProduct'])->name('addedproduct');
    Route::get('productlist/{id}/edit',[App\Http\Controllers\Admin\ProductController::class,'edit'])->name('productlist.edit');
    Route::get('productlist/{id}/del',[\App\Http\Controllers\Admin\ProductController::class,'delete'])->name('productlist.delete');
});

Auth::routes();
//user
Route::name('user.')->middleware('auth')->group(function(){
   Route::get('/profile/{id}',[\App\Http\Controllers\UserController::class,'edit'])->name('profile');
   Route::post('user/{id}/update',[\App\Http\Controllers\UserController::class,'update'])->name('update');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

