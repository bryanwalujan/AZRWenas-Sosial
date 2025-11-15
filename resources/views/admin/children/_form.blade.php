{{-- resources/views/admin/children/_form.blade.php --}}

@php
    // Default $child jika tidak ada (untuk create)
    $child = $child ?? null;
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <!-- Nama -->
    <div>
        <label class="block font-medium mb-1">Nama Lengkap</label>
        <input type="text" name="name" value="{{ old('name', $child?->name ?? '') }}" 
               class="w-full border rounded px-3 py-2" required>
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Jenis Kelamin -->
    <div>
        <label class="block font-medium mb-1">Jenis Kelamin</label>
        <select name="gender" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih --</option>
            <option value="LAKI-LAKI" {{ old('gender', $child?->gender ?? '') == 'LAKI-LAKI' ? 'selected' : '' }}>Laki-laki</option>
            <option value="PEREMPUAN" {{ old('gender', $child?->gender ?? '') == 'PEREMPUAN' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Tempat Lahir -->
    <div>
        <label class="block font-medium mb-1">Tempat Lahir</label>
        <input type="text" name="birth_place" value="{{ old('birth_place', $child?->birth_place ?? '') }}" 
               class="w-full border rounded px-3 py-2" required>
        @error('birth_place') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Tanggal Lahir -->
    <div>
        <label class="block font-medium mb-1">Tanggal Lahir</label>
        <input type="date" name="birth_date" value="{{ old('birth_date', $child?->birth_date?->format('Y-m-d') ?? '') }}" 
               class="w-full border rounded px-3 py-2" required>
        @error('birth_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Pendidikan -->
    <div>
        <label class="block font-medium mb-1">Tingkat Pendidikan</label>
        <input type="text" name="education_level" value="{{ old('education_level', $child?->education_level ?? '') }}" 
               class="w-full border rounded px-3 py-2" required>
        @error('education_level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Status -->
    <div>
        <label class="block font-medium mb-1">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Pilih Status --</option>
            @foreach(['YATIM', 'PIATU', 'YATIM PIATU', 'TERLANTAR', 'EKONOMI LEMAH'] as $status)
                <option value="{{ $status }}" {{ old('status', $child?->status ?? '') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
        @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Dalam Panti -->
    <div class="col-span-2">
        <label class="flex items-center">
            <input type="checkbox" name="in_house" value="1" 
                   {{ old('in_house', $child?->in_house ?? false) ? 'checked' : '' }} class="mr-2">
            <span class="font-medium">Tinggal di Panti (In House)</span>
        </label>
        @error('in_house') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

</div>