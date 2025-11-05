

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Inventaris: {{ $orphanage->name }}</h1>
        <a href="{{ route('admin.orphanages.inventories.create', $orphanage) }}"
           class="bg-green-600 text-white px-4 py-2 rounded font-medium hover:bg-green-700">
            + Tambah Barang
        </a>
    </div>

    <a href="{{ route('admin.orphanages.index') }}" class="text-blue-600 text-sm hover:underline">
        Kembali ke Daftar Panti
    </a>

    <!-- TABEL INVENTARIS -->
    <div class="mt-6 bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Lokasi</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Nama Barang</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Jumlah</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Asal</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Nilai</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Kondisi</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($inventories as $inv)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 text-sm">{{ $inv->location }}</td>
                    <td class="px-4 py-3 text-sm font-medium">{{ $inv->item_name }}</td>
                    <td class="px-4 py-3 text-sm text-center">{{ $inv->quantity }}</td>
                    <td class="px-4 py-3 text-sm">{{ $inv->source }}</td>
                    <td class="px-4 py-3 text-sm">Rp {{ number_format($inv->value ?? 0) }}</td>
                    <td class="px-4 py-3">
                        <span class="inline-block px-3 py-1 text-xs font-medium rounded-full
                            {{ $inv->condition == 'baik' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ ucfirst($inv->condition) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('admin.orphanages.inventories.edit', [$orphanage, $inv]) }}"
                           class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.orphanages.inventories.destroy', [$orphanage, $inv]) }}"
                              method="POST" class="inline ml-2">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium"
                                    onclick="return confirm('Hapus {{ addslashes($inv->item_name) }}?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                        Belum ada data inventaris.
                        <a href="{{ route('admin.orphanages.inventories.create', $orphanage) }}" class="text-blue-600 hover:underline">
                            Tambah sekarang
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $inventories->links() }}
    </div>
</div>
