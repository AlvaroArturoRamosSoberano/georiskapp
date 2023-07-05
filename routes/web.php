<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CompanyTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyRiskAspectController;
use App\Http\Controllers\RiskAspectController;
use App\Http\Controllers\RegulatoryAspectController;
use App\Http\Controllers\KmlController;
use App\Http\Controllers\GeographicDetailController;
use App\Http\Controllers\LicenseController;
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
Route::resource('companyType', CompanyTypeController::class)->middleware('auth');
Route::resource('companyRiskAspect', CompanyRiskAspectController::class)->middleware('auth');
Route::resource('license', LicenseController::class)->middleware('auth');
Route::resource('riskAspect', RiskAspectController::class)->middleware('auth');
Route::resource('regulatoryAspect', RegulatoryAspectController::class)->middleware('auth');
Route::resource('regulatoryLicense', RegulatoryLicenseController::class)->middleware('auth');

//Eliminar cosas del Login
Auth::routes(['register' => false, 'reset' => false, 'brand.index' => false]);


Route::get('/home', [CompanyController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [CompanyController::class, 'index'])->name('home');
});


Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/geographicDetail', [GeographicDetailController::class, 'index'])->name('geographicDetail.index');
Route::get('/companyType', [CompanyTypeController::class, 'index'])->name('companyType.index');
Route::get('/exportar-kml', [KmlController::class, 'exportarKml'])->name('exportar-kml');
Route::get('/companyRiskAspect', [CompanyRiskAspectController::class, 'index'])->name('companyRiskAspect.index');
Route::get('/license', [LicenseController::class, 'index'])->name('license.index');
Route::get('/riskAspect', [RiskAspectController::class, 'index'])->name('riskAspect.index');
Route::get('/regulatoryAspect', [RegulatoryAspectController::class, 'index'])->name('regulatoryAspect.index');
Route::get('/regulatoryLicense', [RegulatoryLicenseController::class, 'index'])->name('regulatoryLicense.index');

//CR
Route::post('/regulatoryAspect/createRegulatoryAspect', [RegulatoryAspectController::class, 'store']);
