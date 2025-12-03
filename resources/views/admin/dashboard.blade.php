<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
                        info: '#3b82f6'
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
        
        .card-hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
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
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                        <i class="fas fa-user-shield text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">Dashboard Admin</h1>
                        <p class="text-sm text-blue-100">Sistem Manajemen Panti Asuhan</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center space-x-2 bg-white bg-opacity-20 px-3 py-1 rounded-full">
                        <i class="fas fa-user-circle"></i>
                        <span>Administrator</span>
                    </div>
                    <!-- Di bagian Quick Actions -->
<a href="{{ route('admin.profile') }}"
   class="flex flex-col items-center justify-center p-4 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-100 transition-all duration-300 card-hover">
    <i class="fas fa-user-cog text-2xl mb-2"></i>
    <span class="text-sm font-medium">Profil Saya</span>
</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
    @csrf
    <button type="submit" 
            class="flex items-center space-x-2 bg-white bg-opacity-20 hover:bg-opacity-30 px-3 py-2 rounded-lg transition-all duration-300">
        <i class="fas fa-sign-out-alt"></i>
        <span class="hidden md:inline">Keluar</span>
    </button>
</form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <div class="mb-8 fade-in">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
            <p class="text-gray-600 mt-2">Ringkasan data dan aktivitas terbaru</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in">
                <div class="stat-icon bg-blue-100 text-blue-600">
                    <i class="fas fa-home"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Panti Asuhan</h3>
                <p class="text-3xl font-bold text-blue-600 mb-4">{{ \App\Models\Orphanage::count() }}</p>
                <a href="{{ route('admin.orphanages.index') }}" 
                   class="flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300">
                    <span>Kelola Panti</span>
                    <i class="fas fa-arrow-right ml-2 text-sm"></i>
                </a>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.1s;">
                <div class="stat-icon bg-green-100 text-green-600">
                    <i class="fas fa-child"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Anak</h3>
                <p class="text-3xl font-bold text-green-600 mb-4">{{ \App\Models\Child::count() }}</p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span class="text-sm">Data anak terlindungi</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.2s;">
                <div class="stat-icon bg-orange-100 text-orange-600">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Kebutuhan</h3>
                <p class="text-3xl font-bold text-orange-600 mb-4">{{ \App\Models\Need::count() }}</p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-clock mr-2"></i>
                    <span class="text-sm">Perlu penanganan</span>
                </div>
            </div>
        </div>

        <!-- Recent Orphanages -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.3s;">
            <div class="gradient-bg px-6 py-4">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-history mr-2"></i>
                    Panti Terbaru
                </h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @forelse(\App\Models\Orphanage::latest()->limit(3)->get() as $panti)
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors duration-300">
                        <div class="flex items-center">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-4">
                                <i class="fas fa-home"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ $panti->name }}</p>
                                <p class="text-sm text-gray-600 flex items-center mt-1">
                                    <i class="fas fa-map-marker-alt mr-1 text-xs"></i>
                                    {{ $panti->location }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-gray-500 bg-white px-3 py-1 rounded-full">
                            <i class="fas fa-child mr-1"></i>
                            {{ $panti->children->count() }} anak
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <i class="fas fa-home text-4xl text-gray-300 mb-3"></i>
                        <p class="text-gray-500">Belum ada panti terdaftar.</p>
                    </div>
                    @endforelse
                </div>
                
                @if(\App\Models\Orphanage::count() > 3)
                <div class="mt-6 text-center">
                    <a href="{{ route('admin.orphanages.index') }}" 
                       class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300">
                        <span>Lihat Semua Panti</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.4s;">
            <div class="gradient-bg px-6 py-4">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-bolt mr-2"></i>
                    Akses Cepat
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('admin.orphanages.index') }}" 
                       class="flex flex-col items-center justify-center p-4 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all duration-300 card-hover">
                        <i class="fas fa-home text-2xl mb-2"></i>
                        <span class="text-sm font-medium">Kelola Panti</span>
                    </a>
                    
                    <a href="{{ route('admin.orphanages.create') }}" 
                       class="flex flex-col items-center justify-center p-4 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition-all duration-300 card-hover">
                        <i class="fas fa-plus-circle text-2xl mb-2"></i>
                        <span class="text-sm font-medium">Tambah Panti</span>
                    </a>
                    
                    <a href="#" 
                       class="flex flex-col items-center justify-center p-4 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all duration-300 card-hover">
                        <i class="fas fa-hands-helping text-2xl mb-2"></i>
                        <span class="text-sm font-medium">Kebutuhan</span>
                    </a>
                    
                    <a href="#" 
                       class="flex flex-col items-center justify-center p-4 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all duration-300 card-hover">
                        <i class="fas fa-chart-bar text-2xl mb-2"></i>
                        <span class="text-sm font-medium">Laporan</span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="container mx-auto px-6 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-600 text-sm mb-2 md:mb-0">
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
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Menambahkan efek stagger untuk kartu statistik
            const statCards = document.querySelectorAll('.fade-in');
            statCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
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