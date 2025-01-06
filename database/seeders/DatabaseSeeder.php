<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test',
            'last_name' => 'User', // Dodano last_name
            'email' => 'test@example.com',
            'participant_count' => 1, // Dodano participant_count
            'phone' => '123456789', // Przykładowy numer telefonu
            'password' => bcrypt('password'), // Hasło testowe
        ]);

        // Dodanie seederów dla tabel z danymi stałymi
        $this->call([
            CitizenshipSeeder::class,
            TripSeeder::class,
        ]);
    }
}
