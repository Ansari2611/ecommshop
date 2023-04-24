<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[UserController::class,'index'])->name('home');
Route::get('/about',[UserController::class,'aboutus'])->name('about');
Route::middleware('auth')->group(function(){
    Route::post('addcart/{id}',[UserController::class,'addcart'])->name('addcart');
    Route::get('showcart',[UserController::class,'showcart'])->name('showcart');
    Route::post('/updatecart/{id}',[UserController::class,'updatecart'])->name('updatecart');
    Route::get('deletecart/{id}',[UserController::class,'deletecart'])->name('deletecart');
    Route::get('checkout',[UserController::class,'checkout'])->name('checkout');
    Route::post('checkout',[UserController::class,'order'])->name('order');
    Route::get('contact',[UserController::class,'contact'])->name('contact');
    Route::post('contact',[UserController::class,'contactus'])->name('contact');
    Route::post('/showcart/totalprice', [UserController::class,'totalprice'])->name('showcart.totalprice');
    Route::get('wallet',[UserController::class,'showwallet'])->name('showwallet');
    Route::post('wallet',[UserController::class,'addwallet'])->name('addwallet');
    Route::get('myorders',[UserController::class,'myorders'])->name('myorders');
    Route::get('deleteorders/{id}',[UserController::class,'deleteorders'])->name('deleteorders');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/products',[AdminController::class,'products'])->name('products');
    Route::get('/order',[AdminController::class,'showorder'])->name('showorder');
    Route::get('/contactmessage',[AdminController::class,'contactmessage'])->name('contactmessage');
    Route::post('/products',[AdminController::class,'addproducts'])->name('products');
    Route::get('/showproducts',[AdminController::class,'showproducts'])->name('showproducts');
    Route::get('/editproducts/{id}',[AdminController::class,'editproducts'])->name('editproducts');
    Route::post('/editproducts/{id}',[AdminController::class,'updateproducts'])->name('editproducts');
    Route::get('/deleteproducts/{id}',[AdminController::class,'deleteproducts'])->name('deleteproducts');
    Route::get('/updatestatus/{id}',[AdminController::class,'updatestatus'])->name('updatestatus');
});


require __DIR__.'/auth.php';
