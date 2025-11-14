<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Inventaris - {{ $orphanage->name }}</title>
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
        
        .input-focus:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }
        
        .form-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }
        
        .input-with-icon {
            padding-left: 40px;
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
                    <li class="inline-flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('admin.orphanages.inventories.index', $orphanage) }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <i class="fas fa-boxes mr-2"></i>
                            Inventaris {{ $orphanage->name }}
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Tambah Barang</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8 fade-in">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-plus-circle mr-3 text-primary"></i>
                    Tambah Barang Inventaris
                </h1>
                <p class="text-gray-600 mt-2">Tambahkan barang baru ke inventaris {{ $orphanage->name }}</p>
            </div>
            <a href="{{ route('admin.orphanages.inventories.index', $orphanage) }}"
               class="flex items-center bg-gray-600 text-white px-5 py-3 rounded-lg font-medium hover:bg-gray-700 transition-all duration-300 card-hover">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <!-- Form Section -->
        <div class="max-w-4xl mx-auto fade-in">
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
                <div class="gradient-bg px-6 py-4">
                    <h3 class="text-lg font-semibold text-white flex items-center">
                        <i class="fas fa-edit mr-2"></i>
                        Form Tambah Barang
                    </h3>
                </div>
                
                <form action="{{ route('admin.orphanages.inventories.store', $orphanage) }}" method="POST" class="p-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Lokasi / Ruangan -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt mr-1 text-primary"></i>
                                Lokasi / Ruangan
                            </label>
                            <div class="relative">
                                <i class="fas fa-door-open form-icon"></i>
                                <input type="text" name="location" class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: Ruang Makan, Gudang, dll" required>
                            </div>
                        </div>
                        
                        <!-- Nama Barang -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-box mr-1 text-primary"></i>
                                Nama Barang
                            </label>
                            <div class="relative">
                                <i class="fas fa-tag form-icon"></i>
                                <input type="text" name="item_name" class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: Meja Makan, Lemari, dll" required>
                            </div>
                        </div>
                        
                        <!-- Jumlah -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-hashtag mr-1 text-primary"></i>
                                Jumlah
                            </label>
                            <div class="relative">
                                <i class="fas fa-layer-group form-icon"></i>
                                <input type="text" name="quantity" class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: 3 UNIT, 5 BUAH, dll" required>
                            </div>
                        </div>
                        
                        <!-- Asal Barang -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-gift mr-1 text-primary"></i>
                                Asal Barang
                            </label>
                            <div class="relative">
                                <i class="fas fa-hand-holding-heart form-icon"></i>
                                <input type="text" name="source" class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: Donatur, Pembelian, dll" required>
                            </div>
                        </div>
                        
                        <!-- Nilai (Rp) -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-money-bill-wave mr-1 text-primary"></i>
                                Nilai (Rp)
                            </label>
                            <div class="relative">
                                <i class="fas fa-coins form-icon"></i>
                                <input type="number" name="value" class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: 500000">
                            </div>
                        </div>
                        
                        <!-- Kondisi -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-stethoscope mr-1 text-primary"></i>
                                Kondisi
                            </label>
                            <div class="relative">
                                <i class="fas fa-clipboard-check form-icon"></i>
                                <select name="condition" class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon appearance-none" required>
                                    <option value="" disabled selected>Pilih Kondisi Barang</option>
                                    <option value="baik">Baik</option>
                                    <option value="rusak">Rusak</option>
                                    <option value="perlu perbaikan">Perlu Perbaikan</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Catatan -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-sticky-note mr-1 text-primary"></i>
                            Catatan
                        </label>
                        <div class="relative">
                            <i class="fas fa-edit absolute left-3 top-3 text-gray-400"></i>
                            <textarea name="note" class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300" 
                                      rows="3" placeholder="Tambahkan catatan tentang barang ini (opsional)"></textarea>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-gray-200">
                        <button type="submit" 
                                class="flex items-center justify-center bg-green-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-700 transition-all duration-300 card-hover flex-1">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Barang
                        </button>
                        <a href="{{ route('admin.orphanages.inventories.index', $orphanage) }}" 
                           class="flex items-center justify-center bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-300 transition-all duration-300 card-hover flex-1">
                            <i class="fas fa-times mr-2"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
            
            <!-- Info Tips -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-4 fade-in">
                <div class="flex items-start">
                    <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                    <div>
                        <h4 class="font-medium text-blue-800">Tips Mengisi Form</h4>
                        <ul class="text-sm text-blue-700 mt-2 space-y-1">
                            <li>• Pastikan informasi yang dimasukkan akurat dan sesuai dengan kondisi barang</li>
                            <li>• Gunakan satuan yang konsisten untuk jumlah barang (UNIT, BUAH, SET, dll)</li>
                            <li>• Isi nilai barang jika diketahui untuk membantu perhitungan aset panti</li>
                        </ul>
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
            
            // Format input nilai dengan pemisah ribuan
            const valueInput = document.querySelector('input[name="value"]');
            if (valueInput) {
                valueInput.addEventListener('blur', function() {
                    if (this.value) {
                        const formattedValue = new Intl.NumberFormat('id-ID').format(this.value);
                        this.value = formattedValue.replace(/,/g, '');
                    }
                });
            }
        });
    </script>
</body>
</html>