<?php

namespace Aaran\Taskmanager\Database\Seeders;

use Aaran\Taskmanager\Models\Todos;
use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    public static function run(): void
    {
        Todos::create([
            'slno' => '1',
            'date' => '2024-3-16',
            'vname' => 'my first todo',
            'completed' => 'false',
            'active_id' => '1',
        ]);
    }
}
