<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebutuhan - {{ $orphanage->name }}</title>
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
        
        .gradient-bg {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        
        .table-row-hover:hover {
            background-color: #f8fafc;
            transform: scale(1.01);
            transition: all 0.2s ease;
        }
        
        .empty-state {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
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
                        <i class="fas fa-hands-helping text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">Manajemen Kebutuhan</h1>
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
        <!-- Breadcrumb -->
        <nav class="flex mb-6 fade-in" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.orphanages.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <i class="fas fa-home mr-2"></i>
                        Daftar Panti
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Kebutuhan {{ $orphanage->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 fade-in">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-hands-helping text-primary mr-3"></i>
                    Daftar Kebutuhan
                </h1>
                <p class="text-gray-600 mt-2">
                    <i class="fas fa-home mr-1"></i>
                    {{ $orphanage->name }} - {{ $orphanage->location }}
                </p>
            </div>
            <a href="{{ route('admin.orphanages.needs.create', $orphanage) }}"
               class="mt-4 md:mt-0 flex items-center bg-gradient-to-r from-green-500 to-green-600 text-white px-5 py-3 rounded-lg font-medium hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-md card-hover">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Kebutuhan
            </a>
        </div>

        <!-- Stats Card -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in">
                <div class="stat-icon bg-blue-100 text-blue-600">
                    <i class="fas fa-list"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Kebutuhan</h3>
                <p class="text-3xl font-bold text-blue-600 mb-4">{{ $needs->count() }}</p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span class="text-sm">Kebutuhan tercatat</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.1s;">
                <div class="stat-icon bg-green-100 text-green-600">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Status Aktif</h3>
                <p class="text-3xl font-bold text-green-600 mb-4">{{ $needs->count() }}</p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-clock mr-2"></i>
                    <span class="text-sm">Semua kebutuhan aktif</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.2s;">
                <div class="stat-icon bg-orange-100 text-orange-600">
                    <i class="fas fa-child"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Anak Panti</h3>
                <p class="text-3xl font-bold text-orange-600 mb-4">{{ $orphanage->children->count() }}</p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-users mr-2"></i>
                    <span class="text-sm">Total anak di panti</span>
                </div>
            </div>
        </div>

        <!-- Alert -->
        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg shadow-sm fade-in">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-500 text-lg"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700 font-medium">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
        @endif

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.3s;">
            <div class="gradient-bg px-6 py-4">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-clipboard-list mr-2"></i>
                    Daftar Kebutuhan {{ $orphanage->name }}
                </h3>
            </div>
            
            @if($needs->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-hashtag mr-1"></i> No
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-box mr-1"></i> Kebutuhan
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-info-circle mr-1"></i> Keterangan
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-cogs mr-1"></i> Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($needs as $index => $need)
                        <tr class="table-row-hover">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $loop->iteration }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                        <i class="fas fa-box-open"></i>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">{{ $need->item }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600 max-w-md">
                                    {{ $need->description ?? '-' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-3">
                                    <a href="{{ route('admin.orphanages.needs.edit', [$orphanage, $need]) }}"
                                       class="flex items-center text-indigo-600 hover:text-indigo-900 transition-colors duration-300">
                                        <i class="fas fa-edit mr-1"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.orphanages.needs.destroy', [$orphanage, $need]) }}"
                                          method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                class="flex items-center text-red-600 hover:text-red-900 transition-colors duration-300"
                                                onclick="return confirm('Hapus {{ addslashes($need->item) }}?')">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <!-- Empty State -->
            <div class="empty-state p-12 text-center">
                <div class="max-w-md mx-auto">
                    <div class="bg-white bg-opacity-50 rounded-full p-4 inline-flex items-center justify-center mb-4">
                        <i class="fas fa-box-open text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-700 mb-2">Belum ada daftar kebutuhan</h3>
                    <p class="text-gray-500 mb-6">Mulai dengan menambahkan kebutuhan pertama untuk panti asuhan ini.</p>
                    <a href="{{ route('admin.orphanages.needs.create', $orphanage) }}" 
                       class="inline-flex items-center bg-gradient-to-r from-primary to-secondary text-white px-5 py-3 rounded-lg font-medium hover:opacity-90 transition-all duration-300 shadow-md">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Tambah Kebutuhan Pertama
                    </a>
                </div>
            </div>
            @endif
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
                        <i class="fas fa-arrow-left text-2xl mb-2"></i>
                        <span class="text-sm font-medium">Kembali</span>
                    </a>
                    
                    <a href="{{ route('admin.orphanages.needs.create', $orphanage) }}" 
                       class="flex flex-col items-center justify-center p-4 bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition-all duration-300 card-hover">
                        <i class="fas fa-plus-circle text-2xl mb-2"></i>
                        <span class="text-sm font-medium">Tambah</span>
                    </a>
                    
                    <a href="#" 
                       class="flex flex-col items-center justify-center p-4 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all duration-300 card-hover">
                        <i class="fas fa-print text-2xl mb-2"></i>
                        <span class="text-sm font-medium">Cetak</span>
                    </a>
                    
                    <a href="#" 
                       class="flex flex-col items-center justify-center p-4 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all duration-300 card-hover">
                        <i class="fas fa-share-alt text-2xl mb-2"></i>
                        <span class="text-sm font-medium">Bagikan</span>
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