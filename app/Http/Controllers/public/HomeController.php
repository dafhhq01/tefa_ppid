<?php

namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $banner = [
            'title' => 'PPID SMKN 1 Katapang',
            'subtitle' => 'Media resmi penyedia informasi publik yang transparan, akuntabel, dan mudah diakses oleh warga sekolah maupun masyarakat.',
            'image' => asset('img/background_sklh.jpg'),
            'button_primary' => 'Ajukan Permohonan Informasi',
            'button_primary_link' => '#',
            'button_secondary' => 'Lihat Informasi Publik',
            'button_secondary_link' => '#',
        ];

        $statistics = [
            [
                'title' => 'Informasi Publik',
                'value' => 120,
            ],
            [
                'title' => 'Dokumen',
                'value' => 56,
            ],
            [
                'title' => 'Berita',
                'value' => 32,
            ],
            [
                'title' => 'Permohonan',
                'value' => 15,
            ],
        ];

        $services = [
            [
                'icon' => 'fa-file-circle-plus',
                'title' => 'Permohonan Informasi',
                'description' => 'Ajukan permohonan informasi publik secara online dengan mudah.',
                'button' => 'Ajukan Permohonan',
                'link' => '#',
            ],
            [
                'icon' => 'fa-comments',
                'title' => 'Pengaduan Informasi',
                'description' => 'Ajukan pengaduan terkait informasi publik yang tidak tersedia atau tidak akurat.',
                'button' => 'Kirim Pengaduan',
                'link' =>'#',
            ],
            [
                'icon' => 'fa-download',
                'title' => 'Download Dokumen',
                'description' => 'Unduh dokumen-dokumen penting terkait informasi publik.',
                'button' => 'Download',
                'link' =>'#',
            ],
        ];

        $informations = [
            [
                'title' => 'lorem ipsum',
                'date' => '25 Juli 2026',
                'summary' => 'lorem ipsum dolor sit amet',
                'link' => '#',
            ],
            [
                'title' => 'lorem ipsum dolor sit amet',
                'date' => '20 Juli 2026',
                'summary' => 'lorem ipsum dolor sit amet',
                'link' => '#',
            ],
            [
                'title' => 'lorem ipsum dolor sit amet',
                'date' => '18 Juli 2026',
                'summary' => 'lorem ipsum dolor sit amet',
                'link' => '#',
            ],
        ];

        $news = [
            [
                'title' => 'lorem ipsum',
                'date' => '25 Juli 2026',
                'summary' => 'lorem ipsum dolor sit amet',
                'link' => '#',
            ],
            [
                'title' => 'lorem ipsum dolor sit amet',
                'date' => '20 Juli 2026',
                'summary' => 'lorem ipsum dolor sit amet',
                'link' => '#',
            ],
            [
                'title' => 'lorem ipsum dolor sit amet',
                'date' => '18 Juli 2026',
                'summary' => 'lorem ipsum dolor sit amet',
                'link' => '#',
            ],
        ];

        $cta = [
                'title' => 'Butuh Informasi Publik?',
                'description' => 'Ajukan permohonan informasi secara online
melalui layanan PPID SMKN 1 Katapang.',
                'link' => '#',
        ];

        return view('public.home', compact('banner', 'statistics', 'services', 'informations', 'news', 'cta'));
    }
}
