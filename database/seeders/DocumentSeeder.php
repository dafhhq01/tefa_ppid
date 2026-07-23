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
                'file' => 'documents/rab-workshop.pdf',
            ],

        ];

        foreach ($documents as $item) {
            Document::create($item);
        }
    }
}
