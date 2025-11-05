<?php

namespace Database\Seeders;

use App\Models\Orphanage;
use App\Models\OrphanageContact;
use App\Models\Need;
use Illuminate\Database\Seeder;

class BartemeusSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah sudah ada
        $bartemeus = Orphanage::where('name', 'Panti Sosial Disabilitas Netra GMIM Bartemeus Manado')->first();
        if ($bartemeus) {
            $this->command->info('Panti Bartemeus sudah ada!');
            return;
        }

        // Buat panti
        $panti = Orphanage::create([
            'name' => 'Panti Sosial Disabilitas Netra GMIM Bartemeus Manado',
            'location' => 'Jl. Tanah Putih Lingk. VI Kel. Malalayang 1 Timur, Kec. Malalayang, Kota Manado, Prov. Sulawesi Utara 95163',
            'child_count' => 15, // Jumlah penyandang disabilitas
            'description' => 'Panti Sosial Disabilitas Netra GMIM Bartemeus Manado adalah panti yang berada di bawah naungan Yayasan GMIM Ds. A.Z.R Wenas unit Sosial. Panti ini mengasuh para penyandang disabilitas netra bersama dengan para penyandang disabilitas lain.',
            'photo' => null,
            'founded_year' => '2004',
            'address' => 'Jl. Tanah Putih Lingk. VI Kel. Malalayang 1 Timur, Kec. Malalayang, Kota Manado, Prov. Sulawesi Utara 95163',
            'phone' => '085242883234',
            'email' => 'psdngmimbartemeus@gmail.com',
            'legal_documents' => 'Surat Keputusan Badan Pekerja Sinode GMIM nomor N.K.1866 H.B.H dan surat Badan Pengurus Yayasan Ds. A.Z.R. Wenas nomor 037/YDAZRW/2003',
            'vision' => 'Terwujudnya kehidupan penyandang disabilitas yang mandiri, berkualitas, berintegritas sesuai dengan potensinya.',
            'mission' => '1. Menjangkau penyandang disabilitas netra dan disabilitas lainnya yang berusia sekolah. 2. Meningkatkan dan memberdayakan penyandang disabilitas kearah hidup normatif secara fisik, mental, spiritual, dan sosial. 3. Memberikan pelayanan sosial bagi para penyandang disabilitas agar mampu hidup mandiri.',
            'target_service' => ['Penyandang disabilitas netra', 'Disabilitas fisik', 'Disabilitas mental'],
            'capacity' => 15,
            'in_house_male' => 8,
            'in_house_female' => 7,
            'external_male' => 0,
            'external_female' => 0,
            'foundation_name' => 'Yayasan GMIM Ds. A.Z.R Wenas Unit Sosial',
            'history' => 'Berdirinya panti ini berawal dari keberadaan siswa Sekolah Luar Biasa (SLB – A) Tuna Netra Bartemeus yang berasal dari beberapa desa di daerah Minahasa. Pada tahun 1980, SLB-A Bartemeus sudah berdiri. Pada tahun 2003, dibangun gedung asrama. Pada 24 Februari 2004, menjadi bagian dari unit pelayanan sosial Yayasan GMIM Ds. A.Z.R. Wenas. Serah terima jabatan kepala panti terakhir pada 10 September 2024.',
            'leader_name' => 'Pdt. Tirone Silvia Tumangkeng, M.Th',
            'leader_phone' => '085242883234',
            'secretary_name' => 'Peggy L. Tawas, SS',
            'secretary_phone' => '082191491821',
            'treasurer_name' => 'Gebby S. Walewangko',
            'treasurer_phone' => '08884740087',
            'land_area' => null,
            'land_status' => 'Milik GMIM',
            'facilities' => ['Asrama', 'Sekolah Luar Biasa', 'Kamar', 'Aula'],
            'categories' => ['Disabilitas Netra', 'Disabilitas Fisik', 'Disabilitas Mental'],
        ]);

        // KONTAK PENGURUS (OrphanageContact)
        $contacts = [
            ['contact_name' => 'Pdt. Tirone Silvia Tumangkeng, M.Th', 'phone' => '085242883234', 'role' => 'Kepala'],
            ['contact_name' => 'Peggy L. Tawas, SS', 'phone' => '082191491821', 'role' => 'Sekretaris'],
            ['contact_name' => 'Gebby S. Walewangko', 'phone' => '08884740087', 'role' => 'Bendahara'],
            ['contact_name' => 'Ibu Alwin Pangemanan Rumayar', 'phone' => null, 'role' => 'Juru Masak'],
            ['contact_name' => 'Pdt. Debby Punuh Rumengan, S.Th', 'phone' => null, 'role' => 'Kerohanian'],
            ['contact_name' => 'Frangklin Pirie', 'phone' => null, 'role' => 'Pembantu Umum'],
            ['contact_name' => 'Ns. Frenda Tumangkeng, S.Kep', 'phone' => null, 'role' => 'Kesehatan & Pengasuhan'],
        ];

        foreach ($contacts as $c) {
            $panti->contacts()->create([
                'contact_name' => $c['contact_name'],
                'phone' => $c['phone'],
                'role' => $c['role'],
            ]);
        }

        // KEBUTUHAN (tabel needs)
        $needs = [
            // Kebutuhan khusus disabilitas netra (dari profil)
            "Alat bantu visual (kaca mata khusus)",
            "Braille printer",
            "Buku braille",
            "Perangkat lunak screen reader",
            "Kursus orientasi & mobilitas",
            "Obat mata & perawatan kesehatan mata",
            "Transportasi ke sekolah khusus",
            "Beasiswa pendidikan disabilitas",
            "Peralatan dapur khusus",
            "Pakaian & sepatu nyaman",
        ];

        foreach ($needs as $item) {
            $panti->needs()->create(['item' => $item]);
        }

        $this->command->info('Panti Bartemeus (ID 2) berhasil ditambahkan dengan kontak & kebutuhan!');
    }
}