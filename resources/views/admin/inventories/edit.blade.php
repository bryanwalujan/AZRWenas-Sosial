
@section('title', 'Edit Inventaris')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Inventaris: {{ $inventory->item_name }}</h1>
        <a href="{{ route('admin.orphanages.inventories.index', $orphanage) }}"
           class="text-gray-600 hover:text-gray-800 text-sm">
            Kembali
        </a>
    </div>

    <form action="{{ route('admin.orphanages.inventories.update', [$orphanage, $inventory]) }}"
          method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf @method('PUT')

        <!-- BARIS 1 -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-medium text-gray-700 mb-1">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $inventory->location) }}" required
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Nama Barang</label>
                <input type="text" name="item_name" value="{{ old('item_name', $inventory->item_name) }}" required
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('item_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- BARIS 2 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block font-medium text-gray-700 mb-1">Jumlah</label>
                <input type="text" name="quantity" value="{{ old('quantity', $inventory->quantity) }}" required
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Asal Barang</label>
                <input type="text" name="source" value="{{ old('source', $inventory->source) }}" required
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('source') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1">Nilai (Rp)</label>
                <input type="number" name="value" value="{{ old('value', $inventory->value) }}" min="0"
                       class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('value') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Kondisi -->
        <div class="mb-4">
            <label class="block font-medium text-gray-700 mb-1">Kondisi</label>
            <select name="condition" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="baik" {{ old('condition', $inventory->condition) == 'baik' ? 'selected' : '' }}>Baik</option>
                <option value="rusak" {{ old('condition', $inventory->condition) == 'rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
            @error('condition') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Foto -->
        <div class="mb-4">
            <label class="block font-medium text-gray-700 mb-1">Foto Barang</label>
            @if($inventory->photo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $inventory->photo) }}" alt="Foto Barang"
                         class="max-h-40 rounded border">
                    <p class="text-xs text-gray-600 mt-1">Foto saat ini</p>
                </div>
            @endif
            <input type="file" name="photo" accept="image/*"
                   class="w-full border rounded px-3 py-2 text-sm">
            @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Catatan -->
        <div class="mb-6">
            <label class="block font-medium text-gray-700 mb-1">Catatan (Opsional)</label>
            <textarea name="note" rows="3"
                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('note', $inventory->note) }}</textarea>
        </div>

        <!-- TOMBOL -->
        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded font-medium hover:bg-blue-700 transition">
                Update Inventaris
            </button>
            <a href="{{ route('admin.orphanages.inventories.index', $orphanage) }}"
               class="bg-gray-300 text-gray-700 px-5 py-2 rounded font-medium hover:bg-gray-400 transition">
                Batal
            </a>
        </div>
    </form>
</div>
