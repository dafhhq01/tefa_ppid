<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    /**
     * Halaman klasifikasi informasi (4 kategori utama)
     */
    public function index()
    {
        $categories = $this->getCategories();

        return view('public.information.index', compact('categories'));
    }

    /**
     * Daftar informasi berdasarkan slug kategori
     * contoh: /informasi/berkala
     */
    public function category(Request $request, string $kategori)
    {
        $categories = $this->getCategories();

        $category = collect($categories)->firstWhere('slug', $kategori);

        abort_if(!$category, 404);

        $search = $request->query('search');

        $informations = $this->getInformationsByCategory($kategori, $search);

        return view('public.information.category', compact('category', 'informations', 'categories'));
    }

    /**
     * Detail satu informasi
     * contoh: /informasi/detail/laporan-tahunan-2025
     */
    public function detail(string $slug)
    {
        $information = $this->getInformationBySlug($slug);

        abort_if(!$information, 404);

        return view('public.information.detail', compact('information'));
    }

    /**
     * Halaman Regulasi PPID
     */
    public function regulation()
    {
        $regulations = $this->getRegulations();

        return view('public.information.regulation', compact('regulations'));
    }

    /**
     * Halaman FAQ
     */
    public function faq()
    {
        $faqs = $this->getFaqs();

        return view('public.information.faq', compact('faqs'));
    }

    /* ==========================================================
     |  DATA LAYER — dummy dulu, tinggal ganti isi method ini
     |  begitu Model dari BE3 tersedia (Information, dst).
     |========================================================== */

    private function getCategories(): array
    {
        // TODO: ganti dengan InformationCategory::withCount('informations')->get();
        return [
            [
                'name'        => 'Informasi Berkala',
                'slug'        => 'berkala',
                'description' => 'Informasi yang wajib disediakan dan diumumkan secara berkala, mis. laporan tahunan, profil, struktur organisasi, dan program kerja.',
                'count'       => 12,
            ],
            [
                'name'        => 'Informasi Serta Merta',
                'slug'        => 'serta-merta',
                'description' => 'Informasi yang wajib diumumkan segera karena bersinggungan dengan hajat hidup orang banyak dan ketertiban umum.',
                'count'       => 3,
            ],
            [
                'name'        => 'Informasi Setiap Saat',
                'slug'        => 'setiap-saat',
                'description' => 'Informasi yang wajib tersedia setiap saat, mis. kebijakan, rencana kerja, MoU, dan prosedur kerja.',
                'count'       => 8,
            ],
            [
                'name'        => 'Informasi Dikecualikan',
                'slug'        => 'dikecualikan',
                'description' => 'Daftar informasi yang dikecualikan sesuai ketentuan perundang-undangan tentang keterbukaan informasi publik.',
                'count'       => 2,
            ],
        ];
    }

    private function getInformationsByCategory(string $slug, ?string $search = null): array
    {
        // TODO: ganti dengan Information::where('category_id', ...)->when($search, ...)->get();
        $dummy = [
            [
                'title'        => 'Laporan Tahunan 2025',
                'slug'         => 'laporan-tahunan-2025',
                'category'     => 'berkala',
                'excerpt'      => 'Ringkasan capaian kinerja lembaga sepanjang tahun 2025.',
                'file'         => 'laporan-tahunan-2025.pdf',
                'external_url' => null,
                'created_at'   => '2025-12-20',
            ],
        ];

        return collect($dummy)
            ->where('category', $slug)
            ->when($search, fn ($q) => $q->filter(fn ($i) => str_contains(strtolower($i['title']), strtolower($search))))
            ->values()
            ->all();
    }

    private function getInformationBySlug(string $slug): ?array
    {
        // TODO: ganti dengan Information::where('slug', $slug)->first();
        return collect($this->getInformationsByCategory('berkala'))->firstWhere('slug', $slug);
    }

    private function getRegulations(): array
    {
        // TODO: ganti dengan Regulation::all()->groupBy('type');
        return [
            'undang_undang' => [
                ['title' => 'UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik', 'file' => null, 'external_url' => 'https://peraturan.bpk.go.id/'],
            ],
            'peraturan_pemerintah' => [],
            'peraturan_sekolah' => [],
        ];
    }

    private function getFaqs(): array
    {
        // TODO: ganti dengan Faq::orderBy('order')->get();
        return [
            ['question' => 'Bagaimana cara meminta informasi?', 'answer' => 'Silakan mengajukan permohonan melalui formulir permohonan informasi publik yang tersedia pada halaman Layanan PPID.'],
            ['question' => 'Berapa lama proses permohonan?', 'answer' => 'Proses permohonan informasi maksimal 10 hari kerja dan dapat diperpanjang 7 hari kerja sesuai ketentuan.'],
        ];
    }
}