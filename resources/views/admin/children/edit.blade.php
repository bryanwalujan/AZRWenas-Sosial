<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anak - {{ $orphanage->name }}</title>
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
        
        .form-input {
            transition: all 0.3s ease;
            border: 1px solid #d1d5db;
        }
        
        .form-input:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }
        
        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        
        .section-card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        
        .section-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 1rem 1.5rem;
        }
        
        .section-body {
            padding: 1.5rem;
        }
        
        .breadcrumb-item {
            transition: all 0.2s ease;
        }
        
        .breadcrumb-item:hover {
            color: #6a11cb;
        }
        
        .success-badge {
            display: inline-flex;
            align-items: center;
            background-color: #f0f9ff;
            color: #0369a1;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            margin-left: 1rem;
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
                        <h1 class="text-xl font-bold">Edit Data Anak</h1>
                        <p class="text-sm text-blue-100">{{ $orphanage->name }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.orphanages.children.index', $orphanage) }}" 
                       class="flex items-center space-x-2 bg-white bg-opacity-20 hover:bg-opacity-30 px-4 py-2 rounded-lg transition-all duration-300 card-hover">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali ke Daftar Anak</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Page Title and Breadcrumb -->
        <div class="mb-8 fade-in">
            <div class="flex items-center space-x-2 text-sm text-gray-500 mb-3">
                <a href="{{ route('admin.orphanages.index') }}" class="hover:text-primary transition-colors breadcrumb-item">
                    <i class="fas fa-home"></i>
                    <span>Daftar Panti</span>
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('admin.orphanages.children.index', $orphanage) }}" class="hover:text-primary transition-colors breadcrumb-item">
                    <span>Data Anak</span>
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-gray-700 font-medium">Edit Data Anak</span>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-user-edit text-primary mr-3"></i>
                        Edit Data Anak
                        <span class="success-badge ml-3">
                            <i class="fas fa-info-circle mr-1"></i>
                            Sedang mengedit: {{ $child->name }}
                        </span>
                    </h1>
                    <p class="text-gray-600 mt-2">Perbarui data anak untuk {{ $orphanage->name }}</p>
                </div>
            </div>
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

        <!-- Form Container -->
        <div class="section-card fade-in">
            <div class="section-header">
                <h2 class="text-lg font-semibold flex items-center">
                    <i class="fas fa-user-circle mr-2"></i>
                    Informasi Pribadi
                </h2>
            </div>
            
            <form action="{{ route('admin.orphanages.children.update', [$orphanage, $child]) }}" method="POST" class="section-body">
                @csrf @method('PUT')
                
                <!-- Include form fields from _form.blade.php -->
                @include('admin.children._form', ['child' => $child])
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-gray-100">
                    <button type="submit" 
                            class="flex items-center justify-center space-x-2 bg-gradient-to-r from-primary to-secondary hover:from-purple-700 hover:to-blue-600 text-white px-6 py-3 rounded-lg shadow-md transition-all duration-300 card-hover">
                        <i class="fas fa-save"></i>
                        <span>Perbarui Data Anak</span>
                    </button>
                    
                    <a href="{{ route('admin.orphanages.children.index', $orphanage) }}" 
                       class="flex items-center justify-center space-x-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg transition-all duration-300 card-hover">
                        <i class="fas fa-times"></i>
                        <span>Batal</span>
                    </a>
                </div>
            </form>
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
            
            // Fokus pada input pertama
            const firstInput = document.querySelector('input[type="text"]');
            if (firstInput) {
                firstInput.focus();
            }
        });
    </script>
</body>
</html>