<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - AZRWenas Sosial</title>
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
        
        .form-input {
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }
        
        .success-badge {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }
        
        .info-badge {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        
        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        
        @keyframes pulse-glow {
            0% { box-shadow: 0 0 0 0 rgba(106, 17, 203, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(106, 17, 203, 0); }
            100% { box-shadow: 0 0 0 0 rgba(106, 17, 203, 0); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen font-inter">

    <!-- HERO HEADER -->
    <div class="gradient-bg text-white shadow-lg">
        <div class="container mx-auto px-6 py-6">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-white rounded-full opacity-30 blur-sm"></div>
                        <img src="{{ asset('images/logo-gmim.png') }}" alt="GMIM" class="relative w-16 h-16 rounded-full shadow-lg border-2 border-white">
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold">AZRWenas Sosial</h1>
                        <p class="text-sm text-blue-100 mt-1">Yayasan Ds. A. Z. R. Wenas Bidang Sosial</p>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -inset-1 bg-white rounded-full opacity-30 blur-sm"></div>
                    <img src="{{ asset('images/logo-bartemeus.png') }}" alt="Bartemeus" class="relative w-20 h-20 rounded-full shadow-lg border-2 border-white floating">
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-6 py-8">
        <div class="max-w-4xl mx-auto fade-in">
            
            <!-- HEADER CARD -->
            <div class="bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl shadow-xl overflow-hidden mb-8 card-hover">
                <div class="p-8 text-white">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <div class="absolute -inset-1 bg-white rounded-full opacity-30 blur-sm"></div>
                                <div class="relative w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-cog text-2xl"></i>
                                </div>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold">Pengaturan Profil Admin</h1>
                                <p class="text-blue-100 mt-2">Kelola email dan password akun Anda</p>
                            </div>
                        </div>
                        <div class="bg-white bg-opacity-20 px-4 py-2 rounded-full">
                            <p class="text-sm font-medium">Status: <span class="font-bold">Aktif</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SUCCESS MESSAGE -->
            @if(session('status'))
            <div class="mb-8 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-4 rounded-xl flex items-center justify-between shadow-lg fade-in">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <p class="font-medium">{{ session('status') }}</p>
                    </div>
                </div>
                <button class="text-white hover:text-green-100 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

            <!-- ADMIN INFO CARD -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 card-hover">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <div class="absolute -inset-1 bg-purple-100 rounded-full opacity-70 blur-sm"></div>
                            <div class="relative w-16 h-16 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center text-white">
                                <i class="fas fa-user text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">Informasi Akun</h2>
                            <p class="text-gray-600">Detail akun administrator Anda</p>
                        </div>
                    </div>
                   
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <p class="text-sm text-gray-500">Nama</p>
                        <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->name ?? 'Administrator' }}</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <p class="text-sm text-gray-500">Email saat ini</p>
                        <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- SETTINGS CARDS -->
            <div class="grid md:grid-cols-2 gap-8">
                
                <!-- EMAIL SETTINGS -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover shine-effect">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 text-white">
                        <h2 class="text-xl font-bold flex items-center gap-2">
                            <i class="fas fa-envelope"></i>
                            Ubah Email
                        </h2>
                    </div>
                    
                    <div class="p-6">
                        <form action="{{ route('admin.profile.email') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                        <i class="fas fa-envelope text-blue-500"></i>
                                        Email Baru
                                    </label>
                                    <div class="relative">
                                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                               class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg form-input focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                               required>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-at text-gray-400"></i>
                                        </div>
                                    </div>
                                    @error('email') 
                                    <div class="mt-2 flex items-center gap-1 text-red-500 text-sm">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                        <i class="fas fa-key text-blue-500"></i>
                                        Password Saat Ini
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="current_password"
                                               class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg form-input focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                               required>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                    </div>
                                    @error('current_password') 
                                    <div class="mt-2 flex items-center gap-1 text-red-500 text-sm">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                
                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all font-medium flex items-center justify-center gap-2 mt-2 pulse-glow">
                                    <i class="fas fa-save"></i>
                                    Simpan Perubahan Email
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- PASSWORD SETTINGS -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover shine-effect">
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4 text-white">
                        <h2 class="text-xl font-bold flex items-center gap-2">
                            <i class="fas fa-lock"></i>
                            Ubah Password
                        </h2>
                    </div>
                    
                    <div class="p-6">
                        <form action="{{ route('admin.profile.password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                        <i class="fas fa-key text-purple-500"></i>
                                        Password Saat Ini
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="current_password"
                                               class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg form-input focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                               required>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                    </div>
                                    @error('current_password') 
                                    <div class="mt-2 flex items-center gap-1 text-red-500 text-sm">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                        <i class="fas fa-key text-purple-500"></i>
                                        Password Baru
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="password"
                                               class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg form-input focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                               required>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                    </div>
                                    @error('password') 
                                    <div class="mt-2 flex items-center gap-1 text-red-500 text-sm">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                                        <i class="fas fa-key text-purple-500"></i>
                                        Konfirmasi Password
                                    </label>
                                    <div class="relative">
                                        <input type="password" name="password_confirmation"
                                               class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg form-input focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                               required>
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-purple-600 to-purple-700 text-white py-3 rounded-lg hover:from-purple-700 hover:to-purple-800 transition-all font-medium flex items-center justify-center gap-2 mt-2">
                                    <i class="fas fa-key"></i>
                                    Simpan Password Baru
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- SECURITY TIPS -->
            <div class="mt-8 bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-2xl p-6 fade-in">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-shield-alt text-yellow-600"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Tips Keamanan Akun</h3>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-green-500 mt-1 flex-shrink-0"></i>
                                <span>Gunakan password yang kuat dengan kombinasi huruf, angka, dan simbol</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-green-500 mt-1 flex-shrink-0"></i>
                                <span>Jangan gunakan password yang sama untuk akun lain</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-green-500 mt-1 flex-shrink-0"></i>
                                <span>Pastikan email Anda valid untuk menerima notifikasi keamanan</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
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
            
            // Close notification
            const closeBtn = document.querySelector('.bg-gradient-to-r button');
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    this.parentElement.style.display = 'none';
                });
            }
        });
    </script>
</body>
</html>