<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserLoggerController;
use App\Http\Controllers\ViewUsersController;
use App\Http\Controllers\EnquiryManagerController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\InsightsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerManagerController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

//user management routes

Route::middleware('role')->group(function () {
    Route::get('/usermanage', [ViewUsersController::class, 'index'])->name('usermanage.index');
    Route::get('/usermanage/register', [ViewUsersController::class, 'create'])->name('usermanage.create');
    Route::post('/usermanage/store', [ViewUsersController::class, 'store'])->name('usermanage.store');
    Route::get('/usermanage/edit/{user}', [ViewUsersController::class, 'edit'])->name('usermanage.edit');
    Route::post('/usermanage/update/{user}', [ViewUsersController::class, 'update'])->name('usermanage.update');
    Route::delete('/usermanage/{user}', [ViewUsersController::class, 'destroy'])->name('usermanage.destroy');
});
//dashboard access routes

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

//profile management routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
//user authentication logic
require __DIR__.'/auth.php';

//Inquiry management routes

Route::get('/manageinquiry',[EnquiryManagerController::class,'index'])->name('manageinquiry.index');
Route::get('/manageinquiry/create',[EnquiryManagerController::class,'create'])->name('manageinquiry.create');
Route::post('/manageinquiry/save',[EnquiryManagerController::class,'store'])->name('manageinquiry.store');
Route::get('/manageinquiry/view/{inquiry}',[EnquiryManagerController::class,'show'])->name('manageinquiry.view');
Route::get('/manageinquiry/download/{inquiry}',[EnquiryManagerController::class,'download'])->name('manageinquiry.download');
Route::get('/manageinquiry/print/',[EnquiryManagerController::class,'print'])->name('manageinquiry.print');
Route::get('/get-states',[EnquiryManagerController::class,'states'])->name('manageinquiry.states');
Route::post('/update-table',[EnquiryManagerController::class,'filter'])->name('manageinquiry.filter');
Route::post('/bulk-action',[EnquiryManagerController::class,'action'])->name('manageinquiry.action');


//Logging routes

Route::get('/logger',[UserLoggerController::class,'index'])->middleware('role')->name('logger.index');

//OAUTH2 google login

Route::get('auth/google', [GoogleAuthController::class, 'signInwithGoogle'])->name('google.login');
Route::get('callback/google', [GoogleAuthController::class, 'callbackToGoogle']);

// Insights module
Route::get('/insights',[InsightsController::class,'Show'])->middleware('role')->name('insights.index');

//customer manager
Route::get('/customers',[CustomerManagerController::class,'index'])->name('customers.index');
Route::get('/customers/{customer}',[CustomerManagerController::class,'view'])->name('customer.view');
Route::post('/customers/update-table',[CustomerManagerController::class,'filter'])->name('customer.filter');
Route::post('/customers/bulk-action',[CustomerManagerController::class,'action'])->name('customer.action');


