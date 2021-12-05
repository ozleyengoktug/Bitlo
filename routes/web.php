<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BitloController;
use App\Http\Middleware\ValidationMiddleware;
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

Route::prefix('api/company/')->middleware([ValidationMiddleware::class])->group(function () {
    Route::post('register', [BitloController::class, 'addNewCompany']);

    Route::post('add-package', [BitloController::class, 'packageToCompany']);

    Route::post('packages', [BitloController::class, 'getCompanyPackages']);
});
