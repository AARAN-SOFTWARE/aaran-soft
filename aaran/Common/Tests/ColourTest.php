<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\Colour;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ColourTest extends TestCase
{
    use DatabaseMigrations;

    public function test_colour_table(): void
    {
        $colour = Colour::factory()->create();

        $this->assertEquals('Colour', actual: $colour->vname);
        $this->assertEquals('1', actual: $colour->active_id);


    }
}
