<?php

namespace Database\Seeders;

use App\Models\Orphanage;
use App\Models\Child;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BartemeusChildrenSeeder extends Seeder
{
    public function run()
    {
        $panti = Orphanage::find(3);

        if (!$panti) {
            $this->command->error('Panti dengan ID 3 tidak ditemukan!');
            return;
        }

        // Hapus data lama jika ada
        $panti->children()->delete();

        $children = [
            // NAMA | TEMPAT,TGL LAHIR | UMUR | GENDER | NIK | DISABILITAS
            ['Alfa Timbowo', 'Manado, 09 Agustus 1992', 32, 'LAKI-LAKI', '7101120908920214', 'Hambatan penglihatan (penglihatan rendah)'],
            ['Arselino Aris Mamewe', 'Manado, 17 April 2018', 6, 'LAKI-LAKI', '7171021704180002', 'Hambatan penglihatan (buta total)'],
            ['Cantika Saselah', 'Manado Tua, 5 November 2007', 17, 'PEREMPUAN', '7171014511070002', 'Hambatan penglihatan (buta total)'],
            ['Farly Kumolontang', 'Tokin, 30 Maret 1990', 34, 'LAKI-LAKI', '7105223003900001', 'Hambatan penglihatan (buta total)'],
            ['Joyke Sorongan', 'Manado, 5 Juli 2001', 23, 'LAKI-LAKI', '7171050507010001', 'Hambatan penglihatan (penglihatan rendah)'],
            ['Lendy Sorongan', 'Manado, 6 Agustus 1997', 27, 'LAKI-LAKI', '7171050608970001', 'Hambatan penglihatan (penglihatan rendah)'],
            ['Natalia Cristy Hotti', 'Touliang, 31 Desember 2001', 23, 'PEREMPUAN', '7102067112010001', 'Hambatan penglihatan (penglihatan rendah)'],
            ['Natasya Kirana Runtuwene', 'Popontolen, 28 November 2011', 14, 'PEREMPUAN', '7105126811110001', 'Hambatan intelektual'],
            ['Oktaviano Samuel Kamang Tumangkeng', 'Manembo, 14 Oktober 2009', 15, 'LAKI-LAKI', '7102171410090001', 'Hambatan intelektual'],
            ['Rachel Keyzia Rama', 'Manado, 30 September 2007', 17, 'PEREMPUAN', '7171097009070001', 'Hambatan intelektual'],
            ['Sherly Cony Sigar', 'Pontianak, 9 September 1984', 40, 'PEREMPUAN', '7105124909840001', 'Hambatan penglihatan (penglihatan rendah)'],
            ['Siva Karsten Safero Labadjo', 'Manado, 20 September 2016', 8, 'LAKI-LAKI', '7171112009160002', 'Hambatan fisik'],
            ['Viviliya Cristin Markus', 'Rasaan, 10 Juni 2012', 12, 'PEREMPUAN', '7106075000612001', 'Hambatan penglihatan (buta total)'],
            ['Yandy Katuuk', 'Tatelu, 18 Juli 1993', 31, 'LAKI-LAKI', '7106051807930001', 'Hambatan penglihatan (buta total)'],
            ['Yoel Daniel Merentek', 'Tondey, 14 Januari 2006', 18, 'LAKI-LAKI', '7105211401060001', 'Hambatan fisik'],
        ];

        foreach ($children as $child) {
            [$name, $birthStr, $age, $gender, $nik, $disability] = $child;

            // Parse tempat & tanggal lahir
            preg_match('/(.+),\s*(\d{1,2})\s+([A-Za-z]+)\s+(\d{4})/', $birthStr, $matches);
            if (count($matches) !== 5) continue;

            $birthPlace = trim($matches[1]);
            $day = $matches[2];
            $monthName = $matches[3];
            $year = $matches[4];

            $monthMap = [
                'Januari' => '01', 'Februari' => '02', 'Maret' => '03', 'April' => '04',
                'Mei' => '05', 'Juni' => '06', 'Juli' => '07', 'Agustus' => '08',
                'September' => '09', 'Oktober' => '10', 'November' => '11', 'Desember' => '12'
            ];

            $month = $monthMap[$monthName] ?? '01';
            $birthDate = Carbon::createFromFormat('Y-m-d', "$year-$month-$day");

            // Tentukan status (default: TERLANTAR)
            $status = 'TERLANTAR';

            // Tentukan education_level berdasarkan umur
            $education = match (true) {
                $age <= 6 => 'TK',
                $age <= 12 => 'SD',
                $age <= 15 => 'SMP',
                $age <= 18 => 'SMA',
                default => 'Lulus'
            };

            $panti->children()->create([
                'name' => $name,
                'gender' => $gender,
                'birth_place' => $birthPlace,
                'birth_date' => $birthDate,
                'education_level' => $education,
                'status' => $status,
                'in_house' => true,
            ]);
        }

        $this->command->info('15 anak berhasil ditambahkan ke Panti Bartemeus (ID 3)!');
    }
}