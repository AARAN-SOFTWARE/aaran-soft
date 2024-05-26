<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\Bank;
use App\Livewire\Common\CountryList;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire\Livewire;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use DatabaseMigrations;

    public function test_bank_table(): void
    {
        $bank = Bank::factory()->create();

        $obj = Bank::find($bank->id);

        $this->assertEquals($bank->vname, actual: $obj->vname);
        $this->assertEquals($bank->active_id, actual: $obj->active_id);
    }


    public function test_route_orders()
    {
        Livewire::test(CountryList::class)
            ->assertStatus(200);

    }

}
