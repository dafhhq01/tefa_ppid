<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan baris ini ada di dalam function run
        $this->call([
            RolePermissionSeeder::class,
        ]);
    }
}
