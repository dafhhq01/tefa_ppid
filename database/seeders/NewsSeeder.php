<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        // Ambil user pertama sebagai author (atau buat jika belum ada)
        $author = User::first();
        if (!$author) {
            $author = User::factory()->create([
                'name' => 'Admin PPID',
                'email' => 'admin@ppid.com',
            ]);
        }

        $news = [
            [
                'title' => 'PPID SMKN 1 Katapang Resmi Meluncurkan Website Baru',
                'slug' => 'ppid-smkn-1-katapang-resmi-meluncurkan-website-baru',
                'thumbnail' => 'news/website-ppid.jpg',
                'excerpt' => 'PPID SMKN 1 Katapang secara resmi meluncurkan website baru sebagai pusat informasi publik sekolah.',
                'content' => '<p>PPID SMKN 1 Katapang dengan bangga mengumumkan peluncuran website resmi yang bertujuan untuk meningkatkan transparansi dan akses informasi publik. Website ini menyediakan berbagai layanan seperti permohonan informasi, pengaduan, dan akses dokumen publik.</p>
                <h3>Fitur Unggulan</h3>
                <ul>
                    <li>Permohonan informasi online</li>
                    <li>Pengaduan masyarakat</li>
                    <li>Download dokumen publik</li>
                    <li>Informasi berkala dan serta-merta</li>
                </ul>
                <p>Dengan peluncuran ini, masyarakat dapat dengan mudah mengakses informasi yang dibutuhkan tanpa harus datang langsung ke sekolah.</p>',
                'published_at' => now()->subDays(5),
                'author_id' => $author->id, // ISI DENGAN ID USER
                'is_featured' => true,
            ],
            // Tambah berita lain jika perlu
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
