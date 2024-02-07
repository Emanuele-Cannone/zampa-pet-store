<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::group(['prefix'=>'/customers'],function(){
        Route::get('/',[CustomerController::class,'index'])->name('customer.index');
        Route::get('/create',[CustomerController::class,'create'])->name('customer.create');
        Route::get('/edit/{customer}',[CustomerController::class,'edit'])->name('customer.edit');
        Route::post('/store',[CustomerController::class,'store'])->name('customer.store');
        Route::post('/update/{customer}',[CustomerController::class,'update'])->name('customer.update');
        Route::post('/destroy/{customer}',[CustomerController::class,'destroy'])->name('customer.destroy');
    });
});
