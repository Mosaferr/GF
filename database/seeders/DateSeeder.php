<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DateSeeder extends Seeder
{
    /*** Run the database seeds. */
    public function run(): void
    {
		$dates = [
			[
				'trip_id' => 1,
				'start_date' => '2025-06-01',
				'end_date'   => '2025-06-16',
				'price'      => 11800,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 2,
				'start_date' => '2025-06-07',
				'end_date'   => '2025-06-22',
				'price'      => 9700,
				'available_seats' => 8,
				'total_seats'     => 8
			],
			[
				'trip_id' => 3,
				'start_date' => '2025-06-09',
				'end_date'   => '2025-06-24',
				'price'      => 8700,
				'available_seats' => 8,
				'total_seats'     => 8
			],
			[
				'trip_id' => 4,
				'start_date' => '2025-06-11',
				'end_date'   => '2025-06-26',
				'price'      => 10800,
				'available_seats' => 8,
				'total_seats'     => 8
			],
			[
				'trip_id' => 5,
				'start_date' => '2025-06-22',
				'end_date'   => '2025-07-07',
				'price'      => 9300,
				'available_seats' => 4,
				'total_seats'     => 4
			],
			[
				'trip_id' => 6,
				'start_date' => '2025-07-04',
				'end_date'   => '2025-07-19',
				'price'      => 12600,
				'available_seats' => 3,
				'total_seats'     => 3
			],
			[
				'trip_id' => 1,
				'start_date' => '2025-07-12',
				'end_date'   => '2025-07-27',
				'price'      => 11800,
				'available_seats' => 0,
				'total_seats'     => 10
			],
			[
				'trip_id' => 2,
				'start_date' => '2025-07-16',
				'end_date'   => '2025-07-31',
				'price'      => 9700,
				'available_seats' => 0,
				'total_seats'     => 1
			],
			[
				'trip_id' => 3,
				'start_date' => '2025-07-25',
				'end_date'   => '2025-08-13',
				'price'      => 8700,
				'available_seats' => 10,
				'total_seats'     => 10
			],
			[
				'trip_id' => 4,
				'start_date' => '2025-08-03',
				'end_date'   => '2025-08-18',
				'price'      => 10800,
				'available_seats' => 8,
				'total_seats'     => 8
			],
			[
				'trip_id' => 5,
				'start_date' => '2025-08-10',
				'end_date'   => '2025-08-25',
				'price'      => 9300,
				'available_seats' => 11,
				'total_seats'     => 11
			],
			[
				'trip_id' => 6,
				'start_date' => '2025-08-16',
				'end_date'   => '2025-08-31',
				'price'      => 12600,
				'available_seats' => 9,
				'total_seats'     => 9
			],
			[
				'trip_id' => 1,
				'start_date' => '2025-09-01',
				'end_date'   => '2025-09-16',
				'price'      => 11800,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 2,
				'start_date' => '2025-09-07',
				'end_date'   => '2025-09-22',
				'price'      => 9700,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 3,
				'start_date' => '2025-09-19',
				'end_date'   => '2025-10-04',
				'price'      => 8700,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 4,
				'start_date' => '2025-09-26',
				'end_date'   => '2025-10-11',
				'price'      => 10800,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 5,
				'start_date' => '2025-10-01',
				'end_date'   => '2025-10-16',
				'price'      => 9300,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 6,
				'start_date' => '2025-10-08',
				'end_date'   => '2025-10-23',
				'price'      => 12600,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 1,
				'start_date' => '2025-10-13',
				'end_date'   => '2025-10-28',
				'price'      => 11800,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 2,
				'start_date' => '2025-10-28',
				'end_date'   => '2025-11-13',
				'price'      => 9700,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 3,
				'start_date' => '2025-11-05',
				'end_date'   => '2025-11-20',
				'price'      => 8700,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 4,
				'start_date' => '2025-11-14',
				'end_date'   => '2025-11-29',
				'price'      => 10800,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 5,
				'start_date' => '2025-11-30',
				'end_date'   => '2025-12-15',
				'price'      => 9300,
				'available_seats' => 12,
				'total_seats'     => 12
			],
			[
				'trip_id' => 6,
				'start_date' => '2025-12-06',
				'end_date'   => '2025-12-21',
				'price'      => 12600,
				'available_seats' => 12,
				'total_seats'     => 12
			]
		];

        DB::table('dates')->insert($dates);
    }
}
