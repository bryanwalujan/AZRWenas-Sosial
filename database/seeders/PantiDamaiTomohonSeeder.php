<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PantiDamaiTomohonSeeder extends Seeder
{
    public function run()
    {
        // 1. MASUKKAN DATA KE TABEL orphanages
        $panti = DB::table('orphanages')->updateOrInsert(
            ['name' => 'Panti Penyantunan Penyandang Disable Tunarungu GMIM “Damai” Tomohon'],
            [
                'location' => 'Tomohon, Sulawesi Utara',
                'child_count' => 35,
                'description' => 'Panti khusus untuk anak-anak tunarungu (disabilitas pendengaran) di bawah Yayasan GMIM Ds. A.Z.R Wenas. Memberikan pendidikan, rehabilitasi, dan pendampingan rohani.',
                'photo' => 'orphanages/panti-damai-tomohon.jpg', // upload manual
                'facilities' => json_encode([
                    'Asrama Putra & Putri',
                    'Ruang Terapi Bahasa Isyarat',
                    'Ruang Belajar Khusus',
                    'Dapur Umum',
                    'Ruang Ibadah',
                    'Lapangan Olahraga'
                ]),
                'categories' => json_encode(['Disabilitas Tunarungu', 'Yatim', 'Piatu', 'Terlantar', 'Kristen']),
                'founded_year' => '1994',
                'address' => 'Jl. Raya Tomohon-Manado, Kel. Talete II, Kec. Tomohon Tengah, Kota Tomohon, Sulawesi Utara',
                'phone' => '0431-351073',
                'email' => 'pantitunarungugmimdamaitomohon@gmail.com',
                'legal_documents' => json_encode([
                    'Akta Notaris' => 'NO 10 tgl 19 Oktober 2017',
                    'SK Kemenkumham' => 'AHU-0019592.AH.01.12.TAHUN 2017',
                    'SK Dinsos Prov' => '400/126/PSKMKP-LKS/ORSOS/XI/2022 (24 Nov 2022 – 24 Nov 2025)',
                    'Tanda Daftar Kota' => '02/DINSOS/REHSOS/IV/2025',
                    'Ijin Operasional' => '05/DPMPTSP-KT/VI/2025',
                    'NPWP' => '83.170.097.6-821.000',
                    'Rekening' => 'BANK SULUT - 009 0211 0084 934 a.n PANTI TUNA RUNGU DAMAI TOMOHON'
                ]),
                'vision' => 'Menjadi lembaga pelayanan yang profesional dalam mendidik dan memberdayakan anak tunarungu menjadi mandiri dan beriman.',
                'mission' => 'Memberikan pendidikan, rehabilitasi, dan pendampingan rohani bagi anak tunarungu dengan pendekatan kasih Kristus.',
                'target_service' => json_encode([
                    'Anak usia 6-18 tahun',
                    'Disabilitas tunarungu',
                    'Yatim, piatu, terlantar',
                    'Pendidikan khusus + bahasa isyarat'
                ]),
                'capacity' => 40,
                'in_house_male' => 18,
                'in_house_female' => 17,
                'external_male' => 0,
                'external_female' => 0,
                'foundation_name' => 'Yayasan Ds. A.Z.R Wenas',
                'history' => 'Didirikan pada 7 Mei 1994 sebagai respons panggilan pelayanan GMIM terhadap anak-anak tunarungu. Terakreditasi C sejak 2023.',
                'leader_name' => 'Pdt. Welby A. Pandey, S.Pd.K',
                'leader_phone' => '0821 9263 9383',
                'secretary_name' => 'Eugeine F.I Rumayar, S.Psi',
                'secretary_phone' => '0852 5692 6009',
                'treasurer_name' => 'Gebby Tualangi',
                'treasurer_phone' => '0822 5930 6842',
                'land_area' => null,
                'land_status' => 'Milik Gereja',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Ambil ID panti
        $pantiId = DB::table('orphanages')
            ->where('name', 'like', '%Damai%')
            ->value('id');

        // 2. MASUKKAN KONTAK (5 orang)
        $contacts = [
            ['Pdt. Welby A. Pandey, S.Pd.K', '082192639383', 'Kepala Panti'],
            ['Eugeine F.I Rumayar, S.Psi', '085256926009', 'Sekretaris'],
            ['Gebby Tualangi', '082259306842', 'Bendahara'],
            ['Olly Poluan', '085756937830', 'Pengasuh'],
            ['Imelda F. Rumayar', '085256568562', 'Pengasuh'],
        ];

        foreach ($contacts as $contact) {
            DB::table('orphanage_contacts')->updateOrInsert(
                [
                    'orphanage_id' => $pantiId,
                    'contact_name' => $contact[0],
                    'phone' => $contact[1],
                ],
                [
                    'role' => $contact[2],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $this->command->info("Panti Damai Tomohon (ID: $pantiId) berhasil ditambahkan!");
        $this->command->info("Total anak: 35 | Total pengurus: 5");
        $this->command->warn("Upload foto ke: storage/app/public/orphanages/panti-damai-tomohon.jpg");
    }
}