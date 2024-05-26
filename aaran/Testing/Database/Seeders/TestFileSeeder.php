<?php

namespace Aaran\Testing\Database\Seeders;

use Aaran\Testing\Models\TestFile;
use Illuminate\Database\Seeder;

class TestFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        TestFile::create([
            'vname' => 'Model',
            'active_id' => '1'
        ]);

        TestFile::create([
            'vname' => 'Migrate',
            'active_id' => '1'
        ]);

        TestFile::create([
            'vname' => 'Livewire Class',
            'active_id' => '1'
        ]);

        TestFile::create([
            'vname' => 'Livewire Model',
            'active_id' => '1'
        ]);

        TestFile::create([
            'vname' => 'Route',
            'active_id' => '1'
        ]);

        TestFile::create([
            'vname' => 'Menu',
            'active_id' => '1'
        ]);
    }
}
