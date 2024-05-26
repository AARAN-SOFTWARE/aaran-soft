<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\Hsncode;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HsncodeTest extends TestCase
{
    use DatabaseMigrations;

    public function test_hsncode_table(): void
    {
        $hsncode = Hsncode::factory()->create();

        $this->assertEquals('Hsncode', actual: $hsncode->vname);
        $this->assertEquals('1', actual: $hsncode->active_id);


    }
}
