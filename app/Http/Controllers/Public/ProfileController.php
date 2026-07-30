<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    private array $pages = [
        'profil-ppid' => [
            'title' => 'Profil PPID',
            'description' => 'Informasi mengenai Pejabat Pengelola Informasi dan Dokumentasi SMK Negeri 1 Katapang.',
            'banner_image' => null,
            'content' => '
                <h2>Tentang PPID</h2>
                <p>
                    Pejabat Pengelola Informasi dan Dokumentasi (PPID) merupakan
                    unit yang bertugas mengelola, menyimpan, mendokumentasikan,
                    serta menyediakan informasi publik.
                </p>

                <h2>Dasar Pembentukan</h2>
                <p>
                    PPID dibentuk sebagai bentuk pelaksanaan keterbukaan informasi
                    publik dan pelayanan informasi yang transparan, cepat, serta
                    mudah diakses oleh masyarakat.
                </p>

                <h2>Informasi PPID</h2>
                <p>
                    Melalui layanan PPID, masyarakat dapat memperoleh informasi
                    publik sesuai dengan ketentuan yang berlaku.
                </p>
            ',
            'file' => null,
        ],

        'profil-sekolah' => [
            'title' => 'Profil Sekolah',
            'description' => 'Mengenal sejarah, identitas, dan gambaran umum SMK Negeri 1 Katapang.',
            'banner_image' => null,
            'content' => '
                <h2>Sejarah Sekolah</h2>
                <p>
                    SMK Negeri 1 Katapang merupakan sekolah menengah kejuruan
                    yang berkomitmen untuk menghasilkan lulusan yang kompeten,
                    berkarakter, dan siap menghadapi dunia kerja.
                </p>

                <h2>Gambaran Sekolah</h2>
                <p>
                    Sekolah menyediakan berbagai program keahlian dan kegiatan
                    pembelajaran yang mendukung pengembangan keterampilan,
                    pengetahuan, serta karakter peserta didik.
                </p>

                <h2>Identitas Sekolah</h2>
                <table>
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>SMK Negeri 1 Katapang</td>
                    </tr>
                    <tr>
                        <td>Jenjang</td>
                        <td>Sekolah Menengah Kejuruan</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>Kecamatan Katapang, Kabupaten Bandung</td>
                    </tr>
                </table>
            ',
            'file' => null,
        ],

        'visi-misi' => [
            'title' => 'Visi & Misi',
            'description' => 'Visi, misi, dan tujuan SMK Negeri 1 Katapang.',
            'banner_image' => null,
            'content' => '
                <h2>Visi</h2>
                <p>
                    Terwujudnya peserta didik yang berkarakter, kompeten,
                    inovatif, dan mampu bersaing di dunia kerja.
                </p>

                <h2>Misi</h2>
                <ol>
                    <li>Menyelenggarakan pendidikan yang berkualitas.</li>
                    <li>Mengembangkan kompetensi peserta didik sesuai kebutuhan industri.</li>
                    <li>Menumbuhkan karakter yang disiplin dan bertanggung jawab.</li>
                    <li>Mendorong kreativitas, inovasi, dan kemampuan beradaptasi.</li>
                </ol>

                <h2>Tujuan Sekolah</h2>
                <p>
                    Mempersiapkan lulusan yang memiliki pengetahuan,
                    keterampilan, karakter, dan kemampuan untuk melanjutkan
                    pendidikan maupun memasuki dunia kerja.
                </p>
            ',
            'file' => null,
        ],

        'tugas-fungsi' => [
            'title' => 'Tugas & Fungsi PPID',
            'description' => 'Tugas, fungsi, dan tanggung jawab PPID dalam pelayanan informasi publik.',
            'banner_image' => null,
            'content' => '
                <h2>Tugas PPID</h2>
                <ul>
                    <li>Mengelola informasi dan dokumentasi publik.</li>
                    <li>Menyediakan informasi yang dapat diakses oleh masyarakat.</li>
                    <li>Melayani permohonan informasi publik.</li>
                </ul>

                <h2>Fungsi PPID</h2>
                <ul>
                    <li>Mengumpulkan dan mengelola informasi publik.</li>
                    <li>Menyimpan serta mendokumentasikan informasi.</li>
                    <li>Menyediakan informasi secara cepat dan tepat.</li>
                </ul>

                <h2>Tanggung Jawab PPID</h2>
                <p>
                    PPID bertanggung jawab untuk menjaga ketersediaan,
                    ketepatan, dan keterbukaan informasi publik sesuai
                    dengan peraturan yang berlaku.
                </p>
            ',
            'file' => null,
        ],
    ];

    public function index()
    {
        $profiles = [
            [
                'title' => 'Profil PPID',
                'description' => 'Informasi mengenai PPID dan layanan informasi publik.',
                'icon' => '🏛️',
                'url' => route('profile.detail', 'profil-ppid'),
            ],
            [
                'title' => 'Profil Sekolah',
                'description' => 'Sejarah, gambaran, dan identitas sekolah.',
                'icon' => '🏫',
                'url' => route('profile.detail', 'profil-sekolah'),
            ],
            [
                'title' => 'Visi & Misi',
                'description' => 'Visi, misi, dan tujuan sekolah.',
                'icon' => '🎯',
                'url' => route('profile.detail', 'visi-misi'),
            ],
            [
                'title' => 'Tugas & Fungsi PPID',
                'description' => 'Tugas dan tanggung jawab PPID.',
                'icon' => '📋',
                'url' => route('profile.detail', 'tugas-fungsi'),
            ],
            [
                'title' => 'Struktur Organisasi',
                'description' => 'Struktur organisasi dan anggota PPID.',
                'icon' => '👥',
                'url' => route('profile.organization'),
            ],
        ];

        return view('public.profile.index', compact('profiles'));
    }

    public function detail(string $slug)
    {
        abort_unless(isset($this->pages[$slug]), 404);

        $page = $this->pages[$slug];

        return view('public.profile.detail', compact('page'));
    }

    public function organization()
    {
        $members = [
            [
                'name' => 'Nama Kepala PPID',
                'position' => 'Kepala PPID',
                'description' => 'Bertanggung jawab atas pengelolaan layanan informasi publik.',
                'photo' => null,
            ],
            [
                'name' => 'Nama Wakil PPID',
                'position' => 'Wakil PPID',
                'description' => 'Membantu pelaksanaan tugas dan pelayanan PPID.',
                'photo' => null,
            ],
            [
                'name' => 'Nama Petugas Informasi',
                'position' => 'Bidang Informasi',
                'description' => 'Mengelola dan menyediakan informasi publik.',
                'photo' => null,
            ],
            [
                'name' => 'Nama Petugas Dokumentasi',
                'position' => 'Bidang Dokumentasi',
                'description' => 'Mengelola dokumen dan arsip informasi.',
                'photo' => null,
            ],
        ];

        return view('public.profile.organization', compact('members'));
    }
}