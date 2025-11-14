<div class="overflow-x-auto">
    <table class="min-w-full table-auto border">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-2 text-left">Nama</th>
                <th class="px-4 py-2 text-center">Umur<br>(thn)</th>
                <th class="px-4 py-2">Jenis Kelamin</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Pendidikan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orphanage->children as $child)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $child->name }}</td>
                <td class="px-4 py-2 text-center">
                    {{ \Carbon\Carbon::parse($child->birth_date)->age }}
                </td>
                <td class="px-4 py-2">{{ $child->gender == 'LAKI-LAKI' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td class="px-4 py-2">{{ ucwords(strtolower(str_replace('_', ' ', $child->status))) }}</td>
                <td class="px-4 py-2">{{ $child->education_level }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>