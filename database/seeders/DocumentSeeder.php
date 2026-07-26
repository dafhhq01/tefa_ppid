<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    public function run()
    {
        $documents = [
            // Dokumen Pengadaan
            [
                'title' => 'RAB Pembangunan Gedung Workshop SMKN 1 Katapang',
                'category' => 'pengadaan',
                'type' => 'procurement',
                'file' => 'documents/rab-workshop.pdf',
            ],
            [
                'title' => 'SOP Pelayanan Informasi PPID',
                'category' => 'SOP',
                'type' => 'public',
                'file' => 'documents/sop-ppid.pdf',
            ],

        ];

        foreach ($documents as $item) {
            Document::create($item);
        }
    }
}
