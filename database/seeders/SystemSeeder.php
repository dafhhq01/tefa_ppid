<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'site_name',
            'value' => 'PPID SMK Negeri X'
        ]);
        Setting::create([
            'key' => 'email',
            'value' => 'ppid@smk.sch.id'
        ]);
        Setting::create([
            'key' => 'phone',
            'value' => '08123456789'
        ]);
    }
}
