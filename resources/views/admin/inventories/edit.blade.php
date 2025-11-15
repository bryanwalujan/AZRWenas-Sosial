<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventaris - {{ $orphanage->name }}</title>
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
        
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        
        .file-input-wrapper input[type=file] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-input-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            background-color: #f9fafb;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .file-input-custom:hover {
            border-color: #6a11cb;
            background-color: #f3f4f6;
        }
        
        .photo-preview {
            max-height: 200px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .photo-preview:hover {
            transform: scale(1.02);
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit {{ $inventory->item_name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8 fade-in">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-edit mr-3 text-primary"></i>
                    Edit Barang Inventaris
                </h1>
                <p class="text-gray-600 mt-2">Perbarui informasi barang <span class="font-semibold">{{ $inventory->item_name }}</span> di inventaris {{ $orphanage->name }}</p>
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
                        Form Edit Barang
                    </h3>
                </div>
                
                <form action="{{ route('admin.orphanages.inventories.update', [$orphanage, $inventory]) }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Lokasi / Ruangan -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt mr-1 text-primary"></i>
                                Lokasi / Ruangan
                            </label>
                            <div class="relative">
                                <i class="fas fa-door-open form-icon"></i>
                                <input type="text" name="location" value="{{ old('location', $inventory->location) }}" 
                                       class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: Ruang Makan, Gudang, dll" required>
                            </div>
                            @error('location') 
                                <span class="text-red-500 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </span> 
                            @enderror
                        </div>
                        
                        <!-- Nama Barang -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-box mr-1 text-primary"></i>
                                Nama Barang
                            </label>
                            <div class="relative">
                                <i class="fas fa-tag form-icon"></i>
                                <input type="text" name="item_name" value="{{ old('item_name', $inventory->item_name) }}" 
                                       class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: Meja Makan, Lemari, dll" required>
                            </div>
                            @error('item_name') 
                                <span class="text-red-500 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </span> 
                            @enderror
                        </div>
                        
                        <!-- Jumlah -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-hashtag mr-1 text-primary"></i>
                                Jumlah
                            </label>
                            <div class="relative">
                                <i class="fas fa-layer-group form-icon"></i>
                                <input type="text" name="quantity" value="{{ old('quantity', $inventory->quantity) }}" 
                                       class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: 3 UNIT, 5 BUAH, dll" required>
                            </div>
                            @error('quantity') 
                                <span class="text-red-500 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </span> 
                            @enderror
                        </div>
                        
                        <!-- Asal Barang -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-gift mr-1 text-primary"></i>
                                Asal Barang
                            </label>
                            <div class="relative">
                                <i class="fas fa-hand-holding-heart form-icon"></i>
                                <input type="text" name="source" value="{{ old('source', $inventory->source) }}" 
                                       class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: Donatur, Pembelian, dll" required>
                            </div>
                            @error('source') 
                                <span class="text-red-500 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </span> 
                            @enderror
                        </div>
                        
                        <!-- Nilai (Rp) -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-money-bill-wave mr-1 text-primary"></i>
                                Nilai (Rp)
                            </label>
                            <div class="relative">
                                <i class="fas fa-coins form-icon"></i>
                                <input type="number" name="value" value="{{ old('value', $inventory->value) }}" min="0"
                                       class="w-full border border-gray-300 rounded-lg p-3 pl-10 input-focus transition-all duration-300 input-with-icon" 
                                       placeholder="Contoh: 500000">
                            </div>
                            @error('value') 
                                <span class="text-red-500 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </span> 
                            @enderror
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
                                    <option value="" disabled>Pilih Kondisi Barang</option>
                                    <option value="baik" {{ old('condition', $inventory->condition) == 'baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="rusak" {{ old('condition', $inventory->condition) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                    <option value="perlu perbaikan" {{ old('condition', $inventory->condition) == 'perlu perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            </div>
                            @error('condition') 
                                <span class="text-red-500 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </span> 
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Foto Barang -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-camera mr-1 text-primary"></i>
                            Foto Barang
                        </label>
                        
                        @if($inventory->photo)
                            <div class="mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <p class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-image mr-2 text-primary"></i>
                                    Foto Saat Ini
                                </p>
                                <div class="flex items-center space-x-4">
                                    <img src="{{ asset('storage/' . $inventory->photo) }}" alt="Foto Barang" class="photo-preview max-h-32">
                                    <div class="text-sm text-gray-600">
                                        <p class="font-medium">Foto barang saat ini</p>
                                        <p class="text-xs mt-1">Klik gambar untuk memperbesar</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <div class="file-input-wrapper">
                            <div class="file-input-custom">
                                <div class="text-center">
                                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                    <p class="text-sm font-medium text-gray-700">Klik untuk mengunggah foto baru</p>
                                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF (Maks. 2MB)</p>
                                </div>
                            </div>
                            <input type="file" name="photo" accept="image/*" class="w-full">
                        </div>
                        @error('photo') 
                            <span class="text-red-500 text-sm mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </span> 
                        @enderror
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
                                      rows="3" placeholder="Tambahkan catatan tentang barang ini (opsional)">{{ old('note', $inventory->note) }}</textarea>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-gray-200">
                        <button type="submit" 
                                class="flex items-center justify-center bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition-all duration-300 card-hover flex-1">
                            <i class="fas fa-save mr-2"></i>
                            Perbarui Barang
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
                        <h4 class="font-medium text-blue-800">Tips Mengedit Barang</h4>
                        <ul class="text-sm text-blue-700 mt-2 space-y-1">
                            <li>• Pastikan informasi yang diperbarui akurat dan sesuai dengan kondisi barang saat ini</li>
                            <li>• Perbarui foto barang jika ada perubahan fisik yang signifikan</li>
                            <li>• Jika mengganti foto, foto lama akan digantikan dengan foto baru</li>
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
            
            // Preview foto yang dipilih
            const fileInput = document.querySelector('input[name="photo"]');
            if (fileInput) {
                fileInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            // Hapus preview lama jika ada
                            const oldPreview = document.querySelector('.photo-preview-new');
                            if (oldPreview) oldPreview.remove();
                            
                            // Buat elemen preview baru
                            const previewContainer = document.querySelector('.file-input-wrapper');
                            const newPreview = document.createElement('div');
                            newPreview.className = 'mt-4 p-4 bg-green-50 rounded-lg border border-green-200';
                            newPreview.innerHTML = `
                                <p class="text-sm font-medium text-green-700 mb-2 flex items-center">
                                    <i class="fas fa-check-circle mr-2 text-green-500"></i>
                                    Foto Baru Dipilih
                                </p>
                                <div class="flex items-center space-x-4">
                                    <img src="${e.target.result}" alt="Preview Foto Baru" class="photo-preview photo-preview-new max-h-32">
                                    <div class="text-sm text-green-700">
                                        <p class="font-medium">${file.name}</p>
                                        <p class="text-xs mt-1">Foto ini akan menggantikan foto lama</p>
                                    </div>
                                </div>
                            `;
                            previewContainer.parentNode.insertBefore(newPreview, previewContainer.nextSibling);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
</body>
</html>