

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Inventaris: {{ $orphanage->name }}</h1>

    <form action="{{ route('admin.orphanages.inventories.store', $orphanage) }}" method="POST">
        @csrf
        <div class="bg-white p-6 rounded shadow space-y-4">
            <div>
                <label>Lokasi / Ruangan</label>
                <input type="text" name="location" class="w-full border rounded p-2 mt-1" required>
            </div>
            <div>
                <label>Nama Barang</label>
                <input type="text" name="item_name" class="w-full border rounded p-2 mt-1" required>
            </div>
            <div>
                <label>Jumlah</label>
                <input type="text" name="quantity" class="w-full border rounded p-2 mt-1" placeholder="3 UNIT" required>
            </div>
            <div>
                <label>Asal Barang</label>
                <input type="text" name="source" class="w-full border rounded p-2 mt-1" required>
            </div>
            <div>
                <label>Nilai (Rp)</label>
                <input type="number" name="value" class="w-full border rounded p-2 mt-1">
            </div>
            <div>
                <label>Kondisi</label>
                <select name="condition" class="w-full border rounded p-2 mt-1" required>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>
            </div>
            <div>
                <label>Catatan</label>
                <textarea name="note" class="w-full border rounded p-2 mt-1" rows="3"></textarea>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('admin.orphanages.inventories.index', $orphanage) }}" class="text-gray-600">Batal</a>
            </div>
        </div>
    </form>
</div>
