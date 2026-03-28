<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Platform\Services\TenantService;
use Illuminate\Http\Request;

class TenantRegistrationController extends Controller
{
    public function __construct(
        protected TenantService $tenantService
    ) {}

    public function create()
    {
        return view('platform.tenants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tenants,id',
            'domain' => 'required|unique:domains,domain',
        ]);

        $tenant = $this->tenantService->create($validated['name'], $validated['domain']);

        return response()->json([
            'message' => 'Tenant created successfully!',
            'tenant' => $tenant,
        ], 201);
    }
}
