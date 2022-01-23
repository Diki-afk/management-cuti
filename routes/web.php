<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeavesController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])
    ->group(function() {
        //route for employees
        Route::resource('/employees', EmployeesController::class);
        //route for leaves
        Route::resource('/leaves', LeavesController::class);       
});

require __DIR__.'/auth.php';
