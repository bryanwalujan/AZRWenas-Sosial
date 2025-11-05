
@section('title', 'Edit Panti Asuhan')

@section('content')
<div class="card">
    <h2 style="margin-bottom:20px; color:#2c3e50; font-weight:600; font-size:1.5rem;">
        Edit Panti: {{ $orphanage->name }}
    </h2>

    <form method="POST" action="{{ route('admin.orphanages.update', $orphanage) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <!-- BARIS 1: Nama & Lokasi -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:15px;">
            <div>
                <label><strong>Nama Panti</strong></label>
                <input type="text" name="name" value="{{ old('name', $orphanage->name) }}" required 
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
                @error('name') <small style="color:red; display:block;">{{ $message }}</small> @enderror
            </div>
            <div>
                <label><strong>Lokasi</strong></label>
                <input type="text" name="location" value="{{ old('location', $orphanage->location) }}" required 
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
                @error('location') <small style="color:red; display:block;">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- BARIS 2: Foto & Tahun Berdiri -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:15px;">
            <div>
                <label><strong>Foto Panti</strong></label>
                @if($orphanage->photo)
                    <div style="margin-bottom:8px;">
                        <img src="{{ asset('storage/' . $orphanage->photo) }}" alt="Foto Panti" 
                             style="max-height:100px; border-radius:6px; border:1px solid #ddd;">
                        <p style="font-size:12px; color:#666; margin-top:4px;">Foto saat ini</p>
                    </div>
                @endif
                <input type="file" name="photo" accept="image/*"
                       style="width:100%; padding:8px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
                @error('photo') <small style="color:red; display:block;">{{ $message }}</small> @enderror
            </div>
            <div>
                <label><strong>Tahun Berdiri</strong></label>
                <input type="number" name="founded_year" value="{{ old('founded_year', $orphanage->founded_year) }}" min="1900" max="2099"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
                @error('founded_year') <small style="color:red; display:block;">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Alamat Lengkap -->
        <div style="margin-bottom:15px;">
            <label><strong>Alamat Lengkap</strong></label>
            <textarea name="address" rows="2" 
                      style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">{{ old('address', $orphanage->address) }}</textarea>
            @error('address') <small style="color:red; display:block;">{{ $message }}</small> @enderror
        </div>

        <!-- Kontak -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:15px;">
            <div>
                <label><strong>Telepon</strong></label>
                <input type="text" name="phone" value="{{ old('phone', $orphanage->phone) }}"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label><strong>Email</strong></label>
                <input type="email" name="email" value="{{ old('email', $orphanage->email) }}"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
        </div>

        <!-- Kapasitas & Jumlah Anak -->
        <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr; gap:10px; margin-bottom:15px;">
            <div>
                <label><strong>Kapasitas</strong></label>
                <input type="number" name="capacity" value="{{ old('capacity', $orphanage->capacity ?? 0) }}" min="0"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label><strong>Laki-laki (In House)</strong></label>
                <input type="number" name="in_house_male" value="{{ old('in_house_male', $orphanage->in_house_male ?? 0) }}" min="0"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label><strong>Perempuan (In House)</strong></label>
                <input type="number" name="in_house_female" value="{{ old('in_house_female', $orphanage->in_house_female ?? 0) }}" min="0"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label><strong>Jumlah Anak Saat Ini</strong></label>
                <input type="number" name="child_count" value="{{ old('child_count', $orphanage->child_count ?? 0) }}" min="0" required
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
                @error('child_count') <small style="color:red; display:block;">{{ $message }}</small> @enderror
            </div>
        </div>

        <!-- Anak Eksternal -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:15px;">
            <div>
                <label><strong>Laki-laki Eksternal</strong></label>
                <input type="number" name="external_male" value="{{ old('external_male', $orphanage->external_male ?? 0) }}" min="0"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label><strong>Perempuan Eksternal</strong></label>
                <input type="number" name="external_female" value="{{ old('external_female', $orphanage->external_female ?? 0) }}" min="0"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
        </div>

        <!-- JSON Arrays -->
        @php
            $arrayFields = [
                'needs' => $orphanage->needs,
                'facilities' => $orphanage->facilities,
                'categories' => $orphanage->categories,
                'target_service' => $orphanage->target_service,
                'legal_documents' => $orphanage->legal_documents,
            ];
        @endphp

        @foreach($arrayFields as $field => $value)
            <div style="margin-bottom:15px;">
                <label><strong>{{ ucwords(str_replace('_', ' ', $field)) }} (pisahkan dengan koma)</strong></label>
                <textarea name="{{ $field }}" rows="2" 
                          style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
{{ old($field) ? implode(', ', old($field)) : (is_array($value) ? implode(', ', $value) : $value) }}
                </textarea>
            </div>
        @endforeach

        <!-- Visi & Misi -->
        <div style="margin-bottom:15px;">
            <label><strong>Visi</strong></label>
            <textarea name="vision" rows="3" 
                      style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">{{ old('vision', $orphanage->vision) }}</textarea>
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>Misi</strong></label>
            <textarea name="mission" rows="3" 
                      style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">{{ old('mission', $orphanage->mission) }}</textarea>
        </div>

        <!-- Yayasan & Pengurus -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:15px;">
            <div>
                <label><strong>Nama Yayasan</strong></label>
                <input type="text" name="foundation_name" value="{{ old('foundation_name', $orphanage->foundation_name) }}"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label><strong>Pimpinan</strong></label>
                <input type="text" name="leader_name" value="{{ old('leader_name', $orphanage->leader_name) }}"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:15px;">
            <div>
                <label><strong>Telepon Pimpinan</strong></label>
                <input type="text" name="leader_phone" value="{{ old('leader_phone', $orphanage->leader_phone) }}"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label><strong>Sekretaris</strong></label>
                <input type="text" name="secretary_name" value="{{ old('secretary_name', $orphanage->secretary_name) }}"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:15px;">
            <div>
                <label><strong>Telepon Sekretaris</strong></label>
                <input type="text" name="secretary_phone" value="{{ old('secretary_phone', $orphanage->secretary_phone) }}"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label><strong>Bendahara</strong></label>
                <input type="text" name="treasurer_name" value="{{ old('treasurer_name', $orphanage->treasurer_name) }}"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:15px;">
            <div>
                <label><strong>Telepon Bendahara</strong></label>
                <input type="text" name="treasurer_phone" value="{{ old('treasurer_phone', $orphanage->treasurer_phone) }}"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
            <div>
                <label><strong>Luas Tanah (m²)</strong></label>
                <input type="number" name="land_area" value="{{ old('land_area', $orphanage->land_area) }}" step="0.01" min="0"
                       style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
            </div>
        </div>

        <div style="margin-bottom:15px;">
            <label><strong>Status Tanah</strong></label>
            <select name="land_status" 
                    style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">
                <option value="">-- Pilih Status --</option>
                <option value="Milik Sendiri" {{ old('land_status', $orphanage->land_status) == 'Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                <option value="Sewa" {{ old('land_status', $orphanage->land_status) == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                <option value="Hibah" {{ old('land_status', $orphanage->land_status) == 'Hibah' ? 'selected' : '' }}>Hibah</option>
            </select>
        </div>

        <!-- Sejarah & Deskripsi -->
        <div style="margin-bottom:15px;">
            <label><strong>Sejarah Singkat</strong></label>
            <textarea name="history" rows="4" 
                      style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">{{ old('history', $orphanage->history) }}</textarea>
        </div>

        <div style="margin-bottom:20px;">
            <label><strong>Deskripsi Singkat</strong></label>
            <textarea name="description" rows="3" required 
                      style="width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; font-size:14px;">{{ old('description', $orphanage->description) }}</textarea>
            @error('description') <small style="color:red; display:block;">{{ $message }}</small> @enderror
        </div>

        <!-- Tombol -->
        <div style="display:flex; gap:10px;">
            <button type="submit" class="btn btn-success" style="flex:1; font-weight:600; padding:12px;">
                Update Panti
            </button>
            <a href="{{ route('admin.orphanages.index') }}" class="btn btn-primary" style="flex:1; text-align:center; font-weight:600; padding:12px;">
                Batal
            </a>
        </div>
    </form>
</div>
