<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiverController;

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
Route::get('/',[FrontendController::class,'index']);
Route::get('/qr',[FrontendController::class,'qr']);
Route::get('/service',[FrontendController::class,'service']);
Route::get('/account',[FrontendController::class,'account']);
Route::get('/receipt',[FrontendController::class,'receipt']);
Route::get('/complete',[FrontendController::class,'complete']);

    
Route::group(['middleware'=>'auth'], function(){    
    Route::put('/qr/update/{id}',[FrontendController::class,'getQrCode']);
    Route::get('/qr/fetch/{id}',[FrontendController::class,'findQr']);

    Route::get('/dashboard',[FrontendController::class,'backend']);
    Route::get('/dashboard/scanner',[FrontendController::class,'scanner']);
});


Route::get('/admin/login',[AdminController::class,'loginform']);
Route::post('/admin/login',[AdminController::class,'loginstore'])->name('admin.login.store');

Route::group(['prefix'=>'admin','middleware'=>'admin'], function(){
    Route::get('/',[BackendController::class,'index'])->name('admin');
    Route::resource('admin',UserController::class);
    Route::resource('receiver',ReceiverController::class);
});

require __DIR__.'/auth.php';
