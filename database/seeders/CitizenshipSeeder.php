<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitizenshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citizenships = [
            ['citizenship' => 'polskie'],
            ['citizenship' => 'amerykańskie'],
            ['citizenship' => 'brytyjskie'],
            ['citizenship' => 'francuskie'],
            ['citizenship' => 'niemieckie'],
            ['citizenship' => 'ukraińskie'],
            ['citizenship' => 'inne'],
        ];

        DB::table('citizenships')->insert($citizenships);
    }
}
