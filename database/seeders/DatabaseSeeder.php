<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    
        // seeder Role & Permission
        $this->call([
            RolePermissionSeeder::class,
        ]);

        // Udah ada di RolePermissionSeeder
        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@ppid.test',
        //     'password' => bcrypt('password123'),
        // ]);

        $this->call([
            ServiceSeeder::class,
            NewsSeeder::class,
            DocumentSeeder::class,
            PublicationSeeder::class,
            ProcurementPackageSeeder::class,
        ]);
    }
}
