<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\Transport;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TransportTest extends TestCase
{
    use DatabaseMigrations;

    public function test_transport_table(): void
    {
        $transport = Transport::factory()->create();

        $this->assertEquals('AARAN', actual: $transport->vname);
        $this->assertEquals('TN39DC5455', actual: $transport->vehicle_no);
        $this->assertEquals('1', actual: $transport->active_id);


    }
}
