<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Domain\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Domain\Shop\ProductController as ShopProduct;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/', function () {
        return 'Welcome to tenant: ' . tenant('id');
    });

    Route::name('shop.')->group(function () {
        Route::get('/', [ShopProduct::class, 'index'])->name('products.index');
        Route::get('products/{id}', [ShopProduct::class, 'show'])->name('products.show');
    });

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/', function () {
            return 'Tenant ' . tenant('id') . ' dashboard';
        });

        Route::resource('products', AdminProduct::class)->except(['show']);
    });
});
