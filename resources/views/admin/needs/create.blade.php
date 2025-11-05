
@section('title', 'Tambah Kebutuhan')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        Tambah Kebutuhan: {{ $orphanage->name }}
    </h1>

    <form action="{{ route('admin.orphanages.needs.store', $orphanage) }}" method="POST" class="bg-white p-6 rounded-lg shadow">
        @csrf
        <div class="mb-4">
            <label class="block font-medium text-gray-700 mb-1">Nama Kebutuhan</label>
            <input type="text" name="item" value="{{ old('item') }}" required
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('item') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label class="block font-medium text-gray-700 mb-1">Keterangan (Opsional)</label>
            <textarea name="description" rows="3"
                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-green-600 text-white px-5 py-2 rounded font-medium hover:bg-green-700">
                Simpan Kebutuhan
            </button>
            <a href="{{ route('admin.orphanages.needs.index', $orphanage) }}"
               class="bg-gray-300 text-gray-700 px-5 py-2 rounded font-medium hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>
