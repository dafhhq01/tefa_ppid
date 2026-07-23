<?php

namespace Database\Seeders;

use App\Models\InformationCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Informasi Berkala',
            'Informasi Serta Merta',
            'Informasi Setiap Saat',
            'Informasi Dikecualikan',
        ];

        foreach ($categories as $category) {
            InformationCategory::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
