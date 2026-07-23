<?php

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Seeder;

class PublicationSeeder extends Seeder
{
    public function run()
    {
        $publications = [
            [
                'title' => 'Laporan Tahunan PPID 2025',
                'file' => 'publications/laporan-tahunan-2025.pdf',
                'category' => 'laporan',
                'published_at' => now()->subDays(30),
            ],
            [
                'title' => 'Laporan Kinerja Sekolah 2025',
                'file' => 'publications/laporan-kinerja-2025.pdf',
                'category' => 'laporan',
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($publications as $item) {
            Publication::create($item);
        }
    }
}
