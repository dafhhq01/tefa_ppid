<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Tampilan halaman utama layanan publik
    public function index()
    {
        return view('public.service.index');
    }

    // Tampilan halaman daftar informasi publik (Sementara pakai data kosong)
    public function informationList(Request $request)
    {
        $informationList = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 10);
        $kategoriList = [];
        
        return view('public.service.information-list', compact('informationList', 'kategoriList'));
    }

    // Tampilan halaman permohonan informasi
    public function requestForm(Request $request)
    {
        $selectedInfoId = $request->input('id');
        $informationList = [];

        return view('public.service.request-form', compact('selectedInfoId', 'informationList'));
    }

    // Proses Simpan Permohonan Informasi
    public function submitRequest(Request $request)
    {
        $request->validate([
            'nama_lengkap'      => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'nomor_telepon'     => 'required|string|max:20',
            'nik'               => 'required|string|size:16',
            'informasi_diminta' => 'required',
            'alasan_permohonan' => 'required|string',
            'lampiran'          => 'required|nullable|file|max:5120|mimes:pdf,doc,docx,jpg,png',
        ]);

        return redirect()->route('public.service.tracking')->with('success', 'Permintaan informasi berhasil dikirim!');
    }

    // Tampilan halaman pengaduan masyarakat
    public function complaintForm()
    {
        return view('public.service.complaint-form');
    }

    // Proses Simpan Pengaduan
    public function storeComplaint(Request $request)
    {
        $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'nomor_telepon'   => 'required|string|max:20',
            'subjek_pengaduan'=> 'required|string|max:255',
            'isi_pengaduan'   => 'required|string',
            'lampiran'        => 'nullable|file|max:5120|mimes:pdf,doc,docx,jpg,png',
        ]);

        return back()->with('success', 'Pengaduan keberatan informasi berhasil dikirim!');
    }

    // Tampilan halaman tracking
    public function trackingform()
    {
        return view('public.service.tracking');
    }

    // Tampilan hasil tracking
    public function trackingResult(Request $request)
    {
        $request->validate([
        'no_tiket' => 'required|string',
    ]);

    $noTiket = $request->input('no_tiket');

    // Contoh data simulasi berdasarkan nomor tiket
    if ($noTiket === 'REQ-20260720-0001') {
        $trackingResult = (object) [
            'no_tiket' => 'REQ-20260720-0001',
            'nama_lengkap' => 'Budi Santoso',
            'tanggal' => '20 Juli 2026',
            'jenis_layanan' => 'Permohonan Informasi Publik',
            'status' => 'Diproses', // Pilihan: Pending, Diproses, Selesai, Ditolak
        ];

        // Mengarahkan ke file view tracking-result.blade.php yang baru saja dibuat
        return view('public.service.tracking-result', compact('trackingResult'));
    }

    // Jika tiket tidak ditemukan, kembalikan ke halaman form dengan pesan error
    return back()->withInput()->with('error', 'Nomor tiket tidak ditemukan. Silakan periksa kembali.');
    }
}