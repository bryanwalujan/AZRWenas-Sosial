<?php

namespace Database\Seeders;

use App\Models\Orphanage;
use App\Models\Need;
use Illuminate\Database\Seeder;

class BartemeusAdditionalNeedsSeeder extends Seeder
{
    public function run()
    {
        $panti = Orphanage::find(3);

        if (!$panti) {
            $this->command->error('Panti dengan ID 3 tidak ditemukan!');
            return;
        }

        // Hapus kebutuhan lama (hanya jika ingin reset)
        // $panti->needs()->delete();

        $needs = [
            [
                'item' => 'Sembako (diluar makanan instan, Nd bagus untuk kesehatan anak disabilitas.)',
                'description' => 'Beras, minyak goreng, gula, tepung, telur, sayur, ikan segar, dll. Prioritas kesehatan anak disabilitas.'
            ],
            [
                'item' => 'Snack : Biskuit, Wafer (Kecuali Ciki)',
                'description' => 'Cemilan sehat untuk anak-anak, tanpa pengawet berbahaya.'
            ],
            [
                'item' => 'Baju, celana, sepatu Layak pakai',
                'description' => 'Pakaian bersih, layak pakai, ukuran anak & dewasa, termasuk pakaian dalam.'
            ],
            [
                'item' => 'Bahan Makanan Basah',
                'description' => 'Sayuran segar, daging, ikan, buah-buahan, susu, dll.'
            ],
            [
                'item' => 'Seragam Sekolah',
                'description' => 'Seragam SD/SMP/SMA, batik, pramuka, olahraga. Sesuai ukuran masing-masing anak.'
            ],
            [
                'item' => 'Dana (untuk operasional panti)',
                'description' => 'Biaya listrik, air, transportasi, perawatan gedung, gaji pengasuh, dll.'
            ],
        ];

        foreach ($needs as $need) {
            $panti->needs()->updateOrCreate(
                ['item' => $need['item']],
                ['description' => $need['description']]
            );
        }

        $this->command->info('6 kebutuhan spesifik berhasil ditambahkan ke Panti Bartemeus (ID 3)!');
    }
}