<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NazaretTomohonSeeder extends Seeder
{
    public function run()
    {
        // 1. MASUKKAN DATA KE TABEL orphanages
        $panti = DB::table('orphanages')->updateOrInsert(
            ['name' => 'Panti Asuhan Nazaret Tomohon'],
            [
                'location' => 'Tomohon, Sulawesi Utara',
                'child_count' => 0, // akan diupdate dari anak
                'description' => 'Panti Asuhan Nazaret Tomohon adalah lembaga pelayanan di bawah Yayasan GMIM Ds. A.Z.R Wenas Unit Sosial yang menampung anak-anak yatim, piatu, dan terlantar dengan pendekatan Kristen.',
                'photo' => 'orphanages/nazaret-tomohon.jpg', // upload manual
                'facilities' => json_encode([
                    'Asrama Putra & Putri',
                    'Ruang Belajar',
                    'Dapur Umum',
                    'Ruang Ibadah',
                    'Klinik Kesehatan Dasar'
                ]),
                'categories' => json_encode(['Yatim', 'Piatu', 'Yatim Piatu', 'Terlantar', 'Kristen']),
                'founded_year' => '1977', // dari sejarah Wale Ne Oki (kompleks Nazaret)
                'address' => 'Jl. Nazaret, Kel. Matani III, Kec. Tomohon Tengah, Kota Tomohon, Sulawesi Utara',
                'phone' => null,
                'email' => null,
                'legal_documents' => json_encode([
                    'Badan Hukum' => 'Yayasan GMIM Ds. A.Z.R Wenas',
                    'Izin Operasional' => 'Ada'
                ]),
                'vision' => 'Membangun Generasi Kristen yang Mandiri, Beriman, dan Bertanggung Jawab',
                'mission' => 'Melayani Anak Yatim Piatu dengan Kasih Kristus',
                'target_service' => json_encode([
                    'Anak usia SD-SMA',
                    'Yatim, Piatu, Terlantar',
                    'Pendampingan Rohani & Pendidikan'
                ]),
                'capacity' => 50,
                'in_house_male' => 0,
                'in_house_female' => 0,
                'external_male' => 0,
                'external_female' => 0,
                'foundation_name' => 'Yayasan GMIM Ds. A.Z.R Wenas – Unit Sosial',
                'history' => 'Panti Asuhan Nazaret Tomohon didirikan sebagai bagian dari kompleks pelayanan sosial GMIM. Sejak 1977, menjadi lokasi utama pelayanan anak di Tomohon.',
                'leader_name' => 'Pdt. Santje Anita Tombeg, M.Th',
                'leader_phone' => null,
                'secretary_name' => 'Kristi Esandra Tangel, M.Th',
                'secretary_phone' => null,
                'treasurer_name' => 'Grace Aror, SE',
                'treasurer_phone' => null,
                'land_area' => null,
                'land_status' => 'Milik Gereja',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Ambil ID panti
        $pantiId = DB::table('orphanages')
            ->where('name', 'Panti Asuhan Nazaret Tomohon')
            ->value('id');

        // 2. MASUKKAN KONTAK (9 orang)
        $contacts = [
            ['Pdt. Santje Anita Tombeg, M.Th', null, 'Kepala Panti / Pemimpin'],
            ['Grace Aror, SE', null, 'Bendahara'],
            ['Kristi Esandra Tangel, M.Th', null, 'Sekretaris'],
            ['Rico Alow', null, 'Staf Administrasi'],
            ['Marlin Kilapong', null, 'Pengasuh'],
            ['Josua Manjari, S.Tr.Par', null, 'Pengasuh'],
            ['Agustin Tombeg', null, 'Pengasuh'],
            ['Nova Karwur', null, 'Pengasuh'],
            ['Santje Runtukahu, P.Pd', null, 'Juru Masak'],
        ];

        foreach ($contacts as $contact) {
            DB::table('orphanage_contacts')->updateOrInsert(
                [
                    'orphanage_id' => $pantiId,
                    'contact_name' => $contact[0],
                    'role' => $contact[2],
                ],
                [
                    'phone' => $contact[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $this->command->info("Panti Asuhan Nazaret Tomohon (ID: $pantiId) berhasil ditambahkan!");
        $this->command->warn("Upload foto ke: storage/app/public/orphanages/nazaret-tomohon.jpg");
    }
}