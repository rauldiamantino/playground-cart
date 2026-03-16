<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Desativa os eventos do model Tenant para que ele não tente
        // disparar a criação de banco físico no MySQL durante os testes.
        \App\Platform\Models\Tenant::flushEventListeners();
    }
}
