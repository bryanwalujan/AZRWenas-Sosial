<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Panti Asuhan - Tambah Panti Baru</title>
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
        
        .form-section {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }
        
        .form-section-title {
            display: flex;
            align-items: center;
            margin-bottom: 1.25rem;
            font-size: 1.125rem;
            font-weight: 600;
            color: #374151;
        }
        
        .form-section-title i {
            margin-right: 0.75rem;
            color: #6a11cb;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.2s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #6a11cb;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }
        
        .form-error {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: block;
        }
        
        .form-grid {
            display: grid;
            gap: 1rem;
        }
        
        @media (min-width: 768px) {
            .form-grid-2 {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .form-grid-4 {
                grid-template-columns: repeat(4, 1fr);
            }
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
                        <i class="fas fa-plus-circle mr-3 text-primary"></i>
                        Tambah Panti Asuhan Baru
                    </h1>
                    <p class="text-gray-600 mt-2">Isi data lengkap panti asuhan yang akan ditambahkan ke sistem</p>
                </div>
                <a href="{{ route('admin.orphanages.index') }}" 
                   class="mt-4 md:mt-0 flex items-center action-btn bg-gray-100 text-gray-700 hover:bg-gray-200">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Daftar</span>
                </a>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover fade-in">
            <div class="gradient-bg px-6 py-4">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-2 rounded-lg mr-3">
                        <i class="fas fa-home"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white">Form Tambah Panti Asuhan</h3>
                        <p class="text-blue-100 text-sm flex items-center mt-1">
                            <i class="fas fa-info-circle mr-1 text-xs"></i>
                            Lengkapi semua informasi panti asuhan di bawah ini
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                <form method="POST" action="{{ route('admin.orphanages.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Informasi Dasar Panti -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-info-circle"></i>
                            <span>Informasi Dasar Panti</span>
                        </div>
                        
                        <div class="form-grid form-grid-2">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-home mr-1 text-primary"></i>
                                    Nama Panti
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" required class="form-input">
                                @error('name') <small class="form-error">{{ $message }}</small> @enderror
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-map-marker-alt mr-1 text-primary"></i>
                                    Lokasi
                                </label>
                                <input type="text" name="location" value="{{ old('location') }}" required class="form-input">
                                @error('location') <small class="form-error">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        
                        <div class="form-grid form-grid-2 mt-4">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-image mr-1 text-primary"></i>
                                    Foto Panti
                                </label>
                                <input type="file" name="photo" accept="image/*" class="form-input">
                                @error('photo') <small class="form-error">{{ $message }}</small> @enderror
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-calendar-alt mr-1 text-primary"></i>
                                    Tahun Berdiri
                                </label>
                                <input type="number" name="founded_year" value="{{ old('founded_year') }}" min="1900" max="2099" class="form-input">
                                @error('founded_year') <small class="form-error">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="form-label">
                                <i class="fas fa-map-marked-alt mr-1 text-primary"></i>
                                Alamat Lengkap
                            </label>
                            <textarea name="address" rows="2" class="form-input">{{ old('address') }}</textarea>
                            @error('address') <small class="form-error">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Informasi Kontak -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-address-book"></i>
                            <span>Informasi Kontak</span>
                        </div>
                        
                        <div class="form-grid form-grid-2">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-phone mr-1 text-primary"></i>
                                    Telepon
                                </label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-envelope mr-1 text-primary"></i>
                                    Email
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-input">
                            </div>
                        </div>
                    </div>

                    <!-- Data Anak -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-child"></i>
                            <span>Data Anak</span>
                        </div>
                        
                        <div class="form-grid form-grid-4">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-users mr-1 text-primary"></i>
                                    Kapasitas
                                </label>
                                <input type="number" name="capacity" value="{{ old('capacity') }}" min="0" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-male mr-1 text-primary"></i>
                                    Laki-laki (In House)
                                </label>
                                <input type="number" name="in_house_male" value="{{ old('in_house_male', 0) }}" min="0" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-female mr-1 text-primary"></i>
                                    Perempuan (In House)
                                </label>
                                <input type="number" name="in_house_female" value="{{ old('in_house_female', 0) }}" min="0" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-user-friends mr-1 text-primary"></i>
                                    Jumlah Anak Saat Ini
                                </label>
                                <input type="number" name="child_count" value="{{ old('child_count', 0) }}" min="0" required class="form-input">
                                @error('child_count') <small class="form-error">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        
                        <div class="form-grid form-grid-2 mt-4">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-male mr-1 text-primary"></i>
                                    Laki-laki Eksternal
                                </label>
                                <input type="number" name="external_male" value="{{ old('external_male', 0) }}" min="0" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-female mr-1 text-primary"></i>
                                    Perempuan Eksternal
                                </label>
                                <input type="number" name="external_female" value="{{ old('external_female', 0) }}" min="0" class="form-input">
                            </div>
                        </div>
                    </div>

                    <!-- Kategori dan Layanan -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-tags"></i>
                            <span>Kategori dan Layanan</span>
                        </div>
                        
                        <div class="form-grid form-grid-2">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-hands-helping mr-1 text-primary"></i>
                                    Kebutuhan (pisahkan dengan koma)
                                </label>
                                <textarea name="needs" rows="2" placeholder="Makanan, Pakaian, Buku" class="form-input">{{ old('needs') ? implode(', ', old('needs')) : '' }}</textarea>
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-building mr-1 text-primary"></i>
                                    Fasilitas (pisahkan dengan koma)
                                </label>
                                <textarea name="facilities" rows="2" placeholder="Kamar, Dapur, Ruang Belajar" class="form-input">{{ old('facilities') ? implode(', ', old('facilities')) : '' }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-grid form-grid-2 mt-4">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-list-alt mr-1 text-primary"></i>
                                    Kategori Layanan (pisahkan dengan koma)
                                </label>
                                <textarea name="categories" rows="2" placeholder="Anak Yatim, Anak Terlantar" class="form-input">{{ old('categories') ? implode(', ', old('categories')) : '' }}</textarea>
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-bullseye mr-1 text-primary"></i>
                                    Target Layanan (pisahkan dengan koma)
                                </label>
                                <textarea name="target_service" rows="2" placeholder="Anak SD, Remaja" class="form-input">{{ old('target_service') ? implode(', ', old('target_service')) : '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Visi dan Misi -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-eye"></i>
                            <span>Visi dan Misi</span>
                        </div>
                        
                        <div class="mt-4">
                            <label class="form-label">
                                <i class="fas fa-bullseye mr-1 text-primary"></i>
                                Visi
                            </label>
                            <textarea name="vision" rows="3" class="form-input">{{ old('vision') }}</textarea>
                        </div>
                        
                        <div class="mt-4">
                            <label class="form-label">
                                <i class="fas fa-tasks mr-1 text-primary"></i>
                                Misi
                            </label>
                            <textarea name="mission" rows="3" class="form-input">{{ old('mission') }}</textarea>
                        </div>
                    </div>

                    <!-- Struktur Organisasi -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-sitemap"></i>
                            <span>Struktur Organisasi</span>
                        </div>
                        
                        <div class="form-grid form-grid-2">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-landmark mr-1 text-primary"></i>
                                    Nama Yayasan
                                </label>
                                <input type="text" name="foundation_name" value="{{ old('foundation_name') }}" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-user-tie mr-1 text-primary"></i>
                                    Pimpinan
                                </label>
                                <input type="text" name="leader_name" value="{{ old('leader_name') }}" class="form-input">
                            </div>
                        </div>
                        
                        <div class="form-grid form-grid-2 mt-4">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-phone mr-1 text-primary"></i>
                                    Telepon Pimpinan
                                </label>
                                <input type="text" name="leader_phone" value="{{ old('leader_phone') }}" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-user-edit mr-1 text-primary"></i>
                                    Sekretaris
                                </label>
                                <input type="text" name="secretary_name" value="{{ old('secretary_name') }}" class="form-input">
                            </div>
                        </div>
                        
                        <div class="form-grid form-grid-2 mt-4">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-phone mr-1 text-primary"></i>
                                    Telepon Sekretaris
                                </label>
                                <input type="text" name="secretary_phone" value="{{ old('secretary_phone') }}" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-money-check-alt mr-1 text-primary"></i>
                                    Bendahara
                                </label>
                                <input type="text" name="treasurer_name" value="{{ old('treasurer_name') }}" class="form-input">
                            </div>
                        </div>
                        
                        <div class="form-grid form-grid-2 mt-4">
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-phone mr-1 text-primary"></i>
                                    Telepon Bendahara
                                </label>
                                <input type="text" name="treasurer_phone" value="{{ old('treasurer_phone') }}" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">
                                    <i class="fas fa-ruler-combined mr-1 text-primary"></i>
                                    Luas Tanah (m²)
                                </label>
                                <input type="number" name="land_area" value="{{ old('land_area') }}" min="0" class="form-input">
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="form-label">
                                <i class="fas fa-file-contract mr-1 text-primary"></i>
                                Status Tanah
                            </label>
                            <select name="land_status" class="form-input">
                                <option value="">-- Pilih Status --</option>
                                <option value="Milik Sendiri" {{ old('land_status') == 'Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                                <option value="Sewa" {{ old('land_status') == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                                <option value="Hibah" {{ old('land_status') == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                            </select>
                        </div>
                    </div>

                    <!-- Informasi Tambahan -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <i class="fas fa-file-alt"></i>
                            <span>Informasi Tambahan</span>
                        </div>
                        
                        <div class="mt-4">
                            <label class="form-label">
                                <i class="fas fa-file-signature mr-1 text-primary"></i>
                                Dokumen Legal (pisahkan dengan koma)
                            </label>
                            <textarea name="legal_documents" rows="2" placeholder="Akta Notaris, SK Menkumham" class="form-input">{{ old('legal_documents') ? implode(', ', old('legal_documents')) : '' }}</textarea>
                        </div>
                        
                        <div class="mt-4">
                            <label class="form-label">
                                <i class="fas fa-history mr-1 text-primary"></i>
                                Sejarah Singkat
                            </label>
                            <textarea name="history" rows="4" class="form-input">{{ old('history') }}</textarea>
                        </div>
                        
                        <div class="mt-4">
                            <label class="form-label">
                                <i class="fas fa-align-left mr-1 text-primary"></i>
                                Deskripsi Singkat
                            </label>
                            <textarea name="description" rows="3" required class="form-input">{{ old('description') }}</textarea>
                            @error('description') <small class="form-error">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col md:flex-row gap-3 mt-8">
                        <button type="submit" class="flex-1 flex items-center justify-center action-btn bg-success text-white hover:bg-green-700">
                            <i class="fas fa-save"></i>
                            <span>Simpan Panti Asuhan</span>
                        </button>
                        <a href="{{ route('admin.orphanages.index') }}" class="flex-1 flex items-center justify-center action-btn bg-gray-100 text-gray-700 hover:bg-gray-200">
                            <i class="fas fa-times"></i>
                            <span>Batal</span>
                        </a>
                    </div>
                </form>
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