<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\UserAuth;
use Illuminate\Support\Facades\Route;


Route::middleware([UserAuth::class])->group(function(){
Route::get('/', function () {
    return redirect()->route('product.index');
});

});

Route::post('/registerdata',[AuthController::class,'storedata'])->name('storedata');
Route::get('/registerview',[AuthController::class,'registerview'])->name('registerview');

Route::post('/logindata',[AuthController::class,'logindata'])->name('logindata');
Route::get('/loginview',[AuthController::class,'loginview'])->name('loginview');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::resource('product', ProductsController::class);
