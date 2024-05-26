<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\Pincode;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PincodeTest extends TestCase
{
    use DatabaseMigrations;

    public function test_pincode_table(): void
    {
        $pincode = Pincode::factory()->create();

        $this->assertEquals('Pincode', actual: $pincode->vname);
        $this->assertEquals('1', actual: $pincode->active_id);


    }
}
