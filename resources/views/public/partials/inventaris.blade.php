<div class="overflow-x-auto">
    <table class="min-w-full table-auto border">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left">Ruangan</th>
                <th class="px-4 py-2 text-left">Barang</th>
                <th class="px-4 py-2 text-center">Jumlah</th>
                <th class="px-4 py-2">Asal</th>
                <th class="px-4 py-2 text-right">Nilai</th>
                <th class="px-4 py-2">Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orphanage->inventories as $inv)
            <tr class="border-t">
                <td class="px-4 py-2 text-sm">{{ $inv->location }}</td>
                <td class="px-4 py-2 font-medium">{{ $inv->item_name }}</td>
                <td class="px-4 py-2 text-center">{{ $inv->quantity }}</td>
                <td class="px-4 py-2 text-sm">{{ $inv->source }}</td>
                <td class="px-4 py-2 text-right text-sm">Rp {{ number_format($inv->value) }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 text-xs rounded-full {{ $inv->condition == 'baik' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ ucfirst($inv->condition) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>