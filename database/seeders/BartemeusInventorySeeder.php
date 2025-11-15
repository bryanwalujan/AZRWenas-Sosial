<?php

namespace Database\Seeders;

use App\Models\Orphanage;
use App\Models\Inventory;
use Illuminate\Database\Seeder;

class BartemeusInventorySeeder extends Seeder
{
    public function run()
    {
        $panti = Orphanage::find(3);

        if (!$panti) {
            $this->command->error('Panti dengan ID 3 tidak ditemukan!');
            return;
        }

        // Hapus inventaris lama jika ingin reset
        // $panti->inventories()->delete();

        $inventories = [
            // ASET GEDUNG & TANAH
            [
                'location' => 'Gedung Panti',
                'item_name' => 'Gedung 2 Lantai (SLB + Asrama)',
                'quantity' => 1,
                'source' => 'STINAFO Nederland & GMIM',
                'value' => 1500000000,
                'note' => 'Dibangun tahun 2003, tanah milik GMIM',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Lahan',
                'item_name' => 'Tanah Milik GMIM',
                'quantity' => 1,
                'source' => 'GMIM',
                'value' => 0,
                'note' => 'Lokasi: Jl. Tanah Putih Lingk. VI',
                'condition' => 'Baik'
            ],

            // PERALATAN PENDIDIKAN
            [
                'location' => 'Ruang Kelas SLB-A',
                'item_name' => 'Papan Tulis Braille',
                'quantity' => 4,
                'source' => 'Donasi',
                'value' => 2500000,
                'note' => 'Ukuran 120x90 cm',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Ruang Kelas SLB-A',
                'item_name' => 'Mesin Tik Braille',
                'quantity' => 6,
                'source' => 'Donasi',
                'value' => 1800000,
                'note' => 'Perkins Brailler',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Ruang Komputer',
                'item_name' => 'Komputer + JAWS Screen Reader',
                'quantity' => 3,
                'source' => 'Donasi',
                'value' => 12000000,
                'note' => 'Spesifikasi: Intel i5, 8GB RAM',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Ruang Kelas',
                'item_name' => 'Meja Kursi Belajar',
                'quantity' => 20,
                'source' => 'Donasi',
                'value' => 500000,
                'note' => 'Untuk siswa SLB',
                'condition' => 'Baik'
            ],

            // PERALATAN ASRAMA
            [
                'location' => 'Asrama Putra',
                'item_name' => 'Tempat Tidur Susun',
                'quantity' => 8,
                'source' => 'Donasi',
                'value' => 1200000,
                'note' => 'Besi, kapasitas 16 anak',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Asrama Putri',
                'item_name' => 'Tempat Tidur Susun',
                'quantity' => 7,
                'source' => 'Donasi',
                'value' => 1200000,
                'note' => 'Besi, kapasitas 14 anak',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Asrama',
                'item_name' => 'Lemari Pakaian',
                'quantity' => 15,
                'source' => 'Donasi',
                'value' => 800000,
                'note' => 'Kayu, 2 pintu',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Kamar Mandi',
                'item_name' => 'Kloset Duduk + Shower',
                'quantity' => 4,
                'source' => 'Donasi',
                'value' => 3000000,
                'note' => 'Ramah disabilitas',
                'condition' => 'Baik'
            ],

            // DAPUR & MAKAN
            [
                'location' => 'Dapur',
                'item_name' => 'Kompor Gas 2 Tungku',
                'quantity' => 2,
                'source' => 'Donasi',
                'value' => 750000,
                'note' => 'Merk Rinnai',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Dapur',
                'item_name' => 'Kulkas 2 Pintu',
                'quantity' => 1,
                'source' => 'Donasi',
                'value' => 4500000,
                'note' => 'Kapasitas 400L',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Ruang Makan',
                'item_name' => 'Meja Makan + Kursi',
                'quantity' => 3,
                'source' => 'Donasi',
                'value' => 1500000,
                'note' => 'Set untuk 18 orang',
                'condition' => 'Baik'
            ],

            // LAIN-LAIN
            [
                'location' => 'Aula',
                'item_name' => 'Sound System',
                'quantity' => 1,
                'source' => 'Donasi',
                'value' => 8000000,
                'note' => 'Speaker + Mixer',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Kantor',
                'item_name' => 'Printer + Scanner',
                'quantity' => 1,
                'source' => 'Donasi',
                'value' => 2500000,
                'note' => 'Epson L3150',
                'condition' => 'Baik'
            ],
            [
                'location' => 'Gudang',
                'item_name' => 'Genset 5000 Watt',
                'quantity' => 1,
                'source' => 'Donasi',
                'value' => 12000000,
                'note' => 'Cadangan listrik',
                'condition' => 'Baik'
            ],
        ];

        foreach ($inventories as $inv) {
            $panti->inventories()->updateOrCreate(
                [
                    'location' => $inv['location'],
                    'item_name' => $inv['item_name']
                ],
                [
                    'quantity' => $inv['quantity'],
                    'source' => $inv['source'],
                    'value' => $inv['value'],
                    'note' => $inv['note'],
                    'condition' => $inv['condition']
                ]
            );
        }

        $this->command->info('16 item inventaris berhasil ditambahkan ke Panti Bartemeus (ID 3)!');
    }
}