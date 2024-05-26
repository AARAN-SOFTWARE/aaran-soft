<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\Size;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SizeTest extends TestCase
{
    use DatabaseMigrations;

    public function test_size_table(): void
    {
        $size = Size::factory()->create();

        $this->assertEquals('Size', actual: $size->vname);
        $this->assertEquals('1', actual: $size->active_id);


    }
}
