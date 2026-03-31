<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Domain\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Domain\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Domain\Shop\ProductController as ShopProductController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/', function () {
        return 'Welcome to tenant: ' . tenant('id');
    });

    Route::name('shop.')->group(function () {
        Route::get('/', [ShopProductController::class, 'index'])->name('products.index');
        Route::get('products/{id}', [ShopProductController::class, 'show'])->name('products.show');
    });

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/', function () {
            return 'Tenant ' . tenant('id') . ' dashboard';
        });

        Route::resource('products', AdminProductController::class)->except(['show']);
        Route::resource('categories', AdminCategoryController::class)->except(['show']);
    });
});
