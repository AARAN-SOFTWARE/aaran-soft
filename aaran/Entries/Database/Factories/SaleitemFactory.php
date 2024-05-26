<?php

namespace Aaran\Entries\Database\Factories;

use Aaran\Entries\Models\Sale;
use Aaran\Entries\Models\Saleitem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Aaran\Entries\Models\Sale>
 */
class SaleitemFactory extends Factory
{
    protected $model = Saleitem::class;
    public function definition(): array
    {
        return [
            //
        ];
    }
}
