<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Panti Asuhan - Dashboard Admin</title>
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
        
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .action-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .action-btn i {
            margin-right: 0.5rem;
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
                    <a href="{{ route('logout') }}" 
                       class="flex items-center space-x-2 bg-white bg-opacity-20 hover:bg-opacity-30 px-3 py-2 rounded-lg transition-all duration-300">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden md:inline">Keluar</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Page Header -->
        <div class="mb-8 fade-in">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-home mr-3 text-primary"></i>
                        Kelola Panti Asuhan
                    </h1>
                    <p class="text-gray-600 mt-2">Kelola semua data panti asuhan dalam sistem</p>
                </div>
                <a href="{{ route('admin.orphanages.create') }}" 
                   class="mt-4 md:mt-0 flex items-center action-btn bg-success text-white hover:bg-green-700">
                    <i class="fas fa-plus-circle"></i>
                    <span>Tambah Panti</span>
                </a>
            </div>
            
            <!-- Stats Summary -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="bg-blue-100 text-blue-600 p-3 rounded-lg mr-4">
                            <i class="fas fa-home"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total Panti</p>
                            <p class="text-xl font-bold text-gray-800">{{ $orphanages->count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="bg-green-100 text-green-600 p-3 rounded-lg mr-4">
                            <i class="fas fa-child"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total Anak</p>
                            <p class="text-xl font-bold text-gray-800">{{ \App\Models\Child::count() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center">
                        <div class="bg-orange-100 text-orange-600 p-3 rounded-lg mr-4">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total Kebutuhan</p>
                            <p class="text-xl font-bold text-gray-800">{{ \App\Models\Need::count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orphanages List -->
        <div class="space-y-6">
            @forelse($orphanages as $panti)
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover fade-in">
                <div class="gradient-bg px-6 py-4">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                        <div class="flex items-center">
                            <div class="bg-white bg-opacity-20 p-2 rounded-lg mr-3">
                                <i class="fas fa-home"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ $panti->name }}</h3>
                                <p class="text-blue-100 text-sm flex items-center mt-1">
                                    <i class="fas fa-map-marker-alt mr-1 text-xs"></i>
                                    {{ $panti->location }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 md:mt-0">
                            <span class="badge bg-white bg-opacity-20 text-white">
                                <i class="fas fa-child mr-1"></i>
                                {{ $panti->children->count() }} anak
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <a href="{{ route('panti.show', $panti) }}" target="_blank" 
                           class="action-btn bg-indigo-50 text-indigo-600 hover:bg-indigo-100">
                            <i class="fas fa-external-link-alt"></i>
                            <span>Lihat Publik</span>
                        </a>
                        
                        <a href="{{ route('admin.orphanages.children.index', $panti) }}" 
                           class="action-btn bg-green-50 text-green-600 hover:bg-green-100">
                            <i class="fas fa-child"></i>
                            <span>Anak ({{ $panti->children->count() }})</span>
                        </a>
                        
                        <a href="{{ route('admin.orphanages.inventories.index', $panti) }}" 
                           class="action-btn bg-purple-50 text-purple-600 hover:bg-purple-100">
                            <i class="fas fa-boxes"></i>
                            <span>Inventaris</span>
                        </a>
                        
                        <a href="{{ route('admin.orphanages.edit', $panti) }}" 
                           class="action-btn bg-blue-50 text-blue-600 hover:bg-blue-100">
                            <i class="fas fa-edit"></i>
                            <span>Edit Panti</span>
                        </a>
                        
                        <a href="{{ route('admin.orphanages.needs.index', $panti) }}" 
                           class="action-btn bg-orange-50 text-orange-600 hover:bg-orange-100">
                            <i class="fas fa-hands-helping"></i>
                            <span>Kebutuhan ({{ $panti->needs->count() }})</span>
                        </a>
                        
                        <form action="{{ route('admin.orphanages.destroy', $panti) }}" method="POST" class="inline"
                              onsubmit="return confirm('Yakin hapus {{ addslashes($panti->name) }}?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="action-btn bg-red-50 text-red-600 hover:bg-red-100">
                                <i class="fas fa-trash-alt"></i>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </div>
                    
                    <!-- Needs Section -->
                    @if($panti->needs->count() > 0)
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <p class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-hands-helping mr-2 text-orange-500"></i>
                            Kebutuhan Panti:
                        </p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($panti->needs->take(5) as $need)
                            <span class="badge bg-orange-100 text-orange-800">
                                <i class="fas fa-circle text-xs mr-1"></i>
                                {{ Str::limit($need->item, 30) }}
                            </span>
                            @endforeach
                            @if($panti->needs->count() > 5)
                            <span class="badge bg-gray-100 text-gray-600">
                                +{{ $panti->needs->count() - 5 }} lainnya
                            </span>
                            @endif
                        </div>
                    </div>
                    @else
                    <div class="mt-4 pt-4 border-t border-gray-100 text-center py-3">
                        <i class="fas fa-hands-helping text-2xl text-gray-300 mb-2"></i>
                        <p class="text-gray-500 text-sm">Belum ada daftar kebutuhan.</p>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="bg-white rounded-xl shadow-md overflow-hidden text-center py-12 fade-in">
                <i class="fas fa-home text-5xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada panti asuhan</h3>
                <p class="text-gray-500 mb-6">Mulai dengan menambahkan panti asuhan pertama Anda</p>
                <a href="{{ route('admin.orphanages.create') }}" 
                   class="inline-flex items-center action-btn bg-success text-white hover:bg-green-700">
                    <i class="fas fa-plus-circle"></i>
                    <span>Tambah Panti Pertama</span>
                </a>
            </div>
            @endforelse
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
            // Menambahkan efek stagger untuk kartu
            const cards = document.querySelectorAll('.fade-in');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Efek hover untuk semua kartu
            const hoverCards = document.querySelectorAll('.card-hover');
            hoverCards.forEach(card => {
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