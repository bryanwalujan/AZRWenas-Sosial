<?php

namespace Database\Seeders;

use App\Models\Orphanage;
use App\Models\Child;
use Illuminate\Database\Seeder;

class DorkasChildrenSeeder extends Seeder
{
    public function run()
    {
        $dorkas = Orphanage::where('name', 'Panti Asuhan “DORKAS” Tondano')->first();

        if (!$dorkas) {
            $this->command->error('Panti Dorkas tidak ditemukan! Jalankan DorkasFullSeeder dulu.');
            return;
        }

        // Hapus data lama
        $dorkas->children()->delete();

        $children = [
            // === SEKOLAH DASAR (SD) ===
            ['KRISTIAN NAFTALIA MAHIMBORANG', 'LAKI-LAKI', 'KOLONGAN', '2017-11-25', 'SEKOLAH DASAR', 'YATIM PIATU'],
            ['YOSUA WENDA', 'LAKI-LAKI', 'JAYAPURA', '2017-06-01', 'SEKOLAH DASAR', 'YATIM'],
            ['ALFARO NABUASA', 'LAKI-LAKI', 'BITUNG', '2015-02-11', 'SEKOLAH DASAR', 'TERLANTAR'],
            ['IMMANUEL WONDA', 'LAKI-LAKI', 'JAYAPURA', '2015-01-28', 'SEKOLAH DASAR', 'TERLANTAR'],
            ['MELKION MIAGONI', 'LAKI-LAKI', 'TIMIKA', '2014-01-23', 'SEKOLAH DASAR', 'TERLANTAR'],
            ['KEZIA TIPAGAU', 'PEREMPUAN', 'MANADO', '2016-12-23', 'SEKOLAH DASAR', 'TERLANTAR'],

            // === SMP ===
            ['YASTIN MANASE RARAGA', 'LAKI-LAKI', 'TOBELO', '2010-07-13', 'SEKOLAH MENENGAH PERTAMA', 'PIATU'],
            ['ISRAEL SANGGAMALE', 'LAKI-LAKI', 'MANADO', '2013-04-19', 'SEKOLAH MENENGAH PERTAMA', 'TERLANTAR'],
            ['BILLY WAROUW', 'LAKI-LAKI', 'TONDANO', '2012-11-16', 'SEKOLAH MENENGAH PERTAMA', 'YATIM'],
            ['NAYSILA WAROUW', 'PEREMPUAN', 'TONDANO', '2010-11-15', 'SEKOLAH MENENGAH PERTAMA', 'YATIM'],
            ['JUNIFER K. ADINDA HARINDAH', 'PEREMPUAN', 'TERMAL', '2012-06-09', 'SEKOLAH MENENGAH PERTAMA', 'YATIM'],
            ['EVITA ELZIANA UNEPUTTY', 'PEREMPUAN', 'LIBAS', '2012-05-24', 'SEKOLAH MENENGAH PERTAMA', 'EKONOMI LEMAH'],
            ['QUENSHY LETISYA DALUWU', 'PEREMPUAN', 'BALEHUMARA', '2011-12-30', 'SEKOLAH MENENGAH PERTAMA', 'EKONOMI LEMAH'],
            ['BLANCINA SONDEGAU', 'PEREMPUAN', 'TIMIKA', '2012-08-12', 'SEKOLAH MENENGAH PERTAMA', 'EKONOMI LEMAH'],
            ['NATALIA KOGOYA', 'PEREMPUAN', 'JAYAPURA', '2009-12-16', 'SEKOLAH MENENGAH PERTAMA', 'YATIM'],

            // === SMA / SMK ===
            ['RISKI Y. MAKAHINDA', 'LAKI-LAKI', 'LELEOTO', '2007-09-09', 'SEKOLAH MENENGAH ATAS', 'EKONOMI LEMAH'],
            ['DEVRI A. LOMBO', 'LAKI-LAKI', 'LIBAS', '2009-12-25', 'SEKOLAH MENENGAH ATAS', 'EKONOMI LEMAH'],
            ['MELSEREK MIAGONI', 'LAKI-LAKI', 'TIMIKA', '2008-05-06', 'SEKOLAH MENENGAH ATAS', 'TERLANTAR'],
            ['MIRACLE HARCIL SASELAH', 'LAKI-LAKI', 'LIBAS', '2008-06-09', 'SEKOLAH MENENGAH KEJURUAN', 'EKONOMI LEMAH'],
            ['JEINWAREL J. KARUNDENG', 'LAKI-LAKI', 'LIBAS', '2009-07-09', 'SEKOLAH MENENGAH KEJURUAN', 'EKONOMI LEMAH'],
            ['MARSIANDA ALELO', 'PEREMPUAN', 'PANGI', '2008-03-25', 'SEKOLAH MENENGAH ATAS', 'TERLANTAR'],
            ['AFRILIANI TUTER', 'PEREMPUAN', 'LIHUNU', '2009-04-20', 'SEKOLAH MENENGAH KEJURUAN', 'EKONOMI LEMAH'],

            // === MAHASISWA ===
            ['APRILLIA ELLEN MANAHAMPI', 'PEREMPUAN', 'LIBAS', '2004-04-14', 'MAHASISWA', 'YATIM'],
            ['YOVAN EMAN PUSUNG', 'LAKI-LAKI', 'LIBAS', '2006-05-06', 'MAHASISWA', 'EKONOMI LEMAH'],
            ['APRILEA K. BUAGHO', 'PEREMPUAN', 'LIHUNU', '2007-04-20', 'SEKOLAH MENENGAH KEJURUAN', 'PIATU'],
        ];

        foreach ($children as $child) {
            Child::create([
                'orphanage_id' => $dorkas->id,
                'name' => strtoupper($child[0]),
                'gender' => $child[1],
                'birth_place' => strtoupper($child[2]),
                'birth_date' => $child[3],
                'education_level' => $child[4],
                'status' => $child[5],
                'in_house' => true,
            ]);
        }

        $this->command->info('Data anak Dorkas berhasil dimasukkan: ' . count($children) . ' anak.');
    }
}