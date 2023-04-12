<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // This creates dummy data, and one who is admin
        \App\Models\User::factory( count: 1)->create(['is_admin' => true]);
    }
}
