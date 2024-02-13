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

        \App\Models\User::updateOrCreate([
            'id' => 1
        ], [
            'name' => 'Jang Ebe',
            'email' => 'jangebe91@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$5A00n.52HuPMCSIciQ0uvegoaSTxgERd43FdoT1/yYA3Bk9in3XL2',
        ]);
    }
}
