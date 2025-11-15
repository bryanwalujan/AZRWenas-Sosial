<div>
    <label>Lokasi / Ruangan</label>
    <input type="text" name="location" value="{{ old('location', $inventory->location ?? '') }}" class="w-full border rounded p-2 mt-1" required>
    @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label>Nama Barang</label>
    <input type="text" name="item_name" value="{{ old('item_name', $inventory->item_name ?? '') }}" class="w-full border rounded p-2 mt-1" required>
    @error('item_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label>Jumlah</label>
    <input type="text" name="quantity" value="{{ old('quantity', $inventory->quantity ?? '') }}" class="w-full border rounded p-2 mt-1" placeholder="3 UNIT" required>
    @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label>Asal Barang</label>
    <input type="text" name="source" value="{{ old('source', $inventory->source ?? '') }}" class="w-full border rounded p-2 mt-1" required>
    @error('source') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label>Nilai (Rp)</label>
    <input type="number" name="value" value="{{ old('value', $inventory->value ?? '') }}" class="w-full border rounded p-2 mt-1">
    @error('value') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label>Kondisi</label>
    <select name="condition" class="w-full border rounded p-2 mt-1" required>
        <option value="baik" {{ old('condition', $inventory->condition ?? '') == 'baik' ? 'selected' : '' }}>Baik</option>
        <option value="rusak" {{ old('condition', $inventory->condition ?? '') == 'rusak' ? 'selected' : '' }}>Rusak</option>
    </select>
</div>

<div>
    <label>Foto Barang</label>
    @if(isset($inventory) && $inventory->photo)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $inventory->photo) }}" class="w-32 h-32 object-cover rounded">
            <button type="button" onclick="deletePhoto({{ $inventory->id }})" class="text-red-600 text-sm">Hapus Foto</button>
        </div>
    @endif
    <input type="file" name="photo" class="w-full border rounded p-2 mt-1">
    @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div>
    <label>Catatan</label>
    <textarea name="note" class="w-full border rounded p-2 mt-1" rows="3">{{ old('note', $inventory->note ?? '') }}</textarea>
</div>