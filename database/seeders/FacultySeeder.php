<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $faculties = [
            ['name' => 'Bsc.CSIT'],
            ['name' => 'BCA'],
            ['name' => 'BIM'],
            ['name' => 'BHM'],
            ['name' => 'BBS'],
        ];

        DB::table('faculties')->insert($faculties);
    }
}
