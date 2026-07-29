<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman utama profil.
     */
    public function index()
    {
        $pages = [
            [
                'id' => 1,
                'slug' => 'profil-ppid',
                'title' => 'Profil PPID',
                'description' => 'Informasi mengenai Pejabat Pengelola Informasi dan Dokumentasi serta pelayanan informasi publik.',
                'banner_image' => 'https://placehold.co/1200x600/0B4F6C/FFFFFF?text=Profil+PPID',
            ],
            [
                'id' => 2,
                'slug' => 'profil-sekolah',
                'title' => 'Profil Sekolah',
                'description' => 'Informasi mengenai sejarah, gambaran umum, identitas, dan perkembangan sekolah.',
                'banner_image' => 'https://placehold.co/1200x600/146C94/FFFFFF?text=Profil+Sekolah',
            ],
            [
                'id' => 3,
                'slug' => 'visi-misi',
                'title' => 'Visi & Misi',
                'description' => 'Informasi mengenai visi, misi, tujuan, dan arah pengembangan sekolah.',
                'banner_image' => 'https://placehold.co/1200x600/1D5D9B/FFFFFF?text=Visi+dan+Misi',
            ],
            [
                'id' => 4,
                'slug' => 'tugas-fungsi',
                'title' => 'Tugas & Fungsi PPID',
                'description' => 'Informasi mengenai tugas, fungsi, tanggung jawab, dan peran PPID.',
                'banner_image' => 'https://placehold.co/1200x600/2E8A99/FFFFFF?text=Tugas+dan+Fungsi',
            ],
        ];

        return view('public.profile.index', compact('pages'));
    }

    /**
     * Menampilkan detail halaman berdasarkan slug.
     */
    public function detail(string $slug)
    {
        $pages = [

            'profil-ppid' => [
                'id' => 1,
                'slug' => 'profil-ppid',
                'title' => 'Profil PPID',
                'banner_image' => 'https://placehold.co/1600x550/0B4F6C/FFFFFF?text=Profil+PPID',
                'image' => 'https://placehold.co/1000x550/EAF5F8/0B4F6C?text=Pejabat+PPID',

                'content' => '
                    <h2>Tentang PPID</h2>

                    <p>
                        Pejabat Pengelola Informasi dan Dokumentasi atau PPID
                        merupakan pihak yang bertanggung jawab dalam pengelolaan,
                        penyimpanan, pendokumentasian, penyediaan, dan pelayanan
                        informasi publik.
                    </p>

                    <p>
                        PPID dibentuk untuk mendukung pelaksanaan keterbukaan
                        informasi publik serta memberikan pelayanan informasi
                        secara cepat, tepat, dan sederhana.
                    </p>

                    <h2>Dasar Pembentukan</h2>

                    <p>
                        Pelaksanaan pelayanan informasi publik berpedoman pada
                        peraturan perundang-undangan mengenai keterbukaan
                        informasi publik serta ketentuan yang berlaku.
                    </p>

                    <h2>Informasi PPID</h2>

                    <ul>
                        <li>Informasi mengenai profil badan publik.</li>
                        <li>Informasi mengenai program dan kegiatan.</li>
                        <li>Informasi mengenai layanan publik.</li>
                        <li>Informasi publik yang tersedia secara berkala.</li>
                    </ul>
                ',

                'file' => null,

                'button_text' => 'Ajukan Permohonan Informasi',

                'button_link' => '#',
            ],

            'profil-sekolah' => [
                'id' => 2,
                'slug' => 'profil-sekolah',
                'title' => 'Profil Sekolah',
                'banner_image' => 'https://placehold.co/1600x550/146C94/FFFFFF?text=Profil+Sekolah',
                'image' => 'https://placehold.co/1000x550/EAF5F8/146C94?text=Profil+Sekolah',

                'content' => '
                    <h2>Sejarah Sekolah</h2>

                    <p>
                        SMK Negeri 1 Katapang merupakan lembaga pendidikan
                        kejuruan yang berkomitmen untuk memberikan pendidikan
                        berkualitas serta mengembangkan kompetensi dan karakter
                        peserta didik.
                    </p>

                    <h2>Gambaran Sekolah</h2>

                    <p>
                        Sekolah menyediakan lingkungan belajar yang mendukung
                        pengembangan pengetahuan, keterampilan, kreativitas,
                        inovasi, dan kesiapan peserta didik menghadapi dunia
                        kerja maupun pendidikan lanjutan.
                    </p>

                    <h2>Identitas Sekolah</h2>

                    <table>
                        <thead>
                            <tr>
                                <th>Informasi</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Nama Sekolah</td>
                                <td>SMK Negeri 1 Katapang</td>
                            </tr>

                            <tr>
                                <td>Jenjang</td>
                                <td>Sekolah Menengah Kejuruan</td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>Negeri</td>
                            </tr>

                            <tr>
                                <td>Bidang Keahlian</td>
                                <td>Teknologi dan Rekayasa</td>
                            </tr>
                        </tbody>
                    </table>
                ',

                'file' => null,

                'button_text' => 'Kembali ke Halaman Profil',

                'button_link' => '/profil',
            ],

            'visi-misi' => [
                'id' => 3,
                'slug' => 'visi-misi',
                'title' => 'Visi & Misi',
                'banner_image' => 'https://placehold.co/1600x550/1D5D9B/FFFFFF?text=Visi+dan+Misi',
                'image' => 'https://placehold.co/1000x550/EAF5F8/1D5D9B?text=Visi+Misi',

                'content' => '
                    <h2>Visi</h2>

                    <div class="highlight-box">
                        Terwujudnya sekolah yang unggul, berkarakter,
                        kompeten, inovatif, dan mampu beradaptasi dengan
                        perkembangan ilmu pengetahuan dan teknologi.
                    </div>

                    <h2>Misi</h2>

                    <ol>
                        <li>Menyelenggarakan pendidikan yang berkualitas.</li>
                        <li>Meningkatkan kompetensi peserta didik.</li>
                        <li>Mengembangkan karakter dan budaya positif.</li>
                        <li>Mendorong inovasi serta pemanfaatan teknologi.</li>
                        <li>Membangun kerja sama dengan dunia usaha dan dunia industri.</li>
                    </ol>

                    <h2>Tujuan Sekolah</h2>

                    <p>
                        Menghasilkan lulusan yang memiliki kompetensi,
                        karakter, kreativitas, kemampuan beradaptasi,
                        serta kesiapan untuk melanjutkan pendidikan
                        atau memasuki dunia kerja.
                    </p>
                ',

                'file' => null,

                'button_text' => 'Lihat Profil Sekolah',

                'button_link' => '/profil-sekolah',
            ],

            'tugas-fungsi' => [
                'id' => 4,
                'slug' => 'tugas-fungsi',
                'title' => 'Tugas & Fungsi PPID',
                'banner_image' => 'https://placehold.co/1600x550/2E8A99/FFFFFF?text=Tugas+dan+Fungsi',
                'image' => 'https://placehold.co/1000x550/EAF5F8/2E8A99?text=Tugas+Fungsi+PPID',

                'content' => '
                    <h2>Tugas PPID</h2>

                    <p>
                        PPID bertugas mengelola, mendokumentasikan,
                        menyediakan, dan memberikan pelayanan informasi publik.
                    </p>

                    <h2>Fungsi PPID</h2>

                    <ul>
                        <li>Mengumpulkan informasi publik.</li>
                        <li>Mengelola dan menyimpan dokumentasi.</li>
                        <li>Menyediakan informasi yang dapat diakses masyarakat.</li>
                        <li>Memberikan pelayanan permohonan informasi.</li>
                        <li>Melakukan pembaruan informasi secara berkala.</li>
                    </ul>

                    <h2>Tanggung Jawab PPID</h2>

                    <p>
                        PPID bertanggung jawab menjaga ketersediaan,
                        ketepatan, kelengkapan, dan keterbaruan informasi
                        publik sesuai dengan ketentuan yang berlaku.
                    </p>
                ',

                'file' => null,

                'button_text' => 'Lihat Struktur Organisasi',

                'button_link' => '/struktur-organisasi',
            ],

        ];

        if (!isset($pages[$slug])) {
            abort(404);
        }

        $page = (object) $pages[$slug];

        return view(
            'public.profile.detail',
            compact('page')
        );
    }

    /**
     * Menampilkan struktur organisasi PPID.
     */
    public function organization()
    {
        $members = [

            (object) [
                'id' => 1,
                'name' => 'Nama Kepala PPID',
                'position' => 'Kepala PPID',
                'photo' => 'https://placehold.co/400x400/0B4F6C/FFFFFF?text=Kepala+PPID',
                'description' => 'Mengkoordinasikan seluruh pengelolaan dan pelayanan informasi publik.',
                'parent_id' => null,
            ],

            (object) [
                'id' => 2,
                'name' => 'Nama Wakil PPID',
                'position' => 'Wakil Kepala PPID',
                'photo' => 'https://placehold.co/400x400/146C94/FFFFFF?text=Wakil+PPID',
                'description' => 'Membantu pelaksanaan tugas dan koordinasi pelayanan informasi publik.',
                'parent_id' => 1,
            ],

            (object) [
                'id' => 3,
                'name' => 'Nama Bidang Informasi',
                'position' => 'Bidang Informasi',
                'photo' => 'https://placehold.co/400x400/1D5D9B/FFFFFF?text=Bidang+Informasi',
                'description' => 'Mengelola penyediaan dan penyampaian informasi publik.',
                'parent_id' => 1,
            ],

            (object) [
                'id' => 4,
                'name' => 'Nama Bidang Dokumentasi',
                'position' => 'Bidang Dokumentasi',
                'photo' => 'https://placehold.co/400x400/2E8A99/FFFFFF?text=Bidang+Dokumentasi',
                'description' => 'Mengelola dokumen dan arsip informasi publik.',
                'parent_id' => 1,
            ],

            (object) [
                'id' => 5,
                'name' => 'Nama Anggota PPID',
                'position' => 'Anggota',
                'photo' => 'https://placehold.co/400x400/397367/FFFFFF?text=Anggota',
                'description' => 'Mendukung pelaksanaan layanan dan pengelolaan informasi publik.',
                'parent_id' => 2,
            ],

        ];

        return view(
            'public.profile.organization',
            compact('members')
        );
    }
}