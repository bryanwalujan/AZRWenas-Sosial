<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PantiDamaiInventarisSeeder extends Seeder
{
    public function run()
    {
        $orphanageId = 6; // ID Panti Damai Tomohon

        // Cek apakah panti ada
        $panti = DB::table('orphanages')->where('id', $orphanageId)->first();
        if (!$panti) {
            $this->command->error("Panti dengan ID $orphanageId tidak ditemukan!");
            return;
        }

        // ===================================================================
        // 1. DATA INVENTARIS (109 item)
        // ===================================================================
        $inventories = [
            ['ALKITAB', '5', null, null, null, 'baik'],
            ['LAPTOP AXIOO', '1 UNIT', null, null, null, 'baik'],
            ['PRINTER EPSON L 210', '1 UNIT', null, null, null, 'baik'],
            ['PRINTER CANON', '1 UNIT', null, null, 'TIDAK BERFUNGSI', 'rusak'],
            ['SPEEKER RCH EGA 115 PRO', '2 UNIT', null, null, null, 'baik'],
            ['SPEEKER KECIL DUSEN BERG K120A', '1 UNIT', null, null, 'TIDAK BERFUNGSI', 'rusak'],
            ['KEYBOARD YAMAHA', '1 UNIT', null, null, 'RUSAK', 'rusak'],
            ['MIXER SPEEKER YAMAHA NO SER EGXX02347', '1 UNIT', null, null, null, 'baik'],
            ['MIKE', '1', null, null, null, 'baik'],
            ['PROYEKTOR BENQ', '1', null, null, null, 'baik'],
            ['SHOWCASE AQUA 5 RAK', '1 UNIT', null, null, null, 'baik'],
            ['LEMARI ES 1 PINTU DIGITEC', '1 UNIT', null, null, null, 'baik'],
            ['LEMARI ES 2 PINTU', '1 UNIT', null, null, 'TIDAK BERFUNGSI', 'rusak'],
            ['FREEZER SHARP CRYSTAL ICE', '1 UNIT', null, null, null, 'baik'],
            ['RICE COOKER KIRIN 5,4 L', '1 UNIT', null, null, null, 'baik'],
            ['MAGICCOM YOUNGMA', '1 UNIT', null, null, 'TIDAK BERFUNGSI', 'rusak'],
            ['MESIN CUCI SHARP OTOMAT', '1 UNIT', null, null, null, 'baik'],
            ['MESIN CUCI AQUA OTOMAT', '1 UNIT', null, null, 'TIDAK BERFUNGSI', 'rusak'],
            ['MESIN CUCI MANUAL LG', '1 UNIT', null, null, null, 'baik'],
            ['SETRIKA PHILIPS DIVA TYPE GC 122', '1 UNIT', null, null, null, 'baik'],
            ['TV SAMSUNG 32 INC', '1 UNIT', null, null, null, 'baik'],
            ['POLYTRON PMA TYPE 9502', '1 UNIT', null, null, null, 'baik'],
            ['KOMPOR RINAI TURBO', '2 UNIT', null, null, null, 'baik'],
            ['POMPA AIR SHIMIZU MODEL PT-190 BIT', '1 UNIT', null, null, null, 'baik'],
            ['TONG AIR 1100L', '1', null, null, null, 'baik'],
            ['KURSI TAMU', '1 SET', null, null, 'TANPA MEJA', 'baik'],
            ['KURSI PLASTIK', '3 LUSIN', null, null, null, 'baik'],
            ['KURSI PLASTIK HIJAU', '1', null, null, null, 'baik'],
            ['KURSI PLASTIK BIRU (LAMA)', '1 LUSIN', null, null, 'RUSAK', 'rusak'],
            ['KURSI PLASTIK HUJAU (LAMA)', '1 LUSIN', null, null, 'RUSAK', 'rusak'],
            ['LEMARI KANTOR', '1', null, null, null, 'baik'],
            ['BUFET', '2', null, null, null, 'baik'],
            ['SPRINGBED PUTIH', '1', null, null, 'TANPA KEPALA', 'baik'],
            ['COMFORTA TWIN BED', '3', null, null, null, 'baik'],
            ['KATIL MODEL BARU', '10 UNIT', null, null, null, 'baik'],
            ['KATIL MODEL LAMA', '2 UNIT', null, null, null, 'baik'],
            ['BUSA BARU', '20 UNIT', null, null, null, 'baik'],
            ['BUSA LAMA', '5 UNIT', null, null, null, 'baik'],
            ['BANTAL KEPALA', '10', null, null, null, 'baik'],
            ['MEJA KANTOR', '2', null, null, null, 'baik'],
            ['MEJA MAKAN', '7', null, null, null, 'baik'],
            ['MEJA KECIL', '2', null, null, null, 'baik'],
            ['LEMARI PANJANG RAK', '2', null, null, null, 'baik'],
            ['LEMARI MAKANAN', '1', null, null, null, 'baik'],
            ['POHON NATAL', '1', null, null, null, 'baik'],
            ['TABUNG GAS', '10', null, null, null, 'baik'],
            ['GALON BOTOL AQUA', '4', null, null, null, 'baik'],
            ['PIRING MAKAN ANAK-ANAK', '3 LUSIN', null, null, null, 'baik'],
            ['GELAS MINUM ANAK-ANAK', '3 LUSIN', null, null, null, 'baik'],
            ['GELAS KACA', '3 LUSIN', null, null, null, 'baik'],
            ['PIRING MAKAN KACA', '4 LUSIN', null, null, null, 'baik'],
            ['GELAS PLASTIK', '1 LUSIN', null, null, null, 'baik'],
            ['CANGKIR & PRING KECIL', '6 PCS', null, null, null, 'baik'],
            ['CERET PLASTIK', '6 PCS', null, null, null, 'baik'],
            ['CERET KACA', '1 PCS', null, null, null, 'baik'],
            ['KELLY BOTTLE KECIL', '1', null, null, null, 'baik'],
            ['BLENDER MIYAKO', '1', null, null, null, 'baik'],
            ['WAJAN BESAR', '3', null, null, null, 'baik'],
            ['WAJAN KECIL', '2', null, null, null, 'baik'],
            ['DANDANG BESAR', '2', null, null, null, 'baik'],
            ['DANDANG KECIL', '2', null, null, null, 'baik'],
            ['SENDOK MAKAN', '3 LUSIN', null, null, null, 'baik'],
            ['GARPU', '1 LUSIN', null, null, null, 'baik'],
            ['SENDOK MAKANAN', '3 LUSIN', null, null, null, 'baik'],
            ['LOYAN', '3', null, null, null, 'baik'],
            ['TEMPAT IKAN', '4', null, null, null, 'baik'],
            ['TEMPAT PIRING', '1', null, null, null, 'baik'],
            ['TONG AIR MINUM', '1', null, null, null, 'baik'],
            ['JAM DINDING', '6', null, null, null, 'baik'],
            ['SAPU', '4', null, null, null, 'baik'],
            ['SKEP', '2', null, null, null, 'baik'],
            ['SAPU LIDI', '3', null, null, null, 'baik'],
            ['KAIN PEL', '2', null, null, null, 'baik'],
            ['TEMPAT SAMPAH', '6', null, null, null, 'baik'],
            ['EMBER', '5', null, null, null, 'baik'],
            ['GAYUNG', '8', null, null, null, 'baik'],
            ['TAPLAK MEJA BESAR', '3', null, null, null, 'baik'],
            ['TAPLAK MEJA KECIL', '3', null, null, null, 'baik'],
            ['BAJU SERAGAM BATIK', '30', null, null, null, 'baik'],
            ['SEPREI', '2 SET', null, null, null, 'baik'],
            ['MESIN PARAS', '1', null, null, null, 'baik'],
            ['GEROBAK ARTCO', '1', null, null, null, 'baik'],
            ['TEMPAT CUCI RAMBUT', '1', null, null, null, 'baik'],
            ['SOMPOI', '1', null, null, null, 'baik'],
            ['LEMARI THABITA', '14', null, null, null, 'baik'],
            ['MESIN CUCI AQUA MANUAL', '1', null, null, null, 'baik'],
            ['TAPLAK MEJA ORANGE & GOLD', '6', null, null, null, 'baik'],
            ['LAPTOB LENOVO V 14 GA AMH', '1', null, null, null, 'baik'],
            ['PRINTER EPSON ECOTANK L3210', '1', null, null, null, 'baik'],
            ['UHD SMART TV LG 50" UR 7500', '1', null, null, null, 'baik'],
            ['KURSI PLASTIK NAPOLY COKLAT', '3 LUSIN', null, null, null, 'baik'],
            ['POMPA AIR JET SHIMIZU PC 260 BIT', '1 UNIT', null, null, null, 'baik'],
            ['TONG AIR 1200 L', '1', null, null, null, 'baik'],
            ['LEMARI PAJANGAN KACA', '1', null, null, null, 'baik'],
            ['MIMBAR KAYU', '1', null, null, null, 'baik'],
            ['KATIL KAYU', '2', null, null, null, 'baik'],
            ['SEPREI', '19', null, null, null, 'baik'],
            ['TERMOS NASI', '2', null, null, null, 'baik'],
            ['TV SHARP 32"', '1', null, null, null, 'baik'],
            ['CCTV', '4', null, null, null, 'baik'],
            ['GORDEN KACA', '36 L', null, null, null, 'baik'],
            ['TIMBANGAN BADAN', '1', null, null, null, 'baik'],
            ['TENSI DARAH', '1', null, null, null, 'baik'],
            ['STOLA HIJAU', '1', null, null, null, 'baik'],
            ['TATAKAN KOMPOR', '2', null, null, null, 'baik'],
            ['KURSI PLASTIK MERAH', '2 LUSIN', null, null, null, 'baik'],
            ['BANGKU MAKAN', '7', null, null, null, 'baik'],
            ['PIRING MAKAN PLASTIK', '2 LUSIN', null, null, null, 'baik'],
            ['PRINTER CANON E470', '1 UNIT', null, null, null, 'baik'],
        ];

        foreach ($inventories as $inv) {
            DB::table('inventories')->updateOrInsert(
                [
                    'orphanage_id' => $orphanageId,
                    'item_name' => $inv[0],
                ],
                [
                    'location' => 'Panti Damai Tomohon',
                    'quantity' => $inv[1],
                    'source' => $inv[2] ?? null,
                    'value' => $inv[3] ?? null,
                    'note' => $inv[4] ?? null,
                    'condition' => $inv[5],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $this->command->info("109 item inventaris Panti Damai (ID: $orphanageId) berhasil dimasukkan!");
        $this->command->info("Rusak: " . collect($inventories)->where(5, 'rusak')->count() . " | Baik: " . collect($inventories)->where(5, 'baik')->count());
    }
}