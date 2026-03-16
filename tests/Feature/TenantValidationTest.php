<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_does_not_register_tenant_with_invalid_data(): void
    {
        $response = $this->postJson('/tenants', [
            'name' => '',
            'domain' => 'invalid',
        ]);

        $response->assertStatus(422);
    }
}
