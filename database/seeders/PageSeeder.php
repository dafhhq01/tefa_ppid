<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'profil-ppid'],
            [
                'type' => 'profil_ppid',
                'title' => 'Profil PPID',
                'subtitle' => 'Pejabat Pengelola Informasi dan Dokumentasi Sekolah',
                'content' => '<p>PPID merupakan...</p>',
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'profil-sekolah'],
            [
                'type' => 'profil_sekolah',
                'title' => 'Profil Sekolah',
                'subtitle' => 'SMKN 1 Katapang',
                'content' => '<p>SMKN 1 Katapang merupakan sekolah unggulan...</p>',
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'visi-misi-ppid'],
            [
                'type' => 'visi_misi_ppid',
                'title' => 'Visi Misi PPID',
                'subtitle' => 'Visi Misi Pembentukan Pejabat Pengelola Informasi',
                'content' => '<p>Visi foya, Misi foya. Visi Misi foya-foya</p>',
            ]
        );

        Page::updateOrCreate(
            ['slug' => 'tugas-fungsi-ppid'],
            [
                'type' => 'tugas_fungsi_ppid',
                'title' => 'Tugas Fungsi PPID',
                'subtitle' => 'Tugas dan Fungsi Pejabat Pengelola Informasi',
                'content' => '<p>Isi sendiri weh ah, akunya males >v< </p>',
            ]
        );
    }
}
