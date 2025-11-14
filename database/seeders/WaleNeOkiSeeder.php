<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WaleNeOkiSeeder extends Seeder
{
    public function run()
    {
        // 1. MASUKKAN DATA KE TABEL orphanages
        $panti = DB::table('orphanages')->updateOrInsert(
            ['name' => 'Panti Asuhan Wale Ne Oki Bethesda GMIM Tomohon'],
            [
                'location' => 'Jl. Nazaret 436, Lingk. 8, Kel. Matani Tiga, Kec. Tomohon Tengah, Kota Tomohon, Sulawesi Utara 95441',
                'child_count' => 0, // akan diupdate dari anak
                'description' => "Panti Asuhan Wale Ne Oki adalah satu lembaga pelayanan di bawah naungan Gereja Masehi Injili di Minahasa / Yayasan Ds. A.Z.R Wenas di bidang Usaha Kesejahteraan Sosial (UKS) khususnya menangani balita (usia 0-6 tahun) yang mengalami masalah sosial. Didirikan sejak 7 Februari 1935.",
                'photo' => 'orphanages/wale-ne-oki.jpg', // akan diupload manual
                'facilities' => json_encode([
                    'POSYANDU Khusus Balita',
                    'Pelayanan Imunisasi',
                    'Kerjasama RS Bethesda (gratis kecuali dokter spesialis)',
                    'Ruang Pengasuhan',
                    'Dapur & Wash Area',
                    'Ruang Ketrampilan',
                    'Ruang Kesehatan'
                ]),
                'categories' => json_encode(['Balita', 'Yatim', 'Piatu', 'Yatim Piatu', 'Terlantar']),
                'founded_year' => '1935',
                'address' => 'Jl. Nazaret 436, Lingk. 8, Kel. Matani Tiga, Kec. Tomohon Tengah, Kota Tomohon, Sulawesi Utara 95441',
                'phone' => '(0431) 352436',
                'email' => null, // tidak ada di dokumen
                'legal_documents' => json_encode([
                    'NPWP' => '02.283.773.6-821.000',
                    'Izin Operasional Depsos' => 'Ada',
                    'Mitra JKLPK Region Sulawesi' => 'Sekretaris'
                ]),
                'vision' => 'Membangun Generasi Baru Sehat Jasmani, Rohani Dan Sosial',
                'mission' => 'Sebagai Amanat Yesus Bagi Orang Percaya Melayani Dengan Kasih',
                'target_service' => json_encode([
                    'Anak usia 0-6 tahun (TK)',
                    'Anak balita luar panti dengan masalah sosial'
                ]),
                'capacity' => 40, // estimasi
                'in_house_male' => 0,
                'in_house_female' => 0,
                'external_male' => 0,
                'external_female' => 0,
                'foundation_name' => 'Yayasan GMIM Ds. A.Z.R Wenas – Unit Sosial',
                'history' => "Didirikan 7 Februari 1935 oleh Serikat Kaum Ibu GMIM. Awalnya Rumah Kanak-kanak Piatu (RKP) di RS Bethesda. Pindah ke Kaaten (1970), lalu ke kompleks Panti Nazaret (1977) hingga sekarang.",
                'leader_name' => 'Pdt. Angels Rembet Waluyan, M.Teol',
                'leader_phone' => '082396071921',
                'secretary_name' => 'Anita Merin',
                'secretary_phone' => '081340755908',
                'treasurer_name' => 'Julience Kontra',
                'treasurer_phone' => '081356346375',
                'land_area' => null,
                'land_status' => 'Milik Gereja',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Ambil ID panti yang baru saja dibuat
        $pantiId = DB::table('orphanages')
            ->where('name', 'Panti Asuhan Wale Ne Oki Bethesda GMIM Tomohon')
            ->value('id');

        // 2. MASUKKAN KONTAK KE orphanages_contacts
        $contacts = [
            [
                'contact_name' => 'Pdt. Angels Rembet Waluyan, M.Teol',
                'phone' => '082396071921',
                'role' => 'Kepala Panti',
            ],
            [
                'contact_name' => 'Anita Merin',
                'phone' => '081340755908',
                'role' => 'Sekretaris',
            ],
            [
                'contact_name' => 'Julience Kontra',
                'phone' => '081356346375',
                'role' => 'Bendahara',
            ],
            [
                'contact_name' => 'Pdt. Magritje Kalalo, STh',
                'phone' => null,
                'role' => 'Bagian Kerohanian',
            ],
            [
                'contact_name' => 'Nova Kontra',
                'phone' => null,
                'role' => 'Bagian Pengasuhan',
            ],
            [
                'contact_name' => 'Nova Sual',
                'phone' => null,
                'role' => 'Bagian Perlengkapan Pakaian',
            ],
            [
                'contact_name' => 'Agustin Pitoy',
                'phone' => null,
                'role' => 'Bagian Dapur, Wash & Kebersihan',
            ],
            [
                'contact_name' => 'Vera Ambouw',
                'phone' => null,
                'role' => 'Bagian Ketrampilan',
            ],
            [
                'contact_name' => 'Angelin Palit',
                'phone' => null,
                'role' => 'Bagian Kesehatan',
            ],
            [
                'contact_name' => 'Wandy Rembet',
                'phone' => null,
                'role' => 'Bagian Umum & Administrasi',
            ],
        ];

        foreach ($contacts as $contact) {
            DB::table('orphanage_contacts')->updateOrInsert(
                [
                    'orphanage_id' => $pantiId,
                    'contact_name' => $contact['contact_name'],
                    'role' => $contact['role'],
                ],
                [
                    'phone' => $contact['phone'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // 3. SIMPAN FOTO (manual upload setelah ini)
        $this->command->info('Panti Wale Ne Oki berhasil ditambahkan!');
        $this->command->warn('Upload foto ke: storage/app/public/orphanages/wale-ne-oki.jpg');
    }
}