<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Buat Permissions
        $permissions = [
            'user.manage',
            'page.manage',
            'information.manage',
            'regulation.manage',
            'news.manage',
            'document.manage',
            'request.manage',
            'complaint.manage',
            'setting.manage',
            'dashboard.view',
            'report.view',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 2. Buat Roles & Assign Permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all()); // Admin dapat semua izin

        $ppidRole = Role::firstOrCreate(['name' => 'ppid']);
        $ppidRole->givePermissionTo([
            'page.manage',
            'information.manage',
            'news.manage',
            'document.manage',
            'request.manage',
            'complaint.manage',
        ]);

        $pimpinanRole = Role::firstOrCreate(['name' => 'pimpinan']);
        $pimpinanRole->givePermissionTo([
            'dashboard.view',
            'report.view',
        ]);

        $userRole = Role::firstOrCreate(['name' => 'user']); // Publik, tidak ada permission admin

        // 3. Buat Akun Contoh untuk Testing
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@ppid.test'],
            [
                'name' => 'Admin PPID',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );
        $adminUser->assignRole($adminRole);

        $ppidUser = User::firstOrCreate(
            ['email' => 'ppid@ppid.test'],
            [
                'name' => 'Operator PPID',
                'password' => Hash::make('password'),
                'role' => 'ppid',
            ]
        );
        $ppidUser->assignRole($ppidRole);

        $pimpinanUser = User::firstOrCreate(
            ['email' => 'pimpinan@ppid.test'],
            [
                'name' => 'Kepala Sekolah / Pimpinan',
                'password' => Hash::make('password'),
                'role' => 'pimpinan',
            ]
        );
        $pimpinanUser->assignRole($pimpinanRole);
    }
}