<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Utente 1',
            'email'=>'utente1@mail.it',
            'password'=>Hash::make('abcd1234',)
        ]);

        User::create([
            'name'=>'Utente 2',
            'email'=>'utente2@mail.it',
            'password'=>Hash::make('abcd1234',)
        ]);

        User::create([
            'name'=>'Utente 3',
            'email'=>'utente3@mail.it',
            'password'=>Hash::make('abcd1234',)
        ]);
    }
}
