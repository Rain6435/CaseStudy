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

        \App\Models\User::create([
            'name' => 'Marco',
            'ip' => '1.2.3.4',
            'left_at'=>null
        ]);
        \App\Models\User::create([
            'name' => 'John',
            'ip' => '2.2.1.1',
            'left_at'=>null
        ]);
    }
}
