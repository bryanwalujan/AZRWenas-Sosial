<div class="bg-gradient-to-r from-blue-50 to-purple-50 p-6 rounded-lg">
    <h3 class="font-bold text-xl mb-4">Hubungi Kami</h3>
    <p class="text-sm"><strong>Email:</strong> <a href="mailto:{{ $orphanage->email }}" class="text-blue-600">{{ $orphanage->email }}</a></p>
    <p class="text-sm"><strong>Telepon:</strong> {{ $orphanage->phone }}</p>

    <h4 class="font-bold mt-5 mb-2">Rekening Donasi</h4>
    <div class="space-y-2 text-sm">
        <p><strong>BRI:</strong> 0688-01-000053-50-8</p>
        <p><strong>Bank SulutGo:</strong> 009.02.11.006561.5</p>
    </div>

    <div class="mt-5">
        <h4 class="font-bold mb-2">Pengurus</h4>
        @foreach($orphanage->contacts as $contact)
        <p class="text-sm">
            <strong>{{ $contact->role }}:</strong> {{ $contact->contact_name }}
            @if($contact->phone) 
                <span class="text-blue-600">({{ $contact->phone }})</span>
            @endif
        </p>
        @endforeach
    </div>
</div>