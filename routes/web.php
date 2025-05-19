<?php

use Pest\ArchPresets\Custom;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymethodsController;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard')->middleware('admin');

// Route::get('customer/dashboard',[CustomerController::class,'dashboard'])->name('customer.dashboard')->middleware('user');

//Admin Middleware
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    //home
    Route::get('home',[AdminController::class,'home'])->name('admin.home');

    //category
    Route::get('categoryPage',[AdminController::class,'categoryPage'])->name('admin.categoryPage');

    Route::post('category',[AdminController::class,'category'])->name('admin.category');

    Route::get('categoryList',[AdminController::class,'categoryList'])->name('admin.categoryList');

    Route::get('categoryEdit/{id}',[AdminController::class,'categoryEditPage'])->name('admin.categoryEdit');

    Route::post('categoryEdit/{id}',[AdminController::class,'categoryEdit'])->name('admin.categoryEdit');

    Route::get('categorydelete/{id}',[AdminController::class,'categorydelete'])->name('admin.categorydelete');

    Route::get('categorySearch',[AdminController::class,'categorySearch'])->name('admin.categorySearch');

    //product
    Route::get('productPage',[ProductController::class,'productPage'])->name('admin.productPage');

    Route::post('productCreate',[ProductController::class,'productCreate'])->name('admin.productCreate');

    Route::get('productList',[ProductController::class,'productList'])->name('admin.productList');

    Route::get('productDelete/{id}',[ProductController::class,'productDelete'])->name('admin.productDelete');

    Route::get('productEdit/{id}',[ProductController::class,'productEditPage'])->name('admin.productEdit');

    Route::post('productEdit/{id}',[ProductController::class,'productEdit'])->name('admin.productEdit');

    Route::get('productSearch',[ProductController::class,'productSearch'])->name('admin.productSearch');

    //order
    Route::get('order',[OrderController::class,'order'])->name('admin.order');

    Route::get('onTheWay,{id}',[OrderController::class,'onTheWay'])->name('onTheWay');

    Route::get('Delievered,{id}',[OrderController::class,'Delievered'])->name('Delievered');

    //print
    Route::get('print,{id}',[OrderController::class,'print'])->name('admin.print');

    //Userlist
    Route::get('userlist',[AdminController::class, 'userlist'])->name('userlistPage');

    //userDelete
    Route::get('userDelete/{id}',[AdminController::class, 'userDelete'])->name('userDelete');

    //Payment method
    Route::get('paymentPage',[PaymethodsController::class,'paymentPage'])->name('pyamentPage');

    //Payment create
    Route::post('paymentCreate',[PaymethodsController::class,'paymethodCreate'])->name('paymethodCreate');

    //paymethodDelete
    Route::get('paymethodDelete/{id}',[PaymethodsController::class, 'paymethodDelete'])->name('paymethodDelete');

    //PaymethodEditPage
    Route::get('paymethodEditPage/{id}',[PaymethodsController::class, 'paymethodEditPage'])->name('paymethodEditPage');

    //PaymentEdit
    Route::post('paymethodUpdate/{id}',[PaymethodsController::class, 'paymethodUpdate'])->name('paymethodUpdate');




});

//User Middleware
Route::middleware('user')->prefix('customer')->group(function () {
    Route::get('dashboard',[CustomerController::class,'dashboard'])->name('customer.dashboard');

    //ProductSearch
    Route::get('productSearch',[CustomerController::class,'productSearch'])->name('customer.productSearch');

    //ProductDetails
    Route::get('productDetails/{id}',[CustomerController::class,'productDetails'])->name('customer.productDetails');

    //Cart
    Route::get('cart/{id}',[CartController::class,'cart'])->name('customer.cart');

    //cartPage
    Route::get('cartPage',[CartController::class,'cartPage'])->name('customer.cartPage');

    //cartDelete
    Route::get('cartDelete/{id}',[CartController::class,'cartDelete'])->name('customer.cartDelete');

    //CreateOrder
    Route::post('createOrder',[OrderController::class,'createOrder'])->name('createOrder');

    //myOrder
    Route::get('myorders',[CustomerController::class,'myorders'])->name('myorders');

    //Profile
    Route::get('profile/{id}',[CustomerController::class,'profile'])->name('profile');

    //SearchByPhone
    Route::get('SearchByPhone',[CustomerController::class, 'SearchByPhone'])->name('SearchByPhone');

    //ProfileEditPage
    Route::get('profileEditPage/{id}',[CustomerController::class, 'profileEditPage'])->name('profileEditPage');

    //ProfileEdit
    Route::post('profileEdit/{id}',[CustomerController::class, 'profileEdit'])->name('profileEdit');

    

});
