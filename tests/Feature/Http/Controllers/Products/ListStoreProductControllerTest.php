<?php

namespace Tests\Feature\Http\Controllers\Products;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListStoreProductControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /** @test */
    public function it_is_true()
    {
        $this->assertTrue(true);
    }
}
