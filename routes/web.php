<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarControllers\CarController;
use App\Http\Controllers\UserControllers\UserController;
use App\Http\Controllers\FactureControllers\FactureController;
use App\Http\Controllers\AssuranceControllers\AssuranceController;
use App\Http\Controllers\DashboardControllers\DashboardController;

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

Route::middleware(['auth', 'auth_user'])->group(function () {

    ///////   Dashboard /////////
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'show');
    });


    ///////   User /////////
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'show');
        Route::get('/users/new', 'new_user');
        Route::get('/edit-users/{id}', 'edit');
        Route::post('/update-user/{id}', 'update');
        Route::post('/destroy-user', 'delete');
    });


    ///////  Assurance ////////
    Route::controller(AssuranceController::class)->group(function () {

        Route::get('/assurances', 'show');
        Route::get('/add-assurance', 'create');
        Route::post('/assurance/store', 'store');
        Route::get('/assurance/edit/{id}', 'edit');
        Route::post('/assurance/update/{id}', 'update');
        Route::post('/assurance/destroy', 'delete');
    });


    ///////   Facture /////////
    Route::controller(FactureController::class)->group(function () {

        Route::get('/factures', 'show');
        Route::get('/add-factures', 'create');
        Route::post('/factures/store', 'store');
        Route::get('/factures/edit/{id}', 'edit');
        Route::post('/factures/update/{id}', 'update');
        Route::get('/factures/delete', 'destroy');
        Route::get('/factures/Pdf/{id}', 'generatePDF');
    });


    ///////   Car /////////
    Route::controller(CarController::class)->group(function () {

        Route::get('/cars', 'show');
        Route::get('/cars/create', 'create');
        Route::post('/cars/store', 'store');
        Route::get('/cars/edit/{id}', 'edit');
        Route::post('/cars/update/{id}', 'update');
        Route::post('/cars/destroy', 'delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
