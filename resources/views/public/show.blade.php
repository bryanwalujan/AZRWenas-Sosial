<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $orphanage->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6a11cb',
                        secondary: '#2575fc',
                        success: '#10b981',
                        warning: '#f59e0b',
                        danger: '#ef4444',
                        info: '#3b82f6',
                        purple: {
                            50: '#faf5ff',
                            100: '#f3e8ff',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7c3aed'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .card-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .tab-btn {
            @apply text-gray-600 border-b-2 border-transparent transition-all duration-200 hover:text-purple-600 hover:border-purple-400;
        }
        .tab-btn.active {
            @apply text-purple-600 border-purple-600 bg-purple-50 font-semibold;
        }
        
        .stat-badge {
            @apply inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium;
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .floating-action {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 50;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .photo-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40%;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 text-white hover:text-purple-200 transition-colors duration-300">
                        <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                            <i class="fas fa-arrow-left text-lg"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold">Detail Panti Asuhan</h1>
                            <p class="text-sm text-blue-100">Informasi lengkap {{ $orphanage->name }}</p>
                        </div>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center space-x-2 bg-white bg-opacity-20 px-3 py-1 rounded-full">
                        <i class="fas fa-user-circle"></i>
                        <span>Pengunjung</span>
                    </div>
                    <a href="#" 
                       class="flex items-center space-x-2 bg-white bg-opacity-20 hover:bg-opacity-30 px-3 py-2 rounded-lg transition-all duration-300">
                        <i class="fas fa-share-alt"></i>
                        <span class="hidden md:inline">Bagikan</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8 max-w-6xl">
        <!-- HERO HEADER DENGAN FOTO BESAR -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8 border border-purple-100 card-hover fade-in">
            <div class="relative h-64 md:h-80 bg-gradient-to-br from-purple-100 to-blue-100">
                @if($orphanage->photo)
                    <img src="{{ asset('storage/' . $orphanage->photo) }}" 
                         class="w-full h-full object-cover" alt="Foto {{ $orphanage->name }}">
                    <div class="photo-overlay"></div>
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <img src="{{ asset('images/logo-gmim.png') }}" 
                             alt="Logo GMIM" class="w-48 h-48 rounded-full shadow-lg border-8 border-white pulse">
                    </div>
                @endif
                
                <!-- Badge Jumlah Anak -->
                <div class="absolute top-4 right-4 bg-white bg-opacity-90 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg">
                    <div class="flex items-center gap-2">
                        <div class="bg-purple-100 text-purple-600 p-1 rounded-full">
                            <i class="fas fa-child text-sm"></i>
                        </div>
                        <span class="font-bold text-gray-800">{{ $orphanage->children->count() }}</span>
                        <span class="text-gray-600 text-sm">Anak</span>
                    </div>
                </div>
            </div>

            <!-- Info Panti -->
            <div class="p-6 md:p-8">
                <div class="flex flex-col md:flex-row justify-between items-start gap-6">
                    <div class="flex-1">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">
                            {{ $orphanage->name }}
                        </h1>
                        <p class="text-lg text-purple-600 flex items-center gap-2 mb-4">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $orphanage->location }}
                        </p>
                        <div class="flex flex-wrap gap-3 mt-3">
                            <span class="stat-badge bg-green-100 text-green-700">
                                <i class="fas fa-child"></i>
                                {{ $orphanage->children->count() }} Anak
                            </span>
                            <span class="stat-badge bg-blue-100 text-blue-700">
                                <i class="fas fa-calendar-alt"></i>
                                Didirikan {{ $orphanage->founded_year ?? '—' }}
                            </span>
                            <span class="stat-badge bg-amber-100 text-amber-700">
                                <i class="fas fa-hands-helping"></i>
                                {{ $orphanage->needs->count() }} Kebutuhan
                            </span>
                        </div>
                    </div>

                    <!-- Badge Kategori -->
                    <div class="flex flex-wrap gap-2">
                        @foreach($orphanage->categories ?? [] as $cat)
                        <span class="px-3 py-2 bg-purple-100 text-purple-700 text-sm font-medium rounded-lg flex items-center gap-1">
                            <i class="fas fa-tag text-xs"></i>
                            {{ ucfirst($cat) }}
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- TABS -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 fade-in" style="animation-delay: 0.1s;">
            <div class="border-b border-gray-200">
                <div class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <button onclick="openTab('profil')" class="tab-btn active flex-1 md:flex-none px-6 py-4 flex items-center justify-center gap-2">
                        <i class="fas fa-info-circle"></i>
                        Profil
                    </button>
                    <button onclick="openTab('anak')" class="tab-btn flex-1 md:flex-none px-6 py-4 flex items-center justify-center gap-2">
                        <i class="fas fa-child"></i>
                        Anak ({{ $orphanage->children->count() }})
                    </button>
                    <button onclick="openTab('kebutuhan')" class="tab-btn flex-1 md:flex-none px-6 py-4 flex items-center justify-center gap-2">
                        <i class="fas fa-hands-helping"></i>
                        Kebutuhan ({{ $orphanage->needs->count() }})
                    </button>
                    <button onclick="openTab('inventaris')" class="tab-btn flex-1 md:flex-none px-6 py-4 flex items-center justify-center gap-2">
                        <i class="fas fa-boxes"></i>
                        Inventaris ({{ $orphanage->inventories->count() }})
                    </button>
                    <button onclick="openTab('kontak')" class="tab-btn flex-1 md:flex-none px-6 py-4 flex items-center justify-center gap-2">
                        <i class="fas fa-phone-alt"></i>
                        Kontak & Donasi
                    </button>
                </div>
            </div>

            <!-- TAB CONTENT -->
            <div id="profil" class="tab-content p-6 md:p-8">
                @include('public.partials.profil')
            </div>
            <div id="anak" class="tab-content p-6 md:p-8 hidden">
                @include('public.partials.anak')
            </div>
            <div id="kebutuhan" class="tab-content p-6 md:p-8 hidden">
                @include('public.partials.kebutuhan')
            </div>
            <div id="inventaris" class="tab-content p-6 md:p-8 hidden">
                @include('public.partials.inventaris')
            </div>
            <div id="kontak" class="tab-content p-6 md:p-8 hidden">
                @include('public.partials.kontak')
            </div>
        </div>
    </main>

    <!-- Floating Action Button -->
    <div class="floating-action">
        <a href="#" class="bg-gradient-to-r from-purple-600 to-blue-600 text-white p-4 rounded-full shadow-lg flex items-center justify-center hover:from-purple-700 hover:to-blue-700 transition-all duration-300 pulse">
            <i class="fas fa-donate text-xl"></i>
            <span class="ml-2 font-semibold hidden md:inline">Donasi Sekarang</span>
        </a>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="container mx-auto px-6 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-600 text-sm mb-2 md:mb-0 flex items-center gap-2">
                    <i class="fas fa-heart text-red-500"></i>
                    &copy; {{ date('Y') }} Sistem Manajemen Panti Asuhan
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-500 hover:text-blue-600 transition-colors duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-blue-400 transition-colors duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-red-600 transition-colors duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function openTab(tabName) {
            // Sembunyikan semua konten tab
            document.querySelectorAll('.tab-content').forEach(el => {
                el.classList.add('hidden');
            });
            
            // Tampilkan tab yang dipilih
            document.getElementById(tabName).classList.remove('hidden');
            
            // Hapus status aktif dari semua tombol tab
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active', 'text-purple-600', 'border-purple-600', 'bg-purple-50');
                btn.classList.add('text-gray-600', 'border-transparent');
            });
            
            // Tambahkan status aktif ke tombol tab yang diklik
            const activeBtn = document.querySelector(`[onclick="openTab('${tabName}')"]`);
            activeBtn.classList.add('active', 'text-purple-600', 'border-purple-600', 'bg-purple-50');
            activeBtn.classList.remove('text-gray-600', 'border-transparent');
        }

        // Buka tab pertama saat load
        document.addEventListener('DOMContentLoaded', () => {
            openTab('profil');
            
            // Animasi untuk elemen yang muncul
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>