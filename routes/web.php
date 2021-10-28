<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return view('dashboard');
    })->name('home');

    Route::get('/getProductPrice/{id}',[InvoiceController::class,'getProductPrice']);

    Route::get('/getProducts/{id}',[InvoiceController::class,'getProducts']);

    Route::get('/categories/{id}/products', [CategoryController::class,'products'])->name('catPro');

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);



    Route::resource('invoices', InvoiceController::class);



    require __DIR__.'/auth.php';

    });
