<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AZRWenas Sosial - Panti Asuhan</title>
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
                        azr: {
                            blue: '#1e40af',
                            purple: '#7c3aed',
                            teal: '#0d9488'
                        }
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
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
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #7c3aed 50%, #0d9488 100%);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 10px); }
            100% { transform: translate(0, -0px); }
        }
        
        .shine-effect {
            position: relative;
            overflow: hidden;
        }
        
        .shine-effect::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
            transition: all 0.6s;
            opacity: 0;
        }
        
        .shine-effect:hover::after {
            opacity: 1;
            top: -20%;
            left: -20%;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen font-inter">

    <!-- HERO HEADER -->
    <div class="hero-gradient text-white shadow-lg">
        <div class="container mx-auto px-6 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        
                        <img src="{{ asset('images/logo-gmim.png') }}" alt="GMIM" class="relative" style="width: 120px; height: auto;">
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold">AZRWenas Sosial</h1>
                        <p class="text-sm text-blue-100 mt-1">Yayasan Ds. A. Z. R. Wenas Bidang Sosial</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- STATISTIK PANTI -->
    <div class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-2xl shadow-md card-hover fade-in">
                <div class="stat-icon bg-blue-100 text-blue-600">
                    <i class="fas fa-home"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Panti Asuhan</h3>
                <p class="text-3xl font-bold text-blue-600 mb-4">{{ $orphanages->count() }}</p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span class="text-sm">Panti yang terdaftar</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md card-hover fade-in" style="animation-delay: 0.1s;">
                <div class="stat-icon bg-green-100 text-green-600">
                    <i class="fas fa-child"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Anak</h3>
                <p class="text-3xl font-bold text-green-600 mb-4">
                    {{ $orphanages->sum(function($orphanage) { return $orphanage->children->count(); }) }}
                </p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-heart mr-2"></i>
                    <span class="text-sm">Anak yang kami bantu</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md card-hover fade-in" style="animation-delay: 0.2s;">
                <div class="stat-icon bg-purple-100 text-purple-600">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Tahun Berdiri</h3>
                <p class="text-3xl font-bold text-purple-600 mb-4">
                    1934
                </p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-history mr-2"></i>
                    <span class="text-sm">Tahun berdiri pertama</span>
                </div>
            </div>
        </div>
    </div>

    <!-- DAFTAR PANTI -->
    <div class="container mx-auto px-6 pb-12">
        <div class="text-center mb-12 fade-in">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Panti Sosial Kami</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Mendukung anak-anak berkebutuhan khusus menuju kehidupan yang mandiri dan bermartabat.
            </p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($orphanages as $panti)
            <div class="group fade-in" style="animation-delay: {{ $loop->index * 0.1 }}s">
                <a href="{{ route('panti.show', $panti->id) }}" 
                   class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border border-gray-100 shine-effect">

                    <!-- FOTO -->
                    <div class="relative h-56 overflow-hidden">
                        @if($panti->photo)
                            <img src="{{ asset('storage/' . $panti->photo) }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                 alt="{{ $panti->name }}">
                        @else
                            <div class="bg-gradient-to-br from-purple-200 to-blue-200 w-full h-full flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-20 h-20 mx-auto mb-3 bg-white bg-opacity-50 rounded-full flex items-center justify-center">
                                        <i class="fas fa-home text-3xl text-purple-600"></i>
                                    </div>
                                    <p class="text-purple-700 font-medium">Panti Sosial</p>
                                </div>
                            </div>
                        @endif

                        <!-- BADGE ANAK -->
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold shadow-lg flex items-center gap-1">
                            <i class="fas fa-child"></i>
                            {{ $panti->children->count() }} Anak
                        </div>
                        
                        <!-- OVERLAY GRADIENT -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- KONTEN -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2">
                            {{ $panti->name }}
                        </h3>
                        <p class="text-sm text-gray-600 flex items-center gap-2 mb-3">
                            <i class="fas fa-map-marker-alt text-purple-600"></i>
                            {{ Str::limit($panti->location, 60) }}
                        </p>

                        <!-- KATEGORI BADGE -->
                        <div class="flex flex-wrap gap-2 mb-4">
                           @foreach($panti->categories ?? [] as $cat)
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded-full">
                                <i class="fas fa-tag mr-1 text-xs"></i>
                                {{ ucfirst($cat) }}
                            </span>
                            @endforeach
                        </div>

                        <!-- CTA -->
                        <div class="flex items-center justify-between">
                            <span class="text-blue-600 font-medium text-sm flex items-center gap-1 group-hover:text-blue-800 transition-colors">
                                Lihat Detail
                                <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                            </span>
                            <div class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ $panti->founded_year ?? '—' }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-12 fade-in">
                <div class="bg-white rounded-2xl shadow-sm p-8 max-w-md mx-auto">
                    <div class="w-20 h-20 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-home text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada data panti asuhan</h3>
                    <p class="text-gray-500">Data panti asuhan akan ditampilkan di sini setelah tersedia.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <!-- CALL TO ACTION -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-12 mt-12">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Ingin Berkontribusi?</h2>
            <p class="text-lg text-blue-100 max-w-2xl mx-auto mb-6">
                Bergabunglah dengan kami dalam memberikan dukungan dan kasih sayang kepada anak-anak yang membutuhkan.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-hand-holding-heart"></i>
                    Donasi Sekarang
                </a>
                <a href="#" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-user-plus"></i>
                    Jadi Relawan
                </a>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left mb-4 md:mb-0">
                    <h3 class="text-lg font-bold mb-2">AZRWenas Sosial</h3>
                    <p class="text-sm text-gray-400">Yayasan GMIM Ds. A.Z.R. Wenas Unit Sosial</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <i class="fab fa-youtube text-lg"></i>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} AZRWenas Sosial. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Menambahkan efek stagger untuk kartu
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Efek hover untuk semua kartu
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>