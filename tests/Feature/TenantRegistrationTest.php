<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Platform\Models\Tenant;

class TenantRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_register_a_new_tenant(): void
    {
        $payload = [
            'name' => 'tenant-1',
            'domain' => 'tenant-1.test',
        ];

        $this->post('/tenants', $payload)
             ->assertStatus(201);

        $this->assertDatabaseHas('tenants', [
            'id' => $payload['name'],
        ]);

        $this->assertDatabaseHas('domains', [
            'domain' => $payload['domain'],
            'tenant_id' => $payload['name'],
        ]);
    }

    public function test_it_cannot_register_a_tenant_with_a_duplicated_name(): void
    {
        Tenant::create(['id' => 'existing-tenant']);

        $response = $this->postJson('/tenants', [
            'name' => 'existing-tenant',
            'domain' => 'new-domain.test',
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['name']);
    }

    public function test_it_shows_registration_form(): void
    {
        $response = $this->get('/tenants/create');

        $response->assertStatus(200);
    }
}
