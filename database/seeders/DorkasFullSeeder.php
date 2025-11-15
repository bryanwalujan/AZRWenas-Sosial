<?php

namespace Database\Seeders;

use App\Models\Orphanage;
use App\Models\Inventory;
use App\Models\OrphanageContact;
use Illuminate\Database\Seeder;

class DorkasFullSeeder extends Seeder
{
    public function run()
    {
        // === BUAT / UPDATE PANTI DORKAS ===
        $panti = Orphanage::updateOrCreate(
            ['name' => 'Panti Asuhan “DORKAS” Tondano'],
            [
                'location' => 'Jl. D.I Panjaitan No.27, Kel. Liningaan, Kec. Tondano Timur',
                'child_count' => 39 + 24,
                'description' => 'LKSA di bawah Yayasan GMIM Ds. A.Z.R Wenas. Melayani anak yatim, piatu, terlantar, dan ekonomi lemah.',
                'photo' => null,
                'needs' => ['beras', 'minyak goreng', 'pampers', 'buku sekolah', 'seragam'],
                'facilities' => ['aula', 'ruang belajar', 'kamar anak', 'dapur', 'WC', 'ruang kesehatan'],
                'categories' => ['yatim', 'piatu', 'terlantar'],

                // PROFIL
                'founded_year' => '9 April 1934',
                'address' => 'Kelurahan Liningaan, Kec. Tondano Timur, Kab. Minahasa, Kode Pos 95612',
                'phone' => '+62 813 4013 6649',
                'email' => 'dorkastondano244@gmail.com',
                'legal_documents' => "1. Surat Ijin Operasional Dinas Sosial Kab. Minahasa No. 12/B-PTN/DS/VI/2021\n2. Surat Tanda Terdaftar Badan KESBAG dan Politik Prov. Sulut No. 220/03/XII/KESBAG POL/2016\n3. Surat Keterangan Terdaftar Badan KESBAWG POL dan LINMAS Kab. Minahasa No. 00-71-02/0032/XI/2016",
                'vision' => 'Membantu anak-anak yang kurang mampu untuk bisa mandiri dengan memberikan faktor penunjang agar anak-anak bisa sukses.',
                'mission' => "1. Setiap anak mempunyai hak yang sama untuk bertumbuh dan berkembang dilindungi serta berpartisipasi dalam menentukan hidupnya.\n2. Membantu anak-anak Yatim Piatu yang terlantar baik jasmani maupun rohani serta dapat menikmati pendidikan dan demi kesejahteraan dan masa depan.",
                'target_service' => ['Anak Yatim', 'Piatu', 'Terlantar', 'Ekonomi Lemah'],
                'capacity' => 100,
                'in_house_male' => 20,
                'in_house_female' => 19,
                'external_male' => 19,
                'external_female' => 5,
                'foundation_name' => 'Yayasan GMIM Ds. A.Z.R Wenas',
                'history' => "Didirikan pada 9 April 1934 oleh Kaum Ibu Dorkas. Nama diambil dari Kisah Para Rasul 9:36. Tahun 1952 berbadan hukum (Akte Notaris No.2). Tahun 1984 diserahkan ke GMIM. Tahun 1996 menjadi Yayasan Sosial GMIM Ds. A.Z.R Wenas (Akte Notaris No.18).",
                'leader_name' => 'Pdt. Sjuultje Kaligis, S.Th',
                'leader_phone' => '+62 813 4013 6649',
                'secretary_name' => 'Mega Parengkuan',
                'secretary_phone' => '+62 856 5721 3908',
                'treasurer_name' => 'Meitha Giroth',
                'treasurer_phone' => '+62 8219 5141 340',
                'land_area' => 1520.00,
                'land_status' => 'Hibah',
            ]
        );

        // === KONTAK PENGURUS (orphanage_contacts) ===
        $panti->contacts()->delete(); // Hapus dulu jika ada
        $contacts = [
            ['contact_name' => 'Pdt. Sjuultje Kaligis, S.Th', 'phone' => '+62 813 4013 6649', 'role' => 'Kepala Panti'],
            ['contact_name' => 'Mega Parengkuan', 'phone' => '+62 856 5721 3908', 'role' => 'Sekretaris'],
            ['contact_name' => 'Meitha Giroth', 'phone' => '+62 8219 5141 340', 'role' => 'Bendahara'],
            ['contact_name' => 'Deyvi Kumontoy', 'phone' => null, 'role' => 'Pengasuh I'],
            ['contact_name' => 'Mariska Rantung', 'phone' => null, 'role' => 'Pengasuh II'],
            ['contact_name' => 'Joula Sumarauw', 'phone' => null, 'role' => 'Tenaga Masak'],
        ];

        foreach ($contacts as $c) {
            OrphanageContact::create(array_merge($c, ['orphanage_id' => $panti->id]));
        }

        // === INVENTARIS LENGKAP DARI DOKUMEN 2025 ===
        $panti->inventories()->delete(); // Hapus dulu jika ada

        $inventaris = [
            // RUANGAN KANTOR
            ['RUANGAN KANTOR', 'MEJA BIRO', '3 UNIT', 'SUMB. BANK MANDIRI', 750000, 'baik'],
            ['RUANGAN KANTOR', 'LEMARI ARSIP', '2 UNIT', 'DIBELI/SUMBANGAN', 2200000, 'baik'],
            ['RUANGAN KANTOR', 'LEMARI FILE', '1 UNIT', 'SUMBANGAN', 1750000, 'baik'],
            ['RUANGAN KANTOR', 'LAPTOP + PRINTER', '1 UNIT', 'DIBELI', 10000000, 'baik'],
            ['RUANGAN KANTOR', 'PAPAN SUSUNAN PENGURUS', '1 BUAH', 'DIBELI', 60000, 'baik'],
            ['RUANGAN KANTOR', 'PAPAN STRUKTUR', '1 BUAH', 'DIBELI', 60000, 'baik'],
            ['RUANGAN KANTOR', 'PAPAN INFORMASI KUNJUNGAN', '1 BUAH', 'DIBELI', 60000, 'baik'],
            ['RUANGAN KANTOR', 'PAPAN DATA ANAK', '1 BUAH', 'DIBELI', 250000, 'baik'],
            ['RUANGAN KANTOR', 'PAPAN PEMBAGIAN TUGAS', '1 BUAH', 'DIBELI', 75000, 'baik'],
            ['RUANGAN KANTOR', 'BUNGA & VAS', '2 BUAH', 'DIBELI', 50000, 'baik'],
            ['RUANGAN KANTOR', 'KAIN JENDELA', '5 SET', 'DIBELI', 1125000, 'baik'],
            ['RUANGAN KANTOR', 'TEMPAT SAMPAH', '2 BUAH', 'DIBELI', 50000, 'baik'],
            ['RUANGAN KANTOR', 'SAPU & SKEP', '1 SET', 'DIBELI', 45000, 'baik'],
            ['RUANGAN KANTOR', 'TEMPAT TISSUE', '1 BUAH', 'DIBELI', 50000, 'baik'],
            ['RUANGAN KANTOR', 'KURSI TAMU', '1 STEL', 'DIBELI', 6000000, 'baik'],
            ['RUANGAN KANTOR', 'LEMARI TEMPAT BARANG', '1 UNIT', 'DIBELI', 300000, 'baik'],
            ['RUANGAN KANTOR', 'BALON LAMPU', '2 BUAH', 'DIBELI', 150000, 'baik'],
            ['RUANGAN KANTOR', 'TEMPAT KERTAS UTK', '3 BUAH', 'DIBELI', 60000, 'baik'],

            // RUANGAN AULA
            ['RUANGAN AULA', 'KURSI PLASTIK HIJAU', '1 SET', 'SUMBANGAN', 900000, 'baik'],
            ['RUANGAN AULA', 'KURSI MERAH MUDA', '3 LUSIN', 'SUMBANGAN BPK JAMES ROMPAS', 1500000, 'baik'],
            ['RUANGAN AULA', 'BANGKU PANJANG', '6 BUAH', 'SUMBANGAN', 1500000, 'baik'],
            ['RUANGAN AULA', 'JAM DINDING', '1 BUAH', 'SUMBANGAN', 175000, 'baik'],
            ['RUANGAN AULA', 'LEMARI HIAS', '1 BUAH', 'SUMBANGAN', 175000, 'baik'],
            ['RUANGAN AULA', '(BUKU, ALKITAB, HIASAN, DLL.)', '2 BUAH', 'SUMBANGAN', 400000, 'baik'],

            // RUANGAN REKREASI
            ['RUANGAN REKREASI', 'KAIN JENDELA', '2 SET', 'DIBELI/SUMBANGAN', 1350000, 'baik'],
            ['RUANGAN REKREASI', 'KAIN PINTU', '6 SET', 'DIBELI/SUMBANGAN', 1300000, 'baik'],
            ['RUANGAN REKREASI', 'HIASAN DINDING', '2 BUAH', 'DIBELI/SUMBANGAN', 300000, 'baik'],
            ['RUANGAN REKREASI', 'BALIHO NAMA PANTI', '1 BUAH', 'SUMBANGAN', 100000, 'baik'],
            ['RUANGAN REKREASI', 'PAPAN FOTO', '2 BUAH', 'DIBELI', 600000, 'baik'],
            ['RUANGAN REKREASI', 'MEJA', '3 BUAH', 'DIBELI', 700000, 'baik'],
            ['RUANGAN REKREASI', 'KAIN + TAPLAK MEJA', '3 BUAH', 'DIBELI', 300000, 'baik'],
            ['RUANGAN REKREASI', 'VAS BUNGA', '7 BUAH', 'DIBELI', 210000, 'baik'],
            ['RUANGAN REKREASI', 'BALON LAMPU', '1 BUAH', 'DIBELI', 300000, 'baik'],
            ['RUANGAN REKREASI', 'MIMBAR', '1 BUAH', 'DIBELI', 200000, 'baik'],

            // RUANGAN KETERAMPILAN
            ['RUANGAN KETERAMPILAN', 'MEJA PANJANG 2 M', '2 BUAH', 'DIBELI', 3000000, 'baik'],
            ['RUANGAN KETERAMPILAN', 'TAPLAK MEJA, BUNGA, VAS', '2 SET', 'SUMBANGAN', 300000, 'baik'],
            ['RUANGAN KETERAMPILAN', 'LEMARI BARANG', '1 SET', 'DIBELI', 3000000, 'baik'],
            ['RUANGAN KETERAMPILAN', 'BARANG (PANSTOVE, TERMOS, LEPER, PIRING, GELAS, DLL.)', '2 BUAH', 'SUMBANGAN', 3000000, 'baik'],
            ['RUANGAN KETERAMPILAN', 'BANGKU', '1 BUAH', 'SUMBANGAN/DIBELI', 100000, 'baik'],
            ['RUANGAN KETERAMPILAN', 'TV', '1 BUAH', 'SUMBANGAN', 3000000, 'baik'],

            // RUANG PENGASUH I
            ['RUANG PENGASUH I', 'MESIN JAHIT', '2 UNIT', 'DIBELI', 3000000, 'baik'],
            ['RUANG PENGASUH I', 'LAMPU', '2 BUAH', 'SUMBANGAN', 70000, 'baik'],
            ['RUANG PENGASUH I', 'LEMARI BUKU (ATM)', '1 UNIT', 'SUMBANGAN', 750000, 'baik'],
            ['RUANG PENGASUH I', 'LEMARI PAKAIAN', '6 BUAH', 'SUMBANGAN', 1000000, 'baik'],
            ['RUANG PENGASUH I', 'LEMARI INVENTARIS KANTOR', '1 BUAH', 'SUMBANGAN', 1500000, 'baik'],
            ['RUANG PENGASUH I', 'SEPRAY, TALPAK MEJA, KAIN JENDELA, KAIN PINTU.', '2 DOS', 'SUMBANGAN/DIBELI', 3000000, 'baik'],
            ['RUANG PENGASUH I', 'PAKAIAN SERAGAM ANAK', '1 BUAH', 'DIBELI', 500000, 'baik'],
            ['RUANG PENGASUH I', 'HANDUK DLL.', '4 BUAH', 'SUMBANGAN', 300000, 'baik'],
            ['RUANG PENGASUH I', 'POHON NATAL/HIASAN', '1 BUAH', 'SUMBANGAN', 200000, 'baik'],
            ['RUANG PENGASUH I', 'TEMPAT TIDUR', '1 UNIT', 'SUMBANGAN', 1000000, 'baik'],

            // RUANG PEMIMPIN
            ['RUANG PEMIMPIN', 'KURSI PLASTIK', '1 BUAH', 'DIBELI', 550000, 'baik'],
            ['RUANG PEMIMPIN', 'MEJA', '1 SET', 'DIBELI', 2500000, 'baik'],
            ['RUANG PEMIMPIN', 'DISPENSER, RICE COOKER', '1 UNIT', 'DIBELI', 3550000, 'baik'],

            // RUANG PENGASUH II
            ['RUANG PENGASUH II', 'LEMARI MAKAN', '1 BUAH', 'DIBELI', 350000, 'baik'],
            ['RUANG PENGASUH II', 'MEJA MAKAN/KURSI', '1 UNIT', 'DIBELI', 300000, 'baik'],
            ['RUANG PENGASUH II', 'KULKAS', '1 UNIT', 'DIBELI', 200000, 'baik'],
            ['RUANG PENGASUH II', 'RICE COOKER', '1 BUAH', 'DIBELI', 2250000, 'baik'],
            ['RUANG PENGASUH II', 'DISPENSER', '1 UNIT', 'DIBELI', 150000, 'baik'],
            ['RUANG PENGASUH II', 'MEJA', '1 BUAH', 'DIBELI', 4500000, 'baik'],
            ['RUANG PENGASUH II', 'SPRING BED', '1 BUAH', 'DIBELI', 200000, 'baik'],
            ['RUANG PENGASUH II', 'MEJA', '1 BUAH', 'DIBELI', 200000, 'baik'],

            // RUANG PENGASUH III
            ['RUANG PENGASUH III', 'SOFA', '1 BUAH', 'DIBELI', 1000000, 'baik'],
            ['RUANG PENGASUH III', 'MEJA STRIKA', '1 BUAH', 'DIBELI', 500000, 'baik'],
            ['RUANG PENGASUH III', 'STRIKA', '1 BUAH', 'DIBELI', 30000, 'baik'],

            // KAMAR PUTRI I
            ['RUANG KAMAR PUTRI I', 'LEMARI', '1 BUAH', 'SUMBANGAN', 150000, 'baik'],
            ['RUANG KAMAR PUTRI I', 'MEJA', '1 BUAH', 'DIBELI', 500000, 'baik'],
            ['RUANG KAMAR PUTRI I', 'BALON LAMPU', '1 BUAH', 'DIBELI', 30000, 'baik'],

            // KAMAR PUTRI II
            ['RUANG KAMAR PUTRI II', 'TEMPAT TIDUR', '3 UNIT', 'SUMBANGAN', 4500000, 'baik'],
            ['RUANG KAMAR PUTRI II', 'BANTAL', '4 BUAH', 'SUMBANGAN', 200000, 'baik'],
            ['RUANG KAMAR PUTRI II', 'SELIMUT', '5 BUAH', 'SUMBANGAN', 375000, 'baik'],
            ['RUANG KAMAR PUTRI II', 'BUSA', '4 BUAH', 'SUMBANGAN', 800000, 'baik'],
            ['RUANG KAMAR PUTRI II', 'SPREY', '4 BUAH', 'SUMBANGAN', 500000, 'baik'],
            ['RUANG KAMAR PUTRI II', 'KURSI PLASTIK', '2 BUAH', 'DIBELI', 300000, 'baik'],
            ['RUANG KAMAR PUTRI II', 'KAIN JENDELA', '1 BUAH', 'DIBELI', 125000, 'baik'],
            ['RUANG KAMAR PUTRI II', 'LAMPU', '1 BUAH', 'DIBELI', 50000, 'baik'],

            // KAMAR PUTRI III
            ['RUANG KAMAR PUTRI III', 'TEMPAT TIDUR', '3 BUAH', 'SUMBANGAN', 4500000, 'baik'],
            ['RUANG KAMAR PUTRI III', 'MEJA', '1 BUAH', 'SUMBANGAN', 500000, 'baik'],
            ['RUANG KAMAR PUTRI III', 'BANTAL', '4 BUAH', 'SUMBANGAN', 200000, 'baik'],
            ['RUANG KAMAR PUTRI III', 'SELIMUT', '4 BUAH', 'SUMBANGAN', 300000, 'baik'],
            ['RUANG KAMAR PUTRI III', 'KURSI', '2 BUAH', 'SUMBANGAN', 300000, 'baik'],
            ['RUANG KAMAR PUTRI III', 'KAIN JENDELA', '1 BUAH', 'DIBELI', 125000, 'baik'],
            ['RUANG KAMAR PUTRI III', 'LAMPU', '1 BUAH', 'DIBELI', 50000, 'baik'],

            // KAMAR PUTRA I
            ['RUANG KAMAR PUTRA I', 'TEMPAT TIDUR', '3 BUAH', 'SUMBANGAN', 4500000, 'baik'],
            ['RUANG KAMAR PUTRA I', 'BANTAL', '6 BUAH', 'SUMBANGAN', 300000, 'baik'],
            ['RUANG KAMAR PUTRA I', 'BUSA', '5 BUAH', 'SUMBANGAN', 400000, 'baik'],
            ['RUANG KAMAR PUTRA I', 'SPREY', '5 BUAH', 'SUMBANGAN', 625000, 'baik'],
            ['RUANG KAMAR PUTRA I', 'KURSI PLASTIK', '4 BUAH', 'SUMBANGAN', 300000, 'baik'],
            ['RUANG KAMAR PUTRA I', 'KAIN JENDELA', '1 BUAH', 'DIBELI', 125000, 'baik'],
            ['RUANG KAMAR PUTRA I', 'LAMPU', '1 BUAH', 'DIBELI', 50000, 'baik'],
            ['RUANG KAMAR PUTRA I', 'MEJA', '1 BUAH', 'DIBELI', 500000, 'baik'],

            // KAMAR PUTRA II
            ['RUANG KAMAR PUTRA II', 'TEMPAT TIDUR', '4 BUAH', 'SUMBANGAN', 600000, 'baik'],
            ['RUANG KAMAR PUTRA II', 'BANTAL', '3 BUAH', 'SUMBANGAN', 150000, 'baik'],
            ['RUANG KAMAR PUTRA II', 'SEPREI', '4 BUAH', 'SUMBANGAN', 500000, 'baik'],
            ['RUANG KAMAR PUTRA II', 'BALON LAMPU', '1 BUAH', 'DIBELI', 50000, 'baik'],
            ['RUANG KAMAR PUTRA II', 'SELIMUT', '8 BUAH', 'SUMBANGAN', 600000, 'baik'],
            ['RUANG KAMAR PUTRA II', 'KAIN JENDELA', '2 BUAH', 'DIBELI', 250000, 'baik'],
            ['RUANG KAMAR PUTRA II', 'BUSA', '8 BUAH', 'DIBELI', 1600000, 'baik'],

            // RUANG DAPUR
            ['RUANG DAPUR', 'TEMPAT TIDUR', '4 BUAH', 'SUMBANGAN', 600000, 'baik'],
            ['RUANG DAPUR', 'BANTAL', '5 BUAH', 'SUMBANGAN', 250000, 'baik'],
            ['RUANG DAPUR', 'SPREY', '2 BUAH', 'SUMBANGAN', 250000, 'baik'],
            ['RUANG DAPUR', 'KAIN JENDELA', '1 BUAH', 'DIBELI', 125000, 'baik'],
            ['RUANG DAPUR', 'LAMPU', '1 BUAH', 'DIBELI', 50000, 'baik'],
            ['RUANG DAPUR', 'SELIMUT', '5 BUAH', 'SUMBANGAN', 375000, 'baik'],
            ['RUANG DAPUR', 'BUSA', '8 BUAH', 'DIBELI', 1600000, 'baik'],

            // BANGUNAN ASRAMA
            ['BANGUNAN ASRAMA', 'LEMARI MAKAN', '1 BUAH', 'SUMBANGAN', 750000, 'baik'],
            ['BANGUNAN ASRAMA', 'MEJA PANJANG 2M', '1 BUAH', 'SUMBANGAN', 250000, 'baik'],
            ['BANGUNAN ASRAMA', 'MEJA RENDAH ± 1 ½', '1 BUAH', 'SUMBANGAN', 100000, 'baik'],
            ['BANGUNAN ASRAMA', 'BELANGAN NASI GAS', '1 BUAH', 'DIBELI', 350000, 'baik'],
            ['BANGUNAN ASRAMA', 'KOMPOR GAS', '2 BUAH', 'DIBELI', 1700000, 'baik'],
            ['BANGUNAN ASRAMA', 'BELANGAN DANDANG', '5 BUAH', 'DIBELI', 500000, 'baik'],
            ['BANGUNAN ASRAMA', 'WAJAN', '5 BUAH', 'DIBELI', 500000, 'baik'],
            ['BANGUNAN ASRAMA', 'PIRING MAKAN', '6 LUSIN', 'DIBELI', 600000, 'baik'],
            ['BANGUNAN ASRAMA', 'SENDOK MAKAN', '6 LUSIN', 'DIBELI', 600000, 'baik'],
            ['BANGUNAN ASRAMA', 'SENDOK NASI, SUP, DLL.', '2 LUSIN', 'DIBELI', 250000, 'baik'],
            ['BANGUNAN ASRAMA', 'ALAT MASAK (PISAU,SONDO,AYAKAN,TELENAN)', '3 LUSIN', 'DIBELI', 750000, 'baik'],

            // LAIN-LAIN
            ['LAIN-LAIN', 'TANAH LOKASI PANTI', '± 1520 M³', 'HIBAH/SUMBANGAN', 500000000, 'baik'],
            ['LAIN-LAIN', 'TANAH DI SUMALANGKA', '± 1 Ha', 'HIBAH/DIBELI', 175000000, 'baik'],
            ['LAIN-LAIN', 'GUDANG BAHAN', '1 RUANG', 'DIBELI', 150000000, 'baik'],
            ['LAIN-LAIN', 'POMPA AIR', '2 UNIT', 'DIBELI', 1100000, 'baik'],
            ['LAIN-LAIN', 'WC/KAMAR MANDI', '9 UNIT', 'DIBELI/SUMBANGAN', 1100000, 'baik'],
            ['LAIN-LAIN', 'TONG PENAMPUNG AIR', '2 UNIT', 'DIBELI', 1800000, 'baik'],
            ['LAIN-LAIN', 'TABUNG GAS', '8 UNIT', 'DIBELI', 1800000, 'baik'],
            ['LAIN-LAIN', 'GALON AIR', '12 UNIT', 'BANTUAN DINAS SOSIAL', 0, 'baik'],
            ['LAIN-LAIN', 'KAIN JENDELA/PINTU', '2 BUAH', 'DIBELI', 0, 'baik'],
            ['LAIN-LAIN', 'MIXER', '1 BUAH', 'DIBELI', 0, 'rusak'],
        ];

        foreach ($inventaris as $item) {
            Inventory::create([
                'orphanage_id' => $panti->id,
                'location' => $item[0],
                'item_name' => $item[1],
                'quantity' => $item[2],
                'source' => $item[3],
                'value' => $item[4],
                'condition' => $item[5],
                'note' => $item[5] === 'rusak' ? 'Perlu perbaikan' : null,
            ]);
        }
    }
}