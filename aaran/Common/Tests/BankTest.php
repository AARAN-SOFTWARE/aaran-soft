<?php

namespace Aaran\Common\Tests;

use Aaran\Common\Models\Bank;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BankTest extends TestCase
{
    use DatabaseMigrations;

    public function test_bank_table(): void
    {
        $bank = Bank::factory()->create();

        $obj = Bank::find($bank->id);

        $this->assertEquals($bank->vname, actual: $obj->vname);
        $this->assertEquals($bank->active_id, actual: $obj->active_id);
    }
}
