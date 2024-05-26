<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\State;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class StateTest extends TestCase
{
    use DatabaseMigrations;

    public function test_state_table(): void
    {
        $size = State::factory()->create();

        $this->assertEquals('State', actual: $size->vname);
        $this->assertEquals('code', actual: $size->state_code);
        $this->assertEquals('1', actual: $size->active_id);


    }
}
