<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\Pdfcontroller;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SalersendController;
use App\Http\Controllers\TestController;
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

Route::get('/test', function () {
    return view('registration/test');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('/getsaler', [BackController::class, 'getsaler']);

    Route::get('/hakiki', [BackController::class, 'hakiki']) ;


    Route::get('/sheet', [BackController::class, 'sheet']) ;



    Route::get('/upload', [BackController::class, 'uploadstock_view']);
    Route::post('/uploadstock', [BackController::class, 'uploadstock']);
    Route::get('/saler', [BackController::class, 'saler']);
    Route::post('/salersend/{id}', [BackController::class, 'salersend']);
    Route::get('/admin_view', [BackController::class, 'admin_view'])->middleware('admin');
    Route::get('/admin/{id}', [BackController::class, 'admin'])->middleware('admin');
    Route::get('/delete_stock/{id}', [BackController::class, 'delete_stock'])->middleware('admin');
    // Route::post('/update_stock/{id}', [BackController::class, 'update_stock']);
    Route::get('/sold_producti', [BackController::class, 'sold_producti'])->middleware('admin');
    //print pdf
    Route::get('/sold_producti_pdf', [BackController::class, 'sold_producti_pdf'])->middleware('admin');
    Route::get('/delete_product/{id}', [BackController::class, 'delete_product'])->middleware('admin');

    Route::post('/salersendd/{id}', [SalersendController::class, 'salersendd']);
    Route::post('/editStock/{id}', [SalersendController::class, 'editStock'])->middleware('admin');
    Route::PATCH('/update_stock/{id}', [BackController::class, 'update_stock'])->middleware('admin');
    Route::get('/Uploadstockk', [BackController::class, 'Uploadstockk']);
    Route::get('/sold_stock', [BackController::class, 'sold_stock'])->middleware('admin');
    Route::get('/admin_views', [BackController::class, 'admin_views'])->middleware('admin');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logcome', [AdminController::class, 'logcome']);
    route::get('/usage',[BackController::class, 'usage']);
    route::post('/usage_post', [BackController::class, 'usage_post']);
    route::post('/debt', [BackController::class, 'debt']) ;

    route::get('/Verified', [BackController::class, 'Verified'])->middleware('admin');
    route::post('/moveAndDeleteData', [BackController::class, 'moveAndDeleteData'])->middleware('admin');
    route::get('/usage_debt', [BackController::class, 'usage_debt'])->middleware('admin');
    route::get('/delete_usage/{id}', [BackController::class, 'delete_usage'])->middleware('admin');
    route::get('/delete_debt/{id}', [BackController::class, 'delete_debt'])->middleware('admin');

    route::post('/toggleCheck/{id}', [BackController::class, 'toggleCheck'])->middleware('admin');

    route::get('/sold', [Pdfcontroller::class, 'sold'])->middleware('admin');
    // route::get('/generatePDF', [Pdfcontroller::class, 'generatePDF']);
    route::get('/generatePDF', [Pdfcontroller::class, 'sold_producti'])->middleware('admin');



    //test\
    route::get('/uncle/{name}', [BackController::class, 'uncle'])->middleware('admin');
    route::get('/debtname', [BackController::class, 'debtname'])->middleware('admin');

    route::post('/pay/{name}', [BackController::class, 'pay'])->middleware('admin');


    //no sales today
    route::get('/nosales', [BackController::class, 'nosales'])->middleware('admin');


    //register and login
    route::get('/register', [RegistrationController::class, 'register'])->middleware('admin');

    //send registration form
    route::post('/createregister', [RegistrationController::class, 'createregister'])->middleware('admin');

    //get registered user
    route::get('/getregisteredUsers', [RegistrationController::class, 'getregisteredUsers'])->middleware('admin');

    //delete registered user
    route::get('/deleteuser/{id}', [RegistrationController::class, 'deleteuser'])->middleware('admin');

    //  user login page
    route::get('/logout', [RegistrationController::class, 'logout']);


    route::get('/profile/{id}', [RegistrationController::class, 'profile'])->middleware('admin');


//save data to the cart
    route::get('/cart', [SalersendController::class, 'cart']);


    //send data from cart to salersend model
    route::get('/buy', [SalersendController::class, 'buy']);

    //delete cart from cart model
    route::get('/delete_cart/{id}', [SalersendController::class, 'delete_cart']);




});






route::get('/', [BackController::class, 'welcome']);




//registered user login userlogin
route::post('/userlogin', [RegistrationController::class, 'userlogin']);

//  user login page
route::get('/loginpage', [RegistrationController::class, 'login']);


route::get('/testing', [TestController::class, 'testing']);
