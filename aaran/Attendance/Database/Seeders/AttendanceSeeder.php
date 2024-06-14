<?php

namespace Aaran\Attendance\Database\Seeders;

use Aaran\Aadmin\Src\DbMigration;
use Aaran\Attendance\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        if (DbMigration::hasAttendance()) {
            Attendance::create([
                'vname' => '-',
            ]);
        }
    }
}
