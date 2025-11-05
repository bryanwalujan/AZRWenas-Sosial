@section('title', 'AZRWenas Sosial - Panti Asuhan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50">

    <!-- HERO HEADER -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/logo-gmim.png') }}" alt="GMIM" class="w-16 h-16 rounded-full shadow">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">AZRWenas Sosial</h1>
                        <p class="text-sm text-gray-600">Yayasan Ds. A. Z. R. Wenas Bidang Sosial</p>
                    </div>
                </div>
                <img src="{{ asset('images/logo-bartemeus.png') }}" alt="Bartemeus" class="w-20 h-20 rounded-full shadow-lg">
            </div>
        </div>
    </div>

    <!-- DAFTAR PANTI -->
    <div class="container mx-auto px-6 py-12">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Panti Sosial Kami</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Mendukung anak-anak berkebutuhan khusus menuju kehidupan yang mandiri dan bermartabat.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($orphanages as $panti)
            <div class="group">
                <a href="{{ route('panti.show', $panti->id) }}" 
                   class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border border-gray-100">

                    <!-- FOTO -->
                    <div class="relative h-56 overflow-hidden">
                        @if($panti->photo)
                            <img src="{{ asset('storage/' . $panti->photo) }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="bg-gradient-to-br from-purple-200 to-blue-200 w-full h-full flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-20 h-20 mx-auto mb-3 bg-white bg-opacity-50 rounded-full flex items-center justify-center">
                                        <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-purple-700 font-medium">Panti Sosial</p>
                                </div>
                            </div>
                        @endif

                        <!-- BADGE ANAK -->
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            {{ $panti->children->count() }} Anak
                        </div>
                    </div>

                    <!-- KONTEN -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2">
                            {{ $panti->name }}
                        </h3>
                        <p class="text-sm text-gray-600 flex items-center gap-2 mb-3">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            {{ Str::limit($panti->location, 60) }}
                        </p>

                        <!-- KATEGORI BADGE -->
                        <div class="flex flex-wrap gap-2 mb-4">
                           @foreach($panti->categories ?? [] as $cat)
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded-full">
                                {{ ucfirst($cat) }}
                            </span>
                            @endforeach
                        </div>

                        <!-- CTA -->
                        <div class="flex items-center justify-between">
                            <span class="text-blue-600 font-medium text-sm flex items-center gap-1">
                                Lihat Detail
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </span>
                            <div class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold">
                                Didirikan {{ $panti->founded_year ?? '—' }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada data panti asuhan.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-gray-800 text-white mt-20 py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-sm">© {{ date('Y') }} AZRWenas Sosial. All rights reserved.</p>
            <p class="text-xs mt-2 text-gray-400">Dikelola oleh Yayasan GMIM Ds. A.Z.R. Wenas Unit Sosial</p>
        </div>
    </footer>
</div>
