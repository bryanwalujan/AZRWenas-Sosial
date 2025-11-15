<div class="space-y-4">
    @forelse($orphanage->needs as $need)
    <div class="border rounded-lg p-4 hover:shadow">
        <h4 class="font-semibold text-gray-800">{{ $need->item }}</h4>
        @if($need->description)
            <p class="text-sm text-gray-600 mt-1">{{ $need->description }}</p>
        @endif
    </div>
    @empty
    <p class="text-gray-500 italic">Belum ada daftar kebutuhan.</p>
    @endforelse
</div>