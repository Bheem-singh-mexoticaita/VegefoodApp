<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Bheem Pailoss',
            'email' => 'bheemexoticait@gmail.com',
            'password' => \Hash::make('12345678'),
            'type' => 1,
        ]);
    }
}
