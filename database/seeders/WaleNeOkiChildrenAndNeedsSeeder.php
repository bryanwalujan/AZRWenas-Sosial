<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaleNeOkiChildrenAndNeedsSeeder extends Seeder
{
    public function run()
    {
        $orphanageId = 4; // ID Panti Wale Ne Oki

        // ===================================================================
        // 1. DATA ANAK (dari dokumen "DAFTAR NAMA ANAK-ANAK PANTI ASUHAN WALE NE OKI 2025")
        // ===================================================================
        $children = [
            // [name, gender, birth_place, birth_date, education_level, status, in_house]
            ['Nicole Ashley', 'LAKI-LAKI', 'Wori', '2022-10-18', 'Blm sekolah', 'YATIM', 1],
            ['Febio Nathaniel Rengkung', 'LAKI-LAKI', 'Lolah', '2022-12-25', 'Blm sekolah', 'YATIM', 1],
            ['Fabio Nathanael Rengkung', 'LAKI-LAKI', 'Lolah', '2022-12-25', 'Blm sekolah', 'YATIM', 1],
            ['Milania Leyora Sahin', 'PEREMPUAN', 'Tondano', '2023-07-30', 'Blm sekolah', 'PIATU', 1],
            ['Christofel Datu', 'LAKI-LAKI', 'Tomohon', '2022-11-05', 'Belum sekolah', 'EKONOMI LEMAH', 1],
            ['Christian Datu', 'LAKI-LAKI', 'Tomohon', '2022-11-05', 'Belum Sekolah', 'EKONOMI LEMAH', 1],
            ['Kingdavio Patilima Ponomban', 'LAKI-LAKI', 'Silian', '2019-04-06', 'TK/Paud', 'EKONOMI LEMAH', 1],
            ['Jovan Rumengan', 'LAKI-LAKI', 'Tomohon', '2021-06-05', 'Belum sekolah', 'EKONOMI LEMAH', 1],
            ['Sanara Rampengan', 'PEREMPUAN', 'Tomohon', '2022-02-15', 'TK/Paud', 'EKONOMI LEMAH', 1],
            ['Chintice Feiffel Meira Komenaung', 'PEREMPUAN', 'Airmadidi', '2005-09-09', 'Belum Seklah', 'EKONOMI LEMAH', 1], // tahun 2025? typo → 2005
            ['Mikylo Sinala', 'LAKI-LAKI', 'Tomohon', '2023-09-10', 'Blm sekolah', 'YATIM', 1],
            ['Daviena Faith Tompodung', 'PEREMPUAN', 'Manado', '2024-08-04', 'Blm sekolah', 'EKONOMI LEMAH', 1],
            ['Febriana Felisian Kowaas', 'PEREMPUAN', 'Motongkad', '2025-02-18', 'Blm Sekolah', 'YATIM', 1],
            ['Alfredo Petra Tiotilus Kowaas', 'LAKI-LAKI', 'Basaan Dua', '2020-08-13', 'TK/Paud', 'EKONOMI LEMAH', 1],
            ['Kartika Putry krismes Kowaan', 'PEREMPUAN', 'Mitra', '2022-12-24', 'Blm Sekolah', 'EKONOMI LEMAH', 1],
            ['Samuel Kristo Kowaas', 'LAKI-LAKI', 'Mitra', '2024-09-02', 'Blm Sekolah', 'EKONOMI LEMAH', 1],
            ['Deisi Natalia Rolos', 'PEREMPUAN', 'Mundung', '2019-12-26', 'Blm Sekolah', 'EKONOMI LEMAH', 1],
            ['George A Naung', 'LAKI-LAKI', 'Tondano', '2023-04-23', 'TK/Paud', 'EKONOMI LEMAH', 1],
            ['Mark Fredel Tumbel', 'LAKI-LAKI', 'Manado', '2020-03-13', 'Blm Sekolah', 'YATIM', 1],
            ['Mbumbapane Maiseni', 'PEREMPUAN', 'Hitadipa', '2020-10-03', 'Blm Sekolah', 'EKONOMI LEMAH', 1],
            ['Elkana Daffiel Taroreh', 'LAKI-LAKI', 'Nanasi', '2022-04-27', 'Blm Sekolah', 'EKONOMI LEMAH', 1],
            ['Achava Manuela Zanna', 'PEREMPUAN', 'Bogor', '2022-05-10', 'Blm Sekolah', 'EKONOMI LEMAH', 1],
            ['Adeline Calista Aprilia', 'PEREMPUAN', 'Bogor', '2023-04-13', 'Blm Sekolah', 'EKONOMI LEMAH', 1],
            ['Edrea Faith Paat', 'PEREMPUAN', 'Tomohon', '2024-11-25', 'Blm Sekolah', 'EKONOMI LEMAH', 1],
            // Anak tanpa nama (No. 25)
            [null, null, 'Nanasi', null, 'Blm Sekolah', 'YATIM', 1],
        ];

        foreach ($children as $child) {
            DB::table('children')->updateOrInsert(
                [
                    'orphanage_id' => $orphanageId,
                    'name' => $child[0],
                    'birth_date' => $child[3],
                ],
                [
                    'gender' => $child[1],
                    'birth_place' => $child[2],
                    'education_level' => $child[4],
                    'status' => $child[5],
                    'in_house' => $child[6],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // Update child_count di orphanages
        $totalChildren = DB::table('children')->where('orphanage_id', $orphanageId)->count();
        DB::table('orphanages')
            ->where('id', $orphanageId)
            ->update(['child_count' => $totalChildren]);

        // ===================================================================
        // 2. KEBUTUHAN PANTI (dari daftar kebutuhan)
        // ===================================================================
        $needs = [
            ['Pempers', 'Pempers bayi ukuran M & L untuk anak balita'],
            ['Susu SGM/Dancow 1+', 'Susu formula untuk anak usia 1-3 tahun'],
            ['Sembako', 'Beras, minyak goreng, gula, telur, mie instan'],
            ['Barito', 'Sabun colek, sabun cuci piring, pewangi pakaian'],
            ['Daging Ayam & Nugget', 'Daging ayam potong, nugget ayam untuk menu harian'],
            ['Buah-buahan', 'Pisang, apel, jeruk, semangka untuk gizi anak'],
        ];

        foreach ($needs as $need) {
            DB::table('needs')->updateOrInsert(
                [
                    'orphanage_id' => $orphanageId,
                    'item' => $need[0],
                ],
                [
                    'description' => $need[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $this->command->info("Data anak dan kebutuhan Panti Wale Ne Oki (ID: $orphanageId) berhasil dimasukkan!");
        $this->command->info("Total anak: $totalChildren | Total kebutuhan: " . count($needs));
    }
}