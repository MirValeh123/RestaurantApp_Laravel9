<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Management\CategoryController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\Management\TableController;
use App\Http\Controllers\Management\UserController;
use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\Report\ReportController;

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

Route::middleware(['auth','VerifyAdmin'])->group(function () {
    Route::prefix('management')->group(function () {
        Route::get('/',function () {
            return view('management.index');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
            Route::put('/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
            Route::get('/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

        });
        Route::prefix('menu')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('menu.index');
            Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
            Route::post('/create', [MenuController::class, 'store'])->name('menu.store');
            Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
            Route::put('/{id}/edit', [MenuController::class, 'update'])->name('menu.update');
            Route::get('/{id}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');

        });
        Route::prefix('table')->group(function () {
            Route::get('/', [TableController::class, 'index'])->name('table.index');
            Route::get('/create', [TableController::class, 'create'])->name('table.create');
            Route::post('/create', [TableController::class, 'store'])->name('table.store');
            Route::get('/{id}/edit', [TableController::class, 'edit'])->name('table.edit');
            Route::put('/{id}/edit', [TableController::class, 'update'])->name('table.update');
            Route::get('/{id}/destroy', [TableController::class, 'destroy'])->name('table.destroy');

        });
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/create', [UserController::class, 'store'])->name('user.store');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/{id}/edit', [UserController::class, 'update'])->name('user.update');
            Route::get('/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

        });


    });

});



Route::prefix('cashier')->group(function (){
    Route::get('/', [CashierController::class, 'index'])->name('cashier.index');
    Route::get('/getTable',[CashierController::class,'getTables'])->name('cashier.getTables');
    Route::get('/getMenuByCategory/{category_id}',[CashierController::class,'getMenuByCategory'])->name('cashier.getMenuByCategory');
    Route::post('/orderFood', [CashierController::class, 'orderFood'])->name('cashier.orderFood');
    Route::get('/getSaleDetailsByTable/{table_id}',[CashierController::class,'getSaleDetailsByTable'])->name('cashier.getSaleDetailsByTable');
    Route::post('/confirmOrderStatus',[CashierController::class,'confirmOrderStatus'])->name('cashier.confirmOrderStatus');
    Route::post('/deleteSaleDetail',[CashierController::class,'deleteSaleDetail'])->name('cashier.deleteSaleDetail');
    Route::post('/increase-quantity',[CashierController::class,'increaseQuantity'])->name('cashier.increaseQuantity');
    Route::post('/decrease-quantity',[CashierController::class,'decreaseQuantity'])->name('cashier.decreaseQuantity');
    Route::post('/savePayment',[CashierController::class,'savePayment'])->name('cashier.savePayment');
    Route::get('/showReceipt/{saleID}',[CashierController::class,'showReceipt'])->name('cashier.showReceipt');






});

Route::middleware(['auth','VerifyAdmin'])->group(function () {
    Route::prefix('report')->group(function (){
        Route::get('/', [ReportController::class, 'index'])->name('report.index');
        Route::prefix('/show')->group(function (){
            Route::get('/', [ReportController::class, 'show'])->name('report.show');
            Route::get('/export', [ReportController::class, 'export'])->name('report.export');







        });






    });

});




