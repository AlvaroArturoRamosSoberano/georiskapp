<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GeographicDetailController;
use GuzzleHttp\Middleware;

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
    return view('auth.login');
});

/*
Route::get('/company', function () {
    return view('company.index');
});
Route::get('/company/create', [CompanyController::class, 'create']);
*/
//Autenticación
Route::resource('company', CompanyController::class)->middleware('auth');
Route::resource('brand', BrandController::class)->middleware('auth');
Route::resource('geographicDetail', GeographicDetailController::class)->middleware('auth');

//Eliminar cosas del Login
Auth::routes(['register' => false, 'reset' => false]);


Route::get('/home', [CompanyController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [CompanyController::class, 'index'])->name('home');
});


Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/geographicDetail', [GeographicDetailController::class, 'index'])->name('geographicDetail.index');
