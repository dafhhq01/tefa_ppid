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
                'description' => 'Laporan tahunan pelaksanaan tugas dan fungsi PPID SMKN 1 Katapang periode 2025.',
                'file' => 'publications/laporan-tahunan-2025.pdf',
                'published_at' => now()->subDays(30),
            ],
        ];

        foreach ($publications as $item) {
            Publication::create($item);
        }
    }
}
