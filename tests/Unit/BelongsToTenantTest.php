<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class BelongsToTenantTest extends TestCase
{
    public function test_trait_logic_is_executed(): void
    {
        $model = new class extends Model {
            use BelongsToTenant;
        };

        Event::dispatch('eloquent.creating: ' . get_class($model), [$model]);

        $this->assertEquals('tenant', $model->getConnectionName());
    }
}
