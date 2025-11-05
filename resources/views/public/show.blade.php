@section('title', $orphanage->name)

@section('content')
<div class="container mx-auto p-6 max-w-5xl">
    <a href="{{ route('home') }}" class="text-blue-600 text-sm hover:underline mb-4 inline-block">
        ← Kembali ke Daftar Panti
    </a>

    <!-- Header -->
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="flex-shrink-0">
                @if($orphanage->photo)
                    <img src="{{ asset('storage/' . $orphanage->photo) }}" 
                         class="w-32 h-32 object-cover rounded-full border-4 border-blue-100">
                @else
                    <div class="bg-gray-200 border-4 border-dashed rounded-full w-32 h-32"></div>
                @endif
            </div>
            <div class="text-center md:text-left">
                <h1 class="text-3xl font-bold text-gray-800">{{ $orphanage->name }}</h1>
                <p class="text-gray-600">{{ $orphanage->location }}</p>
                <p class="text-sm text-gray-500 mt-1">Didirikan tahun {{ $orphanage->founded_year }}</p>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="border-b">
            <div class="flex flex-wrap -mb-px">
                <button onclick="openTab('profil')" class="tab-btn active px-4 py-3">Profil</button>
                <button onclick="openTab('anak')" class="tab-btn px-4 py-3">Anak ({{ $orphanage->children->count() }})</button>
                <button onclick="openTab('kebutuhan')" class="tab-btn px-4 py-3">Kebutuhan ({{ $orphanage->needs->count() }})</button>
                <button onclick="openTab('inventaris')" class="tab-btn px-4 py-3">Inventaris ({{ $orphanage->inventories->count() }})</button>
                <button onclick="openTab('kontak')" class="tab-btn px-4 py-3">Kontak & Donasi</button>
            </div>
        </div>

        <!-- TAB PROFIL -->
        <div id="profil" class="tab-content p-6">
            @include('public.partials.profil')
        </div>

        <!-- TAB ANAK -->
        <div id="anak" class="tab-content p-6 hidden">
            @include('public.partials.anak')
        </div>

        <!-- TAB KEBUTUHAN -->
        <div id="kebutuhan" class="tab-content p-6 hidden">
            @include('public.partials.kebutuhan')
        </div>

        <!-- TAB INVENTARIS -->
        <div id="inventaris" class="tab-content p-6 hidden">
            @include('public.partials.inventaris')
        </div>

        <!-- TAB KONTAK -->
        <div id="kontak" class="tab-content p-6 hidden">
            @include('public.partials.kontak')
        </div>
    </div>
</div>

<script>
function openTab(tabName) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.getElementById(tabName).classList.remove('hidden');
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active', 'border-blue-600', 'text-blue-600');
        btn.classList.add('text-gray-600', 'border-transparent');
    });
    document.querySelector(`[onclick="openTab('${tabName}')"]`).classList.add('active', 'border-blue-600', 'text-blue-600');
    document.querySelector(`[onclick="openTab('${tabName}')"]`).classList.remove('text-gray-600', 'border-transparent');
}
</script>

<style>
.tab-btn {
    @apply text-gray-600 border-b-2 border-transparent font-medium transition;
}
.tab-btn.active {
    @apply text-blue-600 border-blue-600;
}
</style>
