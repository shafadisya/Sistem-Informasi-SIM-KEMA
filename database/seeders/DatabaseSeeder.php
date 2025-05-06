<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Divisi;
use App\Models\Dokumentasi;
use App\Models\Pelaporan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
{
    // Membuat admin jika belum ada
    \App\Models\User::firstOrCreate(
        ['email' => 'admin@example.com'],
        [
            'name' => 'Admin User',
            'password' => Hash::make('admin12345678'),
            'role' => 'admin',
        ]
    );

    // Membuat user jika belum ada
    \App\Models\User::firstOrCreate(
        ['email' => 'mahasiswa@example.com'],
        [
            'name' => 'Regular User',
            'password' => Hash::make('user12345678'),
            'role' => 'user',
        ]
    );



        // Seed Kegiatan
        $infest = Kegiatan::create([
            'nama' => 'INFEST',
            'deskripsi' => 'Informatics Festival adalah acara tahunan yang diselenggarakan oleh Program Studi Informatika.',
            'tanggal_mulai' => '2023-07-01',
            'tanggal_selesai' => '2023-07-30',
            'status' => 'aktif',
        ]);

        $point = Kegiatan::create([
            'nama' => 'POINT',
            'deskripsi' => 'Programming of Informatics Tournament adalah kompetisi pemrograman bagi mahasiswa informatika.',
            'tanggal_mulai' => '2023-08-15',
            'tanggal_selesai' => '2023-08-20',
            'status' => 'aktif',
        ]);

        $detik = Kegiatan::create([
            'nama' => 'DETIK',
            'deskripsi' => 'Design Technology and Informatics Competition adalah lomba desain dan teknologi.',
            'tanggal_mulai' => '2023-09-10',
            'tanggal_selesai' => '2023-09-17',
            'status' => 'coming_soon',
        ]);

        $mubes = Kegiatan::create([
            'nama' => 'MUBES',
            'deskripsi' => 'Musyawarah Besar adalah forum tertinggi untuk mengambil keputusan strategis.',
            'tanggal_mulai' => '2023-10-05',
            'tanggal_selesai' => '2023-10-06',
            'status' => 'coming_soon',
        ]);

        $pakarmarum = Kegiatan::create([
            'nama' => 'PAKARMARUM',
            'deskripsi' => 'Pemilihan Ketua dan Wakil Ketua HIMAIF merupakan ajang pemilihan pemimpin organisasi.',
            'tanggal_mulai' => '2023-11-01',
            'tanggal_selesai' => '2023-11-02',
            'status' => 'coming_soon',
        ]);

        $monev = Kegiatan::create([
            'nama' => 'MONEV',
            'deskripsi' => 'Monitoring dan Evaluasi untuk menilai kinerja program kerja organisasi.',
            'tanggal_mulai' => '2023-12-10',
            'tanggal_selesai' => '2023-12-11',
            'status' => 'coming_soon',
        ]);

        // Seed Divisi untuk INFEST
        $divisiInfest = [
            ['nama' => 'Ketua Pelaksana', 'deskripsi' => 'Memimpin dan mengkoordinasikan seluruh rangkaian acara', 'kuota' => 1],
            ['nama' => 'Sekretaris', 'deskripsi' => 'Bertanggung jawab atas administrasi dan dokumentasi', 'kuota' => 2],
            ['nama' => 'Bendahara', 'deskripsi' => 'Mengelola keuangan acara', 'kuota' => 2],
            ['nama' => 'Divisi Acara', 'deskripsi' => 'Merencanakan dan menjalankan rangkaian acara', 'kuota' => 8],
            ['nama' => 'Divisi Humas', 'deskripsi' => 'Menjalin hubungan dengan pihak internal dan eksternal', 'kuota' => 5],
            ['nama' => 'Divisi Publikasi', 'deskripsi' => 'Mempromosikan acara melalui berbagai media', 'kuota' => 5],
            ['nama' => 'Divisi Perlengkapan', 'deskripsi' => 'Menyiapkan sarana dan prasarana acara', 'kuota' => 6],
            ['nama' => 'Divisi Konsumsi', 'deskripsi' => 'Menyediakan konsumsi selama acara', 'kuota' => 4],
            ['nama' => 'Divisi Keamanan', 'deskripsi' => 'Menjaga keamanan dan ketertiban acara', 'kuota' => 3],
            ['nama' => 'Divisi Dokumentasi', 'deskripsi' => 'Mendokumentasikan seluruh rangkaian acara', 'kuota' => 4],
        ];

        foreach ($divisiInfest as $divisi) {
            Divisi::create([
                'nama' => $divisi['nama'],
                'kegiatan_id' => $infest->id,
                'deskripsi' => $divisi['deskripsi'],
                'kuota' => $divisi['kuota'],
            ]);
        }

        // Seed Divisi untuk POINT
        $divisiPoint = [
            ['nama' => 'Ketua Pelaksana', 'deskripsi' => 'Memimpin dan mengkoordinasikan lomba', 'kuota' => 1],
            ['nama' => 'Wakil Ketua', 'deskripsi' => 'Membantu ketua dalam koordinasi acara', 'kuota' => 1],
            ['nama' => 'Sekretaris', 'deskripsi' => 'Mengelola administrasi dan dokumentasi', 'kuota' => 2],
            ['nama' => 'Bendahara', 'deskripsi' => 'Mengelola keuangan lomba', 'kuota' => 2],
            ['nama' => 'Divisi Lomba', 'deskripsi' => 'Menyiapkan soal dan penilaian lomba', 'kuota' => 6],
            ['nama' => 'Divisi Acara', 'deskripsi' => 'Mengatur jalannya acara', 'kuota' => 4],
            ['nama' => 'Divisi Humas', 'deskripsi' => 'Menjalin hubungan dengan peserta dan sponsor', 'kuota' => 3],
            ['nama' => 'Divisi Publikasi', 'deskripsi' => 'Mempromosikan lomba', 'kuota' => 3],
            ['nama' => 'Divisi IT', 'deskripsi' => 'Menyiapkan sistem untuk lomba', 'kuota' => 4],
        ];

        foreach ($divisiPoint as $divisi) {
            Divisi::create([
                'nama' => $divisi['nama'],
                'kegiatan_id' => $point->id,
                'deskripsi' => $divisi['deskripsi'],
                'kuota' => $divisi['kuota'],
            ]);
        }

        // Seed Dokumentasi
        Dokumentasi::create([
            'kegiatan_id' => $infest->id,
            'judul' => 'INFEST 2022',
            'deskripsi' => 'Dokumentasi INFEST tahun lalu',
            'link' => 'https://drive.google.com/infest2022',
            'thumbnail' => 'infest_thumbnail.jpg',
            'tanggal' => '2022-07-30',
        ]);

        Dokumentasi::create([
            'kegiatan_id' => $point->id,
            'judul' => 'POINT 2022',
            'deskripsi' => 'Dokumentasi POINT tahun lalu',
            'link' => 'https://drive.google.com/point2022',
            'thumbnail' => 'point_thumbnail.jpg',
            'tanggal' => '2022-08-20',
        ]);

        // Seed Pelaporan
        Pelaporan::create([
            'kegiatan_id' => $infest->id,
            'judul' => 'Grup WhatsApp Panitia INFEST',
            'deskripsi' => 'Grup koordinasi untuk panitia INFEST',
            'link_grup' => 'https://chat.whatsapp.com/infest2023',
            'link_laporan' => 'https://drive.google.com/laporan_infest2023',
        ]);

        Pelaporan::create([
            'kegiatan_id' => $point->id,
            'judul' => 'Grup WhatsApp Panitia POINT',
            'deskripsi' => 'Grup koordinasi untuk panitia POINT',
            'link_grup' => 'https://chat.whatsapp.com/point2023',
            'link_laporan' => 'https://drive.google.com/laporan_point2023',
        ]);
    }
}