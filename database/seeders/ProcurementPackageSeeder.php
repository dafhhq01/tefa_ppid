<?php

namespace Database\Seeders;

use App\Models\ProcurementPackage;
use Illuminate\Database\Seeder;

class ProcurementPackageSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat Parent (RUP Induk)
        $rup2026 = ProcurementPackage::create([
            'title' => 'RUP Tahun 2026 SMKN 1 Katapang',
            'year' => 2026,
            'stage' => null, // RUP induk biasanya tidak butuh stage
            'file' => null,
            'external_url' => null,
            'parent_id' => null,
        ]);

        // 2. Buat Child 1 (Paket Pengadaan di bawah RUP 2026)
        ProcurementPackage::create([
            'title' => 'Pengadaan Laptop Lab RPL',
            'year' => 2026,
            'stage' => 'perencanaan',
            'file' => 'procurement/dokumen-perencanaan-laptop.pdf',
            'external_url' => null,
            'parent_id' => $rup2026->id, // Menginduk ke RUP 2026
        ]);

        // 3. Buat Child 2 (Paket Pengadaan di bawah RUP 2026)
        ProcurementPackage::create([
            'title' => 'Renovasi Gedung Bengkel TEFA',
            'year' => 2026,
            'stage' => 'pelaksanaan',
            'file' => null,
            'external_url' => 'https://lpse.jabarprov.go.id/eproc4/lelang/123456',
            'parent_id' => $rup2026->id, // Menginduk ke RUP 2026
        ]);
    }
}
