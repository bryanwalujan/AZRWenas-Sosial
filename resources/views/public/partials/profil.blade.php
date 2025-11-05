<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <p><strong>Alamat:</strong> {{ $orphanage->address }}</p>
        <p><strong>Telepon:</strong> <a href="tel:{{ $orphanage->phone }}" class="text-blue-600">{{ $orphanage->phone }}</a></p>
        <p><strong>Email:</strong> <a href="mailto:{{ $orphanage->email }}" class="text-blue-600">{{ $orphanage->email }}</a></p>
        <p><strong>Kapasitas:</strong> {{ $orphanage->capacity }} orang</p>
        <p><strong>Luas Tanah:</strong> {{ $orphanage->land_area ? number_format($orphanage->land_area) . ' m²' : '-' }} ({{ $orphanage->land_status }})</p>
    </div>
    <div>
        <p><strong>Visi:</strong> {{ $orphanage->vision }}</p>
        <p class="mt-3"><strong>Misi:</strong></p>
        <p class="text-sm whitespace-pre-line">{{ $orphanage->mission }}</p>
    </div>
</div>

<div class="mt-6">
    <p><strong>Sejarah:</strong></p>
    <p class="text-sm whitespace-pre-line">{{ $orphanage->history }}</p>
</div>

<div class="mt-6">
    <h3 class="font-bold text-lg">Pengurus</h3>
    <ul class="mt-2 space-y-1 text-sm">
        <li><strong>Kepala:</strong> {{ $orphanage->leader_name }} ({{ $orphanage->leader_phone }})</li>
        <li><strong>Sekretaris:</strong> {{ $orphanage->secretary_name }} ({{ $orphanage->secretary_phone }})</li>
        <li><strong>Bendahara:</strong> {{ $orphanage->treasurer_name }} ({{ $orphanage->treasurer_phone }})</li>
    </ul>
</div>