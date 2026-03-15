<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Platform\TenantRegistrationController;

Route::get('/', function () {
    return response()->json(['message' => 'Bem-vindo à API do seu SaaS']);
});

Route::get('/tenants/create', [TenantRegistrationController::class, 'create']);
Route::post('/tenants', [TenantRegistrationController::class, 'store']);
