<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformationRequest;
use App\Models\Complaint;
use App\Models\StatusHistory;
use App\Models\User;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::query()->first();

        $request = InformationRequest::create([
            'ticket_number' => 'REQ-20260722-0001',
            'name' => 'Daffa',
            'email' => 'dafhhq01@gmail.com',
            'phone' => '089604844544',
            'identity_number' => '32093298301920932',
            'subject' => 'Permintaan Data Anggaran Pendidikan',
            'message' => 'Saya perlu dokumen laporan anggaran pendidikan',
            'status' => 'process',
        ]);

        StatusHistory::create([
            'request_id' => $request->id,
            'status' => 'pending',
            'note' => 'Permohonan berhasil dikirim',
            'changed_by' => null,
        ]);

        StatusHistory::create([
            'request_id' => $request->id,
            'status' => 'process',
            'note' => 'Dokumen sedang dipersiapkan oleh tim',
            'changed_by' => $admin?->id, 
        ]);

        Complaint::create([
            'ticket_number' => 'CMP-20260722-0001',
            'name' => 'Andi Cobra',
            'email' => 'andi@cobra.com',
            'phone' => '089876543210',
            'subject' => 'Permohonan informasi belum mendapatkan respon',
            'message' => 'Saya sudah mengajukan permohonan sejak 14 hari yang lalu namun belum ada tanggapan atau kepastian dari pihak PPID sekolah',
            'status' => 'pending',
        ]);
    }
}
