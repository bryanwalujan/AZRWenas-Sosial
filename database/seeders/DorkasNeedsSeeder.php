<?php

namespace Database\Seeders;

use App\Models\Orphanage;
use App\Models\Need;
use Illuminate\Database\Seeder;

class DorkasNeedsSeeder extends Seeder
{
    public function run()
    {
        $dorkas = Orphanage::find(1);

        if (!$dorkas) {
            $this->command->error('Panti dengan ID 1 tidak ditemukan!');
            return;
        }

        // HAPUS DATA LAMA JIKA ADA
        $dorkas->needs()->delete();

        $needs = [
            // PENDIDIKAN
            "Biaya Pendidikan",
            "Baju Seragam & Pramuka (SD, SMP, SMA)",
            "Sepatu Sekolah (SD, SMP, SMA)",
            "Kaos Kaki Biasa & Pramuka (SD, SMP, SMA)",
            "Tas Sekolah",
            "Alat Tulis Menulis (Buku Besar, Buku Kecil, Pensil, Pulpen, Spidol, Jangka, Mistar lengkap, buku grafik, buku garis, Buku Gambar, Pewarna, Spidol SnowMan Dll)",
            "Kertas HVS",

            // KESEHATAN
            "Dana kesehatan",
            "Obat-obatan",
            "Sabun Mandi",
            "Sabun Cuci Baju",
            "Obat Gigi / Odol",
            "Sikat Gigi",
            "Sabun Cuci Piring",
            "Shampo",
            "Dll",

            // MAKANAN
            "Uang belanja pasar",
            "Bahan-bahan Dapur (Ikan, Rica, Tomat, Batang Bawang, Rempah-Rempah, Dll)",
            "Beras",
            "Minyak Goreng",
            "Supermie",
            "Kacang Hijau",
            "Susu",
            "Mentega",
            "Terigu",
            "Gula",
            "Telur",
            "Ikan Kaleng",
            "Mihun",
            "Laksa",
            "Kue Natal / Biscuit",
            "Dll",

            // PAKAIAN / SEPATU
            "Kemeja",
            "Celana Panjang / pendek",
            "Celana dalam Pria / Wanita",
            "Kaos Dalam & Singlet Pria / Wanita",
            "BH",
            "Rok",
            "Baju",
            "Kaos Kaki",
            "Kaos Tangan",
            "Sapu Tangan",
            "Pakaian olahraga",
            "Dress",
            "Kemeja",
            "Sepatu Gereja (pria / wanita)",

            // LAIN-LAIN
            "Handuk Besar / Kecil",
            "Jepit Rambut",
            "Bedak",
            "Pembalut",
            "Sisir",
            "Bedak MBK",
            "Sendal",
            "Gunting rambut",
            "Bandana",
            "Minyak rambut",
            "Busa",
            "Selimut",
            "Bantal",
            "Sprey",
            "Taplak meja Kecil / Besar",
            "Alat Dapur (Belangan, Penggorengan, Panci, Ketel, Piring, Sendok Besar / Kecil, Garpu, Mangkuk, Sendok Makan Dll)"
        ];

        foreach ($needs as $item) {
            $dorkas->needs()->create([
                'item' => $item,
                'description' => null
            ]);
        }

        $this->command->info('Kebutuhan Panti Dorkas (ID 1) berhasil ditambahkan ke tabel `needs`!');
    }
}