<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trips = [
            [
                'destination' => 'Argentyna i Chile',
                'flag' => '<img src="/img/flags/f_arg.png" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Argentina">
                        <img src="/img/flags/f_chile.png" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Chile">',
                'trip_name' => 'W tango pod Andami',
                'country' => 'Argentyna, Chile'
            ],
            [
                'destination' => 'Indonezja',
                'flag' => '<img src="/img/flags/f_indo.png" width="auto" height="25" class="mx-1 shadow" alt="Flag of Indonesia">',
                'trip_name' => 'W świecie kontrastów',
                'country' => 'Indonezja'
            ],
            [
                'destination' => 'Kambodża',
                'flag' => '<img src="/img/flags/f_cam.png" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Cambodia">',
                'trip_name' => 'Królestwo w dżungli',
                'country' => 'Kambodża'
            ],
            [
                'destination' => 'Peru i Boliwia',
                'flag' => '<img src="/img/flags/f_peru.png" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Peru">
                        <img src="/img/flags/f_bol.png" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Bolivia">',
                'trip_name' => 'W krainie kultu Słońca',
                'country' => 'Peru, Boliwia'
            ],
            [
                'destination' => 'Sri Lanka',
                'flag' => '<img src="/img/flags/f_sri.png" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Sri Lanka">',
                'trip_name' => 'Budda, herbata i słonie',
                'country' => 'Sri Lanka'
            ],
            [
                'destination' => 'Tybet, w Chinach',
                'flag' => '<img src="/img/flags/f_tib.png" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Tibet">
                        <img src="/img/flags/f_chin.png" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of China">',
                'trip_name' => 'Na Dachu Świata',
                'country' => 'Tybet, Chiny'
            ],
        ];

        DB::table('trips')->insert($trips);
    }
}
