<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris - {{ $orphanage->name }}</title>
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
        
        .table-row-hover:hover {
            background-color: #f8fafc;
            transform: scale(1.01);
            transition: all 0.2s ease;
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
                        <i class="fas fa-boxes text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">Inventaris Panti</h1>
                        <p class="text-sm text-blue-100">Manajemen Barang & Aset</p>
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
        <div class="mb-6 fade-in">
            <nav class="flex" aria-label="Breadcrumb">
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Inventaris {{ $orphanage->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8 fade-in">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-boxes mr-3 text-primary"></i>
                    Inventaris: {{ $orphanage->name }}
                </h1>
                <p class="text-gray-600 mt-2">Kelola barang dan aset panti asuhan</p>
            </div>
            <a href="{{ route('admin.orphanages.inventories.create', $orphanage) }}"
               class="flex items-center bg-green-600 text-white px-5 py-3 rounded-lg font-medium hover:bg-green-700 transition-all duration-300 card-hover">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Barang
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in">
                <div class="stat-icon bg-blue-100 text-blue-600">
                    <i class="fas fa-box"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Barang</h3>
                <p class="text-3xl font-bold text-blue-600 mb-4">{{ $inventories->total() }}</p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-list mr-2"></i>
                    <span class="text-sm">Semua item inventaris</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.1s;">
                <div class="stat-icon bg-green-100 text-green-600">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Kondisi Baik</h3>
                <p class="text-3xl font-bold text-green-600 mb-4">
                    {{ $inventories->where('condition', 'baik')->count() }}
                </p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-thumbs-up mr-2"></i>
                    <span class="text-sm">Barang dalam kondisi baik</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.2s;">
                <div class="stat-icon bg-orange-100 text-orange-600">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Perlu Perbaikan</h3>
                <p class="text-3xl font-bold text-orange-600 mb-4">
                    {{ $inventories->where('condition', '!=', 'baik')->count() }}
                </p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-tools mr-2"></i>
                    <span class="text-sm">Butuh penanganan</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.3s;">
                <div class="stat-icon bg-purple-100 text-purple-600">
                    <i class="fas fa-coins"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Nilai</h3>
                <p class="text-3xl font-bold text-purple-600 mb-4">
                    Rp {{ number_format($inventories->sum('value') ?? 0) }}
                </p>
                <div class="flex items-center text-gray-500">
                    <i class="fas fa-chart-line mr-2"></i>
                    <span class="text-sm">Nilai total aset</span>
                </div>
            </div>
        </div>

        <!-- TABEL INVENTARIS -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.4s;">
            <div class="gradient-bg px-6 py-4">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-list-alt mr-2"></i>
                    Daftar Inventaris
                </h3>
            </div>
            
            @if($inventories->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-map-marker-alt mr-1"></i> Lokasi
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-box mr-1"></i> Nama Barang
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-hashtag mr-1"></i> Jumlah
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-gift mr-1"></i> Asal
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-money-bill-wave mr-1"></i> Nilai
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-stethoscope mr-1"></i> Kondisi
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <i class="fas fa-cogs mr-1"></i> Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($inventories as $inv)
                        <tr class="table-row-hover">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                                    <span class="text-sm font-medium text-gray-900">{{ $inv->location }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $inv->item_name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ $inv->quantity }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $inv->source }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                Rp {{ number_format($inv->value ?? 0) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($inv->condition == 'baik')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    {{ ucfirst($inv->condition) }}
                                </span>
                                @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    {{ ucfirst($inv->condition) }}
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-3">
                                    <a href="{{ route('admin.orphanages.inventories.edit', [$orphanage, $inv]) }}"
                                       class="text-indigo-600 hover:text-indigo-900 transition-colors duration-300"
                                       title="Edit Barang">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.orphanages.inventories.destroy', [$orphanage, $inv]) }}"
                                          method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 transition-colors duration-300"
                                                onclick="return confirm('Hapus {{ addslashes($inv->item_name) }}?')"
                                                title="Hapus Barang">
                                            <i class="fas fa-trash-alt"></i>
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
            <div class="text-center py-12">
                <i class="fas fa-box-open text-5xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-700 mb-2">Belum ada data inventaris</h3>
                <p class="text-gray-500 mb-6">Mulai dengan menambahkan barang pertama Anda</p>
                <a href="{{ route('admin.orphanages.inventories.create', $orphanage) }}" 
                   class="inline-flex items-center bg-green-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-green-700 transition-all duration-300">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Tambah Barang Pertama
                </a>
            </div>
            @endif
        </div>

        <!-- PAGINATION -->
        @if($inventories->hasPages())
        <div class="mt-6 flex justify-center fade-in">
            <div class="bg-white px-4 py-3 rounded-lg shadow-md">
                {{ $inventories->links() }}
            </div>
        </div>
        @endif
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