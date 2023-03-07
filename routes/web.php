<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HowItWorkController;
use App\Http\Controllers\ContactUsController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\RegisterController;



use App\Http\Controllers\Shopper\DashboardController as Shopper_dashboard;
use App\Http\Controllers\Shopper\ProductsContoller;
use App\Http\Controllers\Shopper\buyingController;
use App\Http\Controllers\Shopper\CheckoutController;
use App\Http\Controllers\Shopper\ShopFromController;





use App\Http\Controllers\Travelar\DashboardController as Travelar_dashboard;


// use App\Http\Controllers\Travelar\ProductsContoller as Travelar_Products;
// use App\Http\Controllers\Travelar\buyingController as Travelar_buying;
// use App\Http\Controllers\Travelar\CheckoutController as Travelar_Checkout;







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
        return view('welcome');
    });

    Route::get("/about",[AboutController::class,"index"])->name("about");
    Route::get("/how_it_work",[HowItWorkController::class,"index"])->name("howitwork");
    Route::get("/contactus",[ContactUsController::class,"index"])->name("contactus");
    Auth::routes(['verify' => true]);
    Route::get("/login/{role?}",[LoginController::class,'showLoginForm'])->name("login");
    //Route::get("/register/{for?}",[RegisterController::class,'showRegistrationForm'])->name("register");
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('account/verify/{token}', [LoginController::class, 'verifyAccount'])->name('user.verify'); 
    Route::get('/buy_for_me', [buyingController::class, 'index'])->name('buy_for_me');
    Route::POST('/add_cart', [buyingController::class, 'add_product'])->name('add_product');
    Route::get('/delete_cart/{id?}', [buyingController::class, 'delete_product'])->name('delete_product');
    

    Route::group(['middleware' => ['auth']], function(){
        // verification
        Route::get("/verification",[VerificationController::class,"index"])->name("verification");
        Route::POST("/send_otp",[VerificationController::class,"send_otp"])->name("send_otp");
        Route::POST("/verify_otp",[VerificationController::class,"verify_otp"])->name("verify_otp");
        Route::POST("/send_mail",[VerificationController::class,"send_mail"])->name("send_mail");
        Route::POST("/verify_email",[VerificationController::class,"verify_email"])->name("verify_email");
        
        
        Route::resource('setup_profile', ProfileController::class);
        Route::get('/documents/get', [ProfileController::class,'get_documents'])->name("get_documents");
        Route::POST('/image/upload/store', [ProfileController::class,'file_upload']);
        Route::POST('/image/delete', [ProfileController::class,'file_delete']);
        Route::POST('/add_address', [ProfileController::class,'add_address'])->name("add_address");
        Route::POST('/edit_address', [ProfileController::class,'edit_address'])->name("edit_address");
        Route::get('/delete_address/{id}', [ProfileController::class,'delete_address'])->name("delete_address");
       
        
        Route::group(['middleware' => ['role_redirection']], function(){
            Route::get('/change_password', [DashboardController::class, 'change_password'])->name('change_password');
            Route::post('/store_change_password', [DashboardController::class, 'store_change_password'])->name('store_change_password');
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
            Route::resource('roles', RoleController::class);
            Route::resource('permission', PermissionController::class);
            Route::resource('users', UserController::class);
        });
       
           

        // shoper redirect
        Route::group(['middleware' => ['shopper_redirection']], function(){
            Route::get('/shopper/dashboard', [Shopper_dashboard::class, 'index'])->name('shopper-dashboard');
            Route::get('/shopper/edit-profile',[ProfileController::class,"edit_profile"])->name("shopper-profile-edit");
            Route::get('/shopper/edit-address',[ProfileController::class,"dasboard_edit_address"])->name("shopper-profile-address");
            Route::get('/shopper/cards',[ProfileController::class,"parment_cards"])->name("shopper-cards");
            Route::get('/shopper/delete_card/{id}',[ProfileController::class,"delete_card"])->name("delete_card");
            Route::get('/shopper/checkout/{country_from}/{country_to}', [CheckoutController::class, 'index']);
            Route::POST('/checkout-complete',[CheckoutController::class , "store" ])->name("checkout.store");
            Route::POST('/shop-from',[ShopFromController::class,"index"])->name("shopfrom");
            Route::get('/shopper/request',[ProfileController::class,"request"])->name("shopper-request");
            Route::get('/shopper/delete_order/{id}',[ProfileController::class,"delete_order"])->name("delete_order");
            Route::get('/shopper/change-password',[Shopper_dashboard::class,"change_password"])->name("shopper-change-password");
           
              
        });


           // travel redirect
           Route::group(['middleware' => ['travaler_redirection']], function(){
                Route::get('/travelar/dashboard', [Travelar_dashboard::class, 'index'])->name('travelar-dashboard');
                Route::get('/travelar/edit-profile',[ProfileController::class,"edit_profile"])->name("travelar-profile-edit");
                Route::get('/travelar/edit-address',[ProfileController::class,"dasboard_edit_address"])->name("travelar-profile-address");
                Route::get('/travelar/cards',[ProfileController::class,"parment_cards"])->name("travelar-cards");
                Route::get('/travelar/delete_card/{id}',[ProfileController::class,"delete_card"])->name("delete_card");
                Route::get('/travelar/checkout/{country_from}/{country_to}', [CheckoutController::class, 'index']);
                 Route::POST('/shop-from',[ShopFromController::class,"index"])->name("shopfrom");
                Route::get('/travelar/order/request',[Travelar_dashboard::class,"order_request"])->name("travelar-request");
                Route::get('/travelar/delete_order/{id}',[ProfileController::class,"delete_order"])->name("delete_order");
                Route::get('/travelar/change-password',[Travelar_dashboard::class,"change_password"])->name("travelar-change-password");
            });



        

        // Route::get('/travelars-list', [ontravels_Travelars::class, 'index'])->name('travelar-list');
        
        
    });  