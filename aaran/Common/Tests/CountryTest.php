<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\Country;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use DatabaseMigrations;

    public function test_country_table(): void
    {
        $country = Country::factory()->create();

        $this->assertEquals('Country', actual: $country->vname);
        $this->assertEquals('1', actual: $country->active_id);


    }
}
