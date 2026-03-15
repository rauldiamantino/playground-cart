<?php

namespace App\Platform\Services;

use App\Platform\Models\Tenant;

class TenantService
{
    public function create(string $name, string $domain): Tenant
    {
        $tenant = Tenant::create(['id' => $name]);
        $tenant->domains()->create(['domain' => $domain]);

        return $tenant;
    }
}
