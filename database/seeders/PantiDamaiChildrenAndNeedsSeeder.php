<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PantiDamaiChildrenAndNeedsSeeder extends Seeder
{
    public function run()
    {
         $orphanageId = 6; 

        // ===================================================================
        // 1. DATA ANAK (35 anak) - TUNARUNGU
        // ===================================================================
        $children = [
            // [name, gender, birth_place, birth_date, education_level, status, in_house]
            ['ADRIANO SEAN ROTIKAN', 'LAKI-LAKI', 'Senduk', '2005-09-23', 'SMP', 'EKONOMI LEMAH', 1],
            ['ANDREAS ANUGERAH PAPUAS', 'LAKI-LAKI', 'Kalasey Dua', '2012-08-13', 'SD', 'EKONOMI LEMAH', 1],
            ['AHZALEA ELEANOR CHRISEL KARIMBA', 'PEREMPUAN', 'Tomohon', '2019-12-31', 'TK', 'EKONOMI LEMAH', 1],
            ['CRISTINIA SANDRANA BUISANG', 'PEREMPUAN', 'Manado', '2009-10-01', 'SMP', 'EKONOMI LEMAH', 1],
            ['DESWITA DELFIA PAREDA', 'PEREMPUAN', 'Manado', '2009-12-29', 'SMP', 'EKONOMI LEMAH', 1],
            ['DEVAN MEYVO SORONGAN', 'LAKI-LAKI', 'Talaitad', '2008-05-18', 'SMP', 'EKONOMI LEMAH', 1],
            ['EKKLESSYA LEONIKA MARARU', 'PEREMPUAN', 'Tarun', '2008-03-28', 'SMP', 'EKONOMI LEMAH', 1],
            ['ESIA QIANZY MAYLAFAISHA IMBANG', 'PEREMPUAN', 'Tomohon', '2014-07-16', 'SD', 'EKONOMI LEMAH', 1],
            ['EVITA JEANNETE ATANG', 'PEREMPUAN', 'Tomohon', '1997-06-20', 'SMA', 'EKONOMI LEMAH', 1],
            ['EVRANEVILE MIKHAEL MONINGKEY', 'LAKI-LAKI', 'Tomohon', '2008-08-10', 'SMP', 'EKONOMI LEMAH', 1],
            ['FLORENCIA MARIA DORINGIN', 'PEREMPUAN', 'Tatelu', '2014-08-21', 'SD', 'EKONOMI LEMAH', 1],
            ['GLADNESS ZEELBY JILLANE RANTUNG', 'PEREMPUAN', 'Tondano', '2016-07-23', 'TK', 'EKONOMI LEMAH', 1],
            ['GLEEN GERALD DYLAN RONDONUWU', 'LAKI-LAKI', 'Kawangkoan', '2008-04-17', 'SMP', 'EKONOMI LEMAH', 1],
            ['GWYNETH BITHIAH UMBOH', 'PEREMPUAN', 'Tomohon', '2015-12-05', 'SD', 'EKONOMI LEMAH', 1],
            ['JEHOVAEL DECKER LIEY', 'LAKI-LAKI', 'Manado', '2009-06-09', 'SMP', 'EKONOMI LEMAH', 1],
            ['JONATAN HIZKIA LIROGA', 'LAKI-LAKI', 'Tomohon', '2005-07-06', 'SMP', 'EKONOMI LEMAH', 1],
            ['JOVAN TAMBENGI', 'LAKI-LAKI', 'Lemoh', '2009-11-10', 'SMP', 'EKONOMI LEMAH', 1],
            ['KARUNIA TREPIA TIGAU', 'PEREMPUAN', 'Waleure', '2009-11-03', 'SMP', 'EKONOMI LEMAH', 1],
            ['KASIH SENGKEY', 'PEREMPUAN', 'Pontak', '2010-09-12', 'SD', 'EKONOMI LEMAH', 1],
            ['LARASHATI PUTRI MARGARITA MANTIRI', 'PEREMPUAN', 'Tomohon', '2019-12-31', 'TK', 'EKONOMI LEMAH', 1],
            ['LAQUINTA SKOLASTIKA VIRGINIA PIOH', 'PEREMPUAN', 'Tomohon', '2005-12-15', 'SMP', 'EKONOMI LEMAH', 1],
            ['MALVINO CHRISTIAN FABIO PANDELAKI', 'LAKI-LAKI', 'Tomohon', '2009-07-27', 'SMP', 'EKONOMI LEMAH', 1],
            ['MATTHEW NICK LAPIAN', 'LAKI-LAKI', 'Wiau Lapi', '2008-09-07', 'SMP', 'EKONOMI LEMAH', 1],
            ['PRAYSEL DANIEL ERLANGGA LEGI', 'LAKI-LAKI', 'Tondano', '2013-05-02', 'SD', 'EKONOMI LEMAH', 1],
            ['RIFKY REINO KOMALIG', 'LAKI-LAKI', 'Langowan', '2008-05-29', 'SMP', 'EKONOMI LEMAH', 1],
            ['ROSIANA FIRJINIA KOMALIG', 'PEREMPUAN', 'Langowan', '2006-07-10', 'SMP', 'EKONOMI LEMAH', 1],
            ['SAINTLY TOMBOKAN', 'LAKI-LAKI', 'Tondano', '2009-09-27', 'SMP', 'EKONOMI LEMAH', 1],
            ['SHEREN TATEPA', 'PEREMPUAN', 'Langowan', '2009-06-24', 'SMP', 'EKONOMI LEMAH', 1],
            ['THARIQ ILHAM JUMAD', 'LAKI-LAKI', 'Makassar', '2015-12-26', 'SD', 'EKONOMI LEMAH', 1],
            ['VAREL DARIUS GERYLOYD RORIMPANDEY', 'LAKI-LAKI', 'Bitung', '2010-03-23', 'SD', 'EKONOMI LEMAH', 1],
            ['ZHUCHEYA JHONATHAN DIVINE PANGKEREGO', 'LAKI-LAKI', 'Waleo', '2007-01-18', 'SMP', 'EKONOMI LEMAH', 1],
            ['JOEL GIVEN REMBANG', 'LAKI-LAKI', 'Manado', '2012-01-12', 'SD', 'EKONOMI LEMAH', 1],
            ['VEXANA DEANDRA PANGEMANAN', 'PEREMPUAN', 'Tomohon', '2018-09-15', 'TK', 'EKONOMI LEMAH', 1],
            ['NATHANIA ELYSIA BUAMBITUN', 'PEREMPUAN', 'Manado', '2018-06-13', 'TK', 'EKONOMI LEMAH', 1],
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

        // Update child_count
        $totalChildren = count($children);
        DB::table('orphanages')->where('id', $orphanageId)->update(['child_count' => $totalChildren]);

        // ===================================================================
        // 2. KEBUTUHAN PANTI (dari daftar)
        // ===================================================================
        $needs = [
            // MAKAN & MINUM
            ['Beras', 'Beras 25kg untuk konsumsi bulanan'],
            ['Minyak Goreng', 'Minyak goreng 5L untuk masak'],
            ['Ikan Laut/Daging', 'Ikan segar atau daging sapi/ayam'],
            ['Ikan Kaleng', 'Sarden, makarel kaleng'],
            ['Mie Instan', 'Indomie, Pop Mie'],
            ['Telur', 'Telur ayam 1 papan'],
            ['Gula', 'Gula pasir 5kg'],
            ['Susu', 'Susu UHT anak & balita'],
            ['Daun Teh', 'Teh celup atau daun'],
            ['Kopi', 'Kopi bubuk atau sachet'],
            ['Bihun', 'Bihun kering'],
            ['Makaroni', 'Makaroni spiral'],
            ['Biskuit/Snack', 'Biskuit Marie, wafer'],
            ['Sayuran', 'Wortel, kolplay, bayam'],
            ['Bumbu Dapur', 'Bawang, cabe, kecap, saus'],

            // MCK
            ['Sabun Mandi', 'Lifebuoy, Nuvo'],
            ['Shampoo', 'Sunsilk, Clear'],
            ['Pasta Gigi', 'Pepsodent, Close Up'],
            ['Sikat Gigi', 'Sikat gigi anak & dewasa'],
            ['Sabun Cuci Pakaian', 'Rinso, Daia'],
            ['Sabun Cuci Piring', 'Sunlight, Mama Lemon'],
            ['Pembalut', 'Charm, Laurier'],

            // DANA
            ['Dana Operasional', 'Untuk listrik, air, gaji, transport'],
            ['Dana Rehab Panti', 'Perbaikan atap, cat, lantai'],

            // ALAT KEBERSIHAN
            ['Sapu', 'Sapu plastik & lidi'],
            ['Tempat Sampah', 'Tong sampah 50L'],
            ['Skep', 'Skep plastik'],
            ['Gayung', 'Gayung mandi'],
            ['Ember', 'Ember besar 20L'],

            // ALAT DAPUR
            ['Alat Makan', 'Sendok, garpu, piring, gelas'],
            ['Peralatan Masak', 'Panci, wajan, spatula'],

            // LAIN-LAIN
            ['Bedak', 'Bedak bayi & dewasa'],
            ['Sandal', 'Sandal jepit anak & dewasa'],
            ['Pakaian Dalam', 'Celana dalam, kaos dalam'],
            ['Handuk', 'Handuk mandi & tangan'],
            ['Pakaian Layak Pakai', 'Baju, celana, daster'],

            // ELEKTRONIK
            ['TV', 'TV LED 32"'],
            ['Kulkas', 'Kulkas 2 pintu'],

            // PENGEMBANGAN BAKAT
            ['Mesin Jahit', 'Mesin jahit listrik'],
            ['Mesin Obras', 'Mesin obras benang 4'],
            ['Alat Salon', 'Gunting, catok, hair dryer'],
            ['Alat Pertukangan', 'Palu, obeng, gergaji'],

            // LAINNYA
            ['Seprei', 'Seprei single & double'],
            ['Taflak Meja', 'Taplak meja makan'],
            ['Gorden', 'Gorden jendela'],
            ['Kursi Plastik', 'Kursi makan plastik'],
            ['Bola Lampu', 'Lampu LED 9W, 12W'],
        ];

        foreach ($needs as $need) {
            DB::table('needs')->updateOrInsert(
                ['orphanage_id' => $orphanageId, 'item' => $need[0]],
                ['description' => $need[1], 'created_at' => now(), 'updated_at' => now()]
            );
        }

        $this->command->info("35 anak & " . count($needs) . " kebutuhan Panti Damai (ID: $orphanageId) berhasil!");
        $this->command->info("Total anak: $totalChildren | LAKI-LAKI: 18 | PEREMPUAN: 17");
    }
}