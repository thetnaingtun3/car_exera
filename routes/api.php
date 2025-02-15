<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DashboardController;



Route::get('/test', function () {

    return response()->json([
        'message' => true
    ]);
});

Route::get('/table', [DashboardController::class, 'table'])->name('api.table');
Route::get('/graphic', [DashboardController::class, 'graphic'])->name('api.graphic');
Route::get('/productionreport', [DashboardController::class, 'productionreport'])->name('api.productionreport');

Route::get('/productionmonthlyreport', [DashboardController::class, 'productionmonthlyreport'])->name('api.productionmonthlyreport');


Route::get('/productiondayreport', [DashboardController::class, 'productiondayreport'])->name('api.productiondayreport');


Route::get('/loadingreport', [DashboardController::class, 'loadingreport'])->name('api.loadingreport');

