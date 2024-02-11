<?php


use App\Http\Controllers\ClusterController;
use App\Http\Controllers\CustomerController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    // Users
    Route::resource('users', UserController::class);

    // Profile
    Route::resource('profile', ProfileController::class);

    // Customers
    Route::resource('customers', CustomerController::class);

    // Animals
    Route::resource('animals', AnimalController::class);

    // Vendor
    Route::resource('vendors', VendorController::class);

    // Cluster
    Route::resource('clusters', ClusterController::class);

});
