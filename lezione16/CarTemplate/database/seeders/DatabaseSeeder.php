<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Car::create([
            'name' => 'Audi',
            'model' => 'A4',
            'description' => 'Audi A4 2.0 TDI',
            'kw' => 140,
            'price' => 10000,
        ]);

        \App\Models\Car::create([
            'name' => 'BMW',
            'model' => '320d',
            'description' => 'BMW 320d',
            'kw' => 120,
            'price' => 8000,
        ]);

        \App\Models\Car::create([
            'name' => 'Mercedes',
            'model' => 'C220',
            'description' => 'Mercedes C220',
            'kw' => 110,
            'price' => 9000,
        ]);

        \App\Models\Car::create([
            'name' => 'VW',
            'model' => 'Passat',
            'description' => 'VW Passat 2.0 TDI',
            'kw' => 140,
            'price' => 10000,
        ]);

        \App\Models\Car::create([
            'name' => 'Opel',
            'model' => 'Astra',
            'description' => 'Opel Astra 1.7 CDTI',
            'kw' => 110,
            'price' => 7000,
        ]);

        
    }
}
