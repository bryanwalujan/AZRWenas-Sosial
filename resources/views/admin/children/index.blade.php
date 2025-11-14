<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anak - {{ $orphanage->name }}</title>
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
        
        .table-hover tr {
            transition: all 0.2s ease;
        }
        
        .table-hover tr:hover {
            background-color: #f8fafc;
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
                        <i class="fas fa-child text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">Data Anak</h1>
                        <p class="text-sm text-blue-100">{{ $orphanage->name }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.orphanages.index') }}" 
                       class="flex items-center space-x-2 bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-2 rounded-lg transition-all duration-300">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali ke Daftar Panti</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Page Title and Add Button -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 fade-in">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Data Anak</h1>
                <p class="text-gray-600 mt-2">Kelola data anak di {{ $orphanage->name }}</p>
            </div>
            <a href="{{ route('admin.orphanages.children.create', $orphanage) }}" 
               class="mt-4 md:mt-0 flex items-center space-x-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-4 py-3 rounded-lg shadow-md transition-all duration-300 card-hover">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Anak</span>
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg fade-in">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-green-500"></i>
                </div>
                <div class="ml-3">
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Anak</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ $children->count() }}</p>
                    </div>
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                        <i class="fas fa-child text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.1s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Laki-laki</p>
                        <p class="text-3xl font-bold text-blue-600 mt-1">{{ $children->where('gender', 'LAKI-LAKI')->count() }}</p>
                    </div>
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                        <i class="fas fa-male text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.2s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Perempuan</p>
                        <p class="text-3xl font-bold text-pink-600 mt-1">{{ $children->where('gender', 'PEREMPUAN')->count() }}</p>
                    </div>
                    <div class="bg-pink-100 text-pink-600 p-3 rounded-lg">
                        <i class="fas fa-female text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md card-hover fade-in" style="animation-delay: 0.3s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Dalam Panti</p>
                        <p class="text-3xl font-bold text-green-600 mt-1">{{ $children->where('in_house', true)->count() }}</p>
                    </div>
                    <div class="bg-green-100 text-green-600 p-3 rounded-lg">
                        <i class="fas fa-home text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Children Table -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden fade-in" style="animation-delay: 0.4s;">
            <div class="gradient-bg px-6 py-4">
                <h3 class="text-lg font-semibold text-white flex items-center">
                    <i class="fas fa-list mr-2"></i>
                    Daftar Anak
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 table-hover">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Lengkap
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jenis Kelamin
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tempat, Tanggal Lahir
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pendidikan
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($children as $child)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-child text-blue-600"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $child->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if($child->gender == 'LAKI-LAKI')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-male mr-1"></i> Laki-laki
                                </span>
                                @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                    <i class="fas fa-female mr-1"></i> Perempuan
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $child->birth_place }}</div>
                                <div class="text-sm text-gray-500">
                                    {{ $child->birth_date?->format('d/m/Y') ?? '—' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $child->education_level }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    {{ $child->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.orphanages.children.edit', [$orphanage, $child]) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200">
                                        <i class="fas fa-edit"></i>
                                        <span class="ml-1 hidden md:inline">Edit</span>
                                    </a>
                                    <form action="{{ route('admin.orphanages.children.destroy', [$orphanage, $child]) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 transition-colors duration-200"
                                                onclick="return confirm('Hapus {{ addslashes($child->name) }}?')">
                                            <i class="fas fa-trash"></i>
                                            <span class="ml-1 hidden md:inline">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-child text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500 text-lg">Belum ada data anak.</p>
                                    <p class="text-gray-400 mt-2">Klik tombol "Tambah Anak" untuk memulai.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if($children->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan {{ $children->firstItem() ?? 0 }} - {{ $children->lastItem() ?? 0 }} dari {{ $children->total() }} anak
                    </div>
                    <div class="flex space-x-2">
                        {{ $children->links() }}
                    </div>
                </div>
            </div>
            @endif
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