<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'hasan@eksinet.com'],
            [
                'name' => 'Hasan Ekşi',
                'password' => Hash::make(123123),
            ]
        );

        $this->call([
            PostTypeSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            ServiceSeeder::class,
            DemoStatsSeeder::class,
        ]);
    }
}
