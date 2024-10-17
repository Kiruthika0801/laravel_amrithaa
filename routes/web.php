<?php

use Illuminate\Support\Facades\Route;

/** for side bar menu active */
function set_active($route) {
    if (is_array($route )){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}
/** for side bar menu show */
function set_show($route) {
    if (is_array($route )){
        return in_array(Request::path(), $route) ? 'show' : '';
    }
    return Request::path() == $route ? 'show' : '';
}

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('dashboard.home');
    });
    Route::get('home',function()
    {
        return view('dashboard.home');
    });
});

Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers\Auth'],function()
{
    // -----------------------------login----------------------------------------//
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('logout/page', 'logoutPage')->name('logout/page');
    });

    // ------------------------------ register ----------------------------------//
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register','storeUser')->name('register');    
    });

    // ----------------------------- forget password ----------------------------//
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('forget-password', 'getEmail')->name('forget-password');
        Route::post('forget-password', 'postEmail')->name('forget-password');    
    });

    // ----------------------------- reset password -----------------------------//
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('reset-password/{token}', 'getPassword');
        Route::post('reset-password', 'updatePassword');    
    });
});

Route::group(['namespace' => 'App\Http\Controllers'],function()
{


    Route::controller(ProductsController::class)->group(function () {
        Route::get('/products/list', 'index')->name('products.list');
        Route::get('/products/create', 'add')->name('products.create'); 
        Route::post('/products/store', 'store')->name('products.store');
        // Route::post('/products/{product}/edit', 'edit')->name('products.edit');
        Route::get('/products/{product}/edit', 'edit')->name('products.edit'); // Make sure this is a GET request

        Route::put('/products/{product}', 'update')->name('products.update');
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    });

    // -------------------------- main dashboard ----------------------//
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->middleware('auth')->name('home');
    });

    // -------------------------- pages ----------------------//
    Route::controller(AccountController::class)->group(function () {
        Route::get('page/account', 'index')->middleware('auth')->name('page/account');
    });



    // ------------------------ e-commerce --------------------//
    Route::controller(EcommerceController::class)->group(function () {
        Route::get('product/create/page', 'productCreate')->middleware('auth')->name('product/create/page');
        Route::get('product/overview/page', 'productOverview')->middleware('auth')->name('product/overview/page');
        // Route::get('products', 'productList')->middleware('auth')->name('product/list/page');
        Route::get('product/grid/page', 'productGrid')->middleware('auth')->name('product/grid/page');
        Route::get('shopping/cart/page', 'shoppingCart')->middleware('auth')->name('shopping/cart/page');
        Route::get('ecommerce/checkout/page', 'ecommerceCheckout')->middleware('auth')->name('ecommerce/checkout/page');
        Route::get('ecommerce/order/page', 'ecommerceOrder')->middleware('auth')->name('ecommerce/order/page');
        Route::get('ecommerce/order/overview/page', 'orderOverView')->middleware('auth')->name('ecommerce/order/overview/page');
        Route::get('ecommerce/sellers/page', 'sellers')->middleware('auth')->name('ecommerce/sellers/page');
    });

    // ------------------------ User --------------------//
    Route::controller(UserManagementController::class)->group(function () {
        Route::get('user/list/page', 'userList')->middleware('auth')->name('user/list/page');
    });
});


