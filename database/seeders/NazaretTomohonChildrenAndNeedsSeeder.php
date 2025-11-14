<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NazaretTomohonChildrenAndNeedsSeeder extends Seeder
{
    public function run()
    {
        $orphanageId = 5; // ID Panti Nazaret Tomohon

        // ===================================================================
        // 1. DATA ANAK (63 anak) dari dokumen
        // ===================================================================
        $children = [
            // [name, gender, birth_place, birth_date, education_level, status, in_house]
            ['CARMEN LANTU', 'PEREMPUAN', 'Tuutu', '2004-01-21', 'KULIAH', 'YATIM PIATU', 1],
            ['YULIANCE PIGOME', 'PEREMPUAN', 'Timika', '2005-06-03', 'KULIAH', 'YATIM', 1],
            ['PUTRI PICILIA KOYONG', 'PEREMPUAN', 'Tombatu', '2004-07-28', 'KULIAH', 'YATIM', 1],
            ['GREVIANI NANCI PAPARANG', 'PEREMPUAN', 'Tandu Rusa', '2003-10-18', 'KULIAH', 'YATIM', 1],
            ['LINKAN MARGARETHA WUWUUNGAN', 'PEREMPUAN', 'Jakarta', '2005-03-05', 'KULIAH', 'EKONOMI LEMAH', 1],
            ['NAFTALINI ZEFANYA KARUNIA SIASITA SINGKO', 'PEREMPUAN', 'Tondano', '2006-09-01', 'KULIAH', 'EKONOMI LEMAH', 1],
            ['LINDA STEVI MOKOIMBING', 'PEREMPUAN', 'Silian', '2007-09-22', 'KULIAH', 'YATIM PIATU', 1],
            ['RACHEL ANJELINA PUNGUS', 'PEREMPUAN', 'Tomohon', '2005-02-21', 'SMK', 'EKONOMI LEMAH', 1],
            ['KENNY KEVIN DAMONGILALA', 'LAKI-LAKI', 'Manado', '2006-07-22', 'SMK', 'BROKEN HOME', 1],
            ['ALEXANDER THEO', 'LAKI-LAKI', 'Tangerang', '2008-02-19', 'SMK', 'BROKEN HOME', 1],
            ['AVRILY RUT TAKUMANSANG', 'PEREMPUAN', 'Libas', '2007-04-01', 'SMK', 'BROKEN HOME', 1],
            ['FISILIA DELHI MANGALO', 'PEREMPUAN', 'Likupang', '2007-08-21', 'SMK', 'BROKEN HOME', 1],
            ['HAYKAL KANDOU', 'LAKI-LAKI', 'Tonsawang', '2008-11-04', 'SMK', 'YATIM', 1],
            ['LELINCE MAISENI', 'PEREMPUAN', 'Hitadipa', '2007-09-30', 'SMK', 'EKONOMI LEMAH', 1],
            ['ARIANTI ANEKE MANONGKAHE', 'PEREMPUAN', 'Talise', '2009-12-04', 'SMK', 'EKONOMI LEMAH', 1],
            ['GIVEN NATANAEL CHRIST HARIKATIGA', 'LAKI-LAKI', 'Talise', '2008-12-29', 'SMK', 'EKONOMI LEMAH', 1],
            ['YOHAN FRITS', 'LAKI-LAKI', 'Tangerang', '2010-03-15', 'SMK', 'BROKEN HOME', 1],
            ['ALFILIO LUTFI RESA PONGGOHONG', 'LAKI-LAKI', 'Paret', '2010-04-05', 'SMK', 'YATIM', 1],
            ['ABIGAEL KARISOH JUNAIDI', 'PEREMPUAN', 'Tondano', '2010-11-19', 'SMK', 'YATIM PIATU', 1],
            ['CHIKO GABRIEL RATULANGI POBOLE', 'LAKI-LAKI', 'Manado', '2010-04-05', 'SMA', 'YATIM PIATU', 1],
            ['SELOMITHA BUNGKAESANG', 'PEREMPUAN', 'Libas', '2009-05-27', 'SMP', 'EKONOMI LEMAH', 1],
            ['CHRISTIAN CALVIN KASIHA', 'LAKI-LAKI', 'Manado', '2011-01-31', 'SMP', 'PIATU', 1],
            ['WILIAM GAHUNG', 'LAKI-LAKI', 'Liwutung', '2011-05-15', 'SMP', 'YATIM', 1],
            ['NABILA GRASCIA BUNGKAESANG', 'PEREMPUAN', 'Libas', '2010-11-09', 'SMP', 'EKONOMI LEMAH', 1],
            ['VRISKA KARUTABE', 'PEREMPUAN', 'Talise', '2010-05-04', 'SMP', 'YATIM PIATU', 1],
            ['DEWANTI PUTRI TAMASENGGE', 'PEREMPUAN', 'Talise', '2010-05-04', 'SMP', 'EKONOMI LEMAH', 1],
            ['NATAL MIRECEL KAPANTOW', 'LAKI-LAKI', 'Tonsawan', '2011-12-16', 'SMP', 'YATIM', 1],
            ['SINTIA RAHMAT PANGGA', 'PEREMPUAN', 'Biromaru', '2010-09-10', 'SMP', 'TERLANTAR', 1],
            ['YEREMIA IMANUEL SUPIT', 'LAKI-LAKI', 'Tomohon', '2011-07-14', 'SMP', 'YATIM PIATU', 1],
            ['ADAM IMANUEL WUWUNGAN', 'LAKI-LAKI', 'Tomohon', '2012-07-08', 'SMP', 'EKONOMI LEMAH', 1],
            ['JUNAIDY LONGKUN', 'LAKI-LAKI', 'Sonder', '2012-06-14', 'SMP', 'EKONOMI LEMAH', 1],
            ['FLORISTY KANDOW', 'PEREMPUAN', 'Tonsawang', '2013-03-08', 'SD', 'YATIM', 1],
            ['NATASYA ESTER GOSAL', 'PEREMPUAN', 'Tonsawang', '2012-11-21', 'SMP', 'EKONOMI LEMAH', 1],
            ['CLAUDIA RAHMAT PANGGA', 'PEREMPUAN', 'Biromaru', '2012-09-13', 'SMP', 'TERLANTAR', 1],
            ['BRAYEN REINALDI BAHAR', 'LAKI-LAKI', 'Talise', '2012-08-28', 'SMP', 'EKONOMI LEMAH', 1],
            ['VARAN HEIT KARUTABE', 'LAKI-LAKI', 'Talise', '2012-09-22', 'SMP', 'PIATU', 1],
            ['JIDAN TAMBULANGO', 'LAKI-LAKI', 'Likupang', '2013-06-09', 'SMP', 'EKONOMI LEMAH', 1],
            ['ESTER RINA SASELAH', 'PEREMPUAN', 'Libas', '2012-05-24', 'SMP', 'BROKEN HOME', 1],
            ['KRISTANIA KHIREY SINADIA', 'PEREMPUAN', 'Lansa', '2013-06-22', 'SMP', 'BROKEN HOME', 1],
            ['KIMBERLY GAMALIELA SIWI', 'PEREMPUAN', 'Tomohon', '2013-09-27', 'SD', 'EKONOMI LEMAH', 1],
            ['JOSUA VAUZAN DOPONG', 'LAKI-LAKI', 'Jayapura', '2014-10-09', 'SD', 'BROKEN HOME', 1],
            ['MATHEN JETLI GAHUNG', 'LAKI-LAKI', 'Towuntu Barat', '2013-06-05', 'SD', 'YATIM', 1],
            ['CRISTOVEL GRASIO AJASAN', 'LAKI-LAKI', 'Manado', '2013-12-29', 'SD', 'BROKEN HOME', 1],
            ['RENI DWI ANGRAENI PODALOS', 'PEREMPUAN', 'Tonsawang', '2014-03-26', 'SD', 'YATIM', 1],
            ['KENJI RIVANO AGLY MONINGKEY', 'LAKI-LAKI', 'Tondano', '2014-08-02', 'SD', 'EKONOMI LEMAH', 1],
            ['JIBRIEL ISHAK PALILINGAN', 'LAKI-LAKI', 'Ratatotok', '2014-03-25', 'SD', 'YATIM', 1],
            ['YATI ROMPIS', 'PEREMPUAN', 'Tonsawang', '2014-10-30', 'SD', 'TERLANTAR', 1],
            ['ANGGRIANI GARCE KANDOU', 'PEREMPUAN', 'Tonsawang', '2015-08-24', 'SD', 'YATIM', 1],
            ['SAMUEL MICHAEL TAKUMANSANG LAMPEANG', 'LAKI-LAKI', 'Tondano', '2014-05-09', 'SD', 'BROKEN HOME', 1],
            ['OKTAVIANI KOWAAS', 'PEREMPUAN', 'Paret', '2014-10-18', 'SD', 'BROKEN HOME', 1],
            ['MELISA PRISILIA CLAUDIA PAAT', 'PEREMPUAN', 'Tomohon', '2014-04-05', 'SD', 'PIATU', 1],
            ['LIVIANI ESTER MOKOLOMBAN', 'PEREMPUAN', 'Amurang', '2014-02-09', 'SD', 'YATIM', 1],
            ['SYALOMITHA PATTYLIMA PANOMBAN', 'PEREMPUAN', 'Silian', '2015-01-28', 'SD', 'BROKEN HOME', 1],
            ['GLEONALDO WENAS', 'LAKI-LAKI', 'Manado', '2016-06-07', 'SD', 'YATIM PIATU', 1],
            ['TULAK KUM', 'LAKI-LAKI', 'Ekneba', '2014-01-06', 'SD', 'EKONOMI LEMAH', 1],
            ['ERSON MAESENI', 'LAKI-LAKI', 'Ekneba', '2015-08-08', 'SD', 'EKONOMI LEMAH', 1],
            ['GRALDI SWINGLI PANGALILA', 'LAKI-LAKI', 'Tomohon', '2016-10-31', 'SD', 'BROKEN HOME', 1],
            ['GRALDO KALVIN PANGALILA', 'LAKI-LAKI', 'Tomohon', '2016-10-31', 'SD', 'BROKEN HOME', 1],
            ['JANITA KOWAAS', 'PEREMPUAN', 'Paret', '2017-01-12', 'SD', 'BROKEN HOME', 1],
            ['VLORENCHIA DAMONGILALA', 'PEREMPUAN', 'Mitra', '2017-06-17', 'SD', 'YATIM', 1],
            ['MOSES TIGAU', 'LAKI-LAKI', 'Tomohon', '2018-07-21', 'SD', 'YATIM', 1],
            ['INJILHIA DAMONGILALA', 'PEREMPUAN', 'Tonsawang', '2018-08-02', 'SD', 'BROKEN HOME', 1],
            ['NAOMI TUMEL', 'PEREMPUAN', 'Manado', '2018-10-10', 'SD', 'BROKEN HOME', 1],
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
                    'status' => $child[5] === 'BROKEN HOME' ? 'EKONOMI LEMAH' : $child[5], // enum tidak ada BROKEN HOME
                    'in_house' => $child[6],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // Update child_count
        $totalChildren = DB::table('children')->where('orphanage_id', $orphanageId)->count();
        DB::table('orphanages')
            ->where('id', $orphanageId)
            ->update(['child_count' => $totalChildren]);

        // ===================================================================
        // 2. KEBUTUHAN PANTI (14 item)
        // ===================================================================
        $needs = [
            ['Sembako', 'Beras, minyak, gula, telur, mie instan'],
            ['Uang Tunai', 'Untuk operasional bulanan & kebutuhan mendadak'],
            ['Susu Bubuk', 'Susu formula untuk anak balita & SD'],
            ['Bumbu Dapur', 'Garam, merica, penyedap, saus, kecap'],
            ['Seragam Sekolah', 'Pramuka, rok/celana putih & hitam (SD, SMP, SMA)'],
            ['Pakaian Dalam', 'Celana dalam, kaos dalam pria/wanita'],
            ['Shampoo', 'Shampoo sachet & botol untuk anak'],
            ['Alat Tulis', 'Buku tulis, pensil, pulpen, penggaris'],
            ['Pembalut', 'Pembalut wanita untuk remaja putri'],
            ['Balon Lampu', 'Lampu LED 5W, 9W, 12W'],
            ['Obat-obatan & Vitamin', 'Paracetamol, vitamin C, betadine, obat cacing'],
            ['Siprey Kasur', 'Obat kutu kasur & nyamuk'],
            ['Loyan/Ember', 'Ember besar untuk cuci, loyang kue'],
            ['Sepatu Sekolah', 'Sepatu hitam pria/wanita ukuran 30-42'],
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

        $this->command->info("63 anak & 14 kebutuhan berhasil dimasukkan ke Panti Nazaret Tomohon (ID: $orphanageId)");
        $this->command->info("Total anak: $totalChildren | Total kebutuhan: " . count($needs));
    }
}