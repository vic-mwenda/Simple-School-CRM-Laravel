<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserLoggerController;
use App\Http\Controllers\ViewUsersController;
use App\Http\Controllers\EnquiryManagerController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

//Logging routes

Route::get('/logger',[UserLoggerController::class,'index'])->middleware('role')->name('logger.index');

