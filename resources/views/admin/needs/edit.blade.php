<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kebutuhan - {{ $orphanage->name }}</title>
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
        
        .form-input {
            transition: all 0.3s ease;
            border: 1px solid #d1d5db;
        }
        
        .form-input:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(106, 17, 203, 0.3);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6b7280 0%, #9ca3af 100%);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(107, 114, 128, 0.3);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
            transition: all 0.3s ease;
        }
        
        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245, 158, 11, 0.3);
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
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('admin.orphanages.needs.index', $orphanage) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600">
                            Kebutuhan {{ $orphanage->name }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit Kebutuhan</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 fade-in">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-edit text-warning mr-3"></i>
                    Edit Kebutuhan
                </h1>
                <p class="text-gray-600 mt-2 flex items-center">
                    <i class="fas fa-box-open text-primary mr-2"></i>
                    <span class="font-medium">{{ $need->item }}</span> - 
                    <i class="fas fa-home ml-2 mr-1"></i>
                    {{ $orphanage->name }}
                </p>
            </div>
            <a href="{{ route('admin.orphanages.needs.index', $orphanage) }}"
               class="mt-4 md:mt-0 flex items-center bg-gradient-to-r from-gray-500 to-gray-600 text-white px-5 py-3 rounded-lg font-medium hover:from-gray-600 hover:to-gray-700 transition-all duration-300 shadow-md card-hover">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Daftar
            </a>
        </div>

        <!-- Form Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Container -->
            <div class="lg:col-span-2 fade-in">
                <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                    <div class="gradient-bg px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <i class="fas fa-edit mr-2"></i>
                            Form Edit Kebutuhan
                        </h3>
                    </div>
                    
                    <div class="p-6">
                        <form action="{{ route('admin.orphanages.needs.update', [$orphanage, $need]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <!-- Nama Kebutuhan -->
                            <div class="mb-6">
                                <label class="block font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-box-open text-primary mr-2"></i>
                                    Nama Kebutuhan
                                </label>
                                <div class="relative">
                                    <input type="text" name="item" value="{{ old('item', $need->item) }}" required
                                           class="w-full form-input px-4 py-3 rounded-lg focus:outline-none"
                                           placeholder="Masukkan nama kebutuhan">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <i class="fas fa-asterisk text-red-500 text-xs"></i>
                                    </div>
                                </div>
                                @error('item') 
                                    <div class="flex items-center mt-2 text-red-500 text-sm">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Keterangan -->
                            <div class="mb-8">
                                <label class="block font-semibold text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-info-circle text-primary mr-2"></i>
                                    Keterangan (Opsional)
                                </label>
                                <textarea name="description" rows="4"
                                          class="w-full form-input px-4 py-3 rounded-lg focus:outline-none"
                                          placeholder="Tambahkan keterangan tentang kebutuhan ini">{{ old('description', $need->description) }}</textarea>
                                <div class="flex justify-between mt-1 text-xs text-gray-500">
                                    <span>Deskripsi tambahan untuk kebutuhan ini</span>
                                    <span>Opsional</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-gray-200">
                                <button type="submit"
                                        class="flex-1 flex items-center justify-center btn-warning text-white px-5 py-3 rounded-lg font-medium shadow-md">
                                    <i class="fas fa-save mr-2"></i>
                                    Update Kebutuhan
                                </button>
                                <a href="{{ route('admin.orphanages.needs.index', $orphanage) }}"
                                   class="flex-1 flex items-center justify-center btn-secondary text-white px-5 py-3 rounded-lg font-medium shadow-md">
                                    <i class="fas fa-times mr-2"></i>
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar Information -->
            <div class="lg:col-span-1 fade-in" style="animation-delay: 0.1s;">
                <!-- Info Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover mb-6">
                    <div class="gradient-bg px-4 py-3">
                        <h3 class="text-md font-semibold text-white flex items-center">
                            <i class="fas fa-lightbulb mr-2"></i>
                            Tips Pengeditan
                        </h3>
                    </div>
                    <div class="p-4">
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Pastikan nama kebutuhan jelas dan mudah dipahami</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Perbarui keterangan jika ada perubahan informasi</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Pastikan data yang diperbarui sudah benar</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Panti Info Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                    <div class="gradient-bg px-4 py-3">
                        <h3 class="text-md font-semibold text-white flex items-center">
                            <i class="fas fa-home mr-2"></i>
                            Info Panti
                        </h3>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 text-blue-600 p-3 rounded-lg mr-3">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">{{ $orphanage->name }}</h4>
                                <p class="text-sm text-gray-600">{{ $orphanage->location }}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div class="bg-blue-50 p-3 rounded-lg">
                                <div class="text-blue-600 font-semibold">{{ $orphanage->children->count() }}</div>
                                <div class="text-gray-600">Anak Panti</div>
                            </div>
                            <div class="bg-green-50 p-3 rounded-lg">
                                <div class="text-green-600 font-semibold">{{ $orphanage->needs->count() }}</div>
                                <div class="text-gray-600">Total Kebutuhan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Card -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover mt-6">
                    <div class="bg-yellow-500 px-4 py-3">
                        <h3 class="text-md font-semibold text-white flex items-center">
                            <i class="fas fa-history mr-2"></i>
                            Status Edit
                        </h3>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <i class="fas fa-calendar-alt text-yellow-500 mr-2"></i>
                            <span>Terakhir diubah: {{ $need->updated_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-plus-circle text-green-500 mr-2"></i>
                            <span>Dibuat: {{ $need->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
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