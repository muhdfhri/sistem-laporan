<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan - Portal Laporan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Alpine JS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<style>
body, html {
    margin: 0;
    padding: 0;
}

.sticky-nav {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1020;
    background: #EA3C3C; /* Warna merah tetap */
    backdrop-filter: blur(10px);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.sticky-nav.hidden {
    transform: translateY(-100%);
}

.sticky-nav.at-top {
    background: #EA3C3C; /* Tetap merah saat di top */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.nav-link {
    color: white !important; /* Teks putih */
    padding: 0.5rem 1.5rem;
    border-radius: 0.5rem;
    transition: all 0.2s;
    font-weight: 500;
    font-size: 0.95rem;
}

.sticky-nav.at-top .nav-link {
    color: white !important; /* Tetap putih */
}

.nav-link:hover {
    background: rgba(255, 255, 255, 0.15); /* Hover dengan efek putih transparan */
    color: white !important; /* Tetap putih saat hover */
}

.sticky-nav.at-top .nav-link:hover {
    background: rgba(255, 255, 255, 0.15);
    color: white !important;
}

/* Login & Register Button Styles */
.btn-login, .btn-register {
    background: transparent !important;
    color: white !important; /* Teks putih */
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    transition: all 0.2s;
    font-weight: 600;
    font-size: 0.95rem;
}

.sticky-nav.at-top .btn-login,
.sticky-nav.at-top .btn-register {
    color: white !important;
}

.btn-login:hover, .btn-register:hover {
    background: rgba(255, 255, 255, 0.15) !important; /* Hover putih transparan */
    text-decoration: none;
}

.sticky-nav.at-top .btn-login:hover,
.sticky-nav.at-top .btn-register:hover {
    background: rgba(255, 255, 255, 0.15) !important;
}

.logo-text {
    color: white; /* Logo teks putih */
    transition: color 0.3s ease;
    font-size: 1.125rem;
    font-weight: 700;
}

.sticky-nav.at-top .logo-text,
.sticky-nav.at-top .logo-text:hover {
    color: white;
}

body {
    padding-top: 0;
}

.hero-section {
    padding-top: 140px;
    padding-bottom: 120px;
}

@media (min-width: 768px) {
    .hero-section {
        padding-top: 180px;
        padding-bottom: 150px;
    }
}

.sticky-nav.at-top .logo-img {
    background: transparent !important;
    box-shadow: none;
}

/* User Menu Styles */
.user-menu-btn {
    color: white !important; /* Teks putih */
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    transition: all 0.2s;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.sticky-nav.at-top .user-menu-btn {
    color: white !important;
}

.user-menu-btn:hover {
    background: rgba(255, 255, 255, 0.15); /* Hover putih transparan */
}

.sticky-nav.at-top .user-menu-btn:hover {
    background: rgba(255, 255, 255, 0.15);
}

.user-dropdown {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    margin-top: 0.5rem;
    min-width: 12rem;
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    z-index: 50;
    overflow: hidden;
}

.user-dropdown.show {
    display: block;
}

.sticky-nav.at-top .user-dropdown {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(10px);
}

.dropdown-item {
    display: block;
    width: 100%;
    padding: 0.75rem 1rem;
    text-align: left;
    color: #374151;
    font-size: 0.875rem;
    transition: all 0.2s;
    border: none;
    background: transparent;
}

.dropdown-item:hover {
    background: #f3f4f6;
    color: #111827;
}

.dropdown-item.logout {
    color: #dc2626;
}

.dropdown-item.logout:hover {
    background: #fef2f2;
}

.dropdown-divider {
    height: 1px;
    background: #e5e7eb;
    margin: 0.25rem 0;
}
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // User menu toggle
        const button = document.getElementById("userMenuButton");
        const dropdown = document.getElementById("userDropdown");
        
        if (button && dropdown) {
            button.addEventListener("click", (e) => {
                e.stopPropagation();
                dropdown.classList.toggle("show");
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                    dropdown.classList.remove('show');
                }
            });
        }
    });
</script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <div class="flex-grow">
        <!-- Sticky Navigation -->
        <nav class="sticky-nav" id="mainNav">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16 md:h-20">
            <!-- Logo - Left Side -->
            <div class="flex items-center space-x-2 md:space-x-3">
                <img src="{{ asset('images/logo.jpg') }}" 
                    alt="Logo Desa" 
                    class="h-10 md:h-12 bg-white p-1 rounded-lg shadow-sm logo-img transition-all duration-300">
                <a href="{{ url('/') }}" class="logo-text text-sm md:text-base">
                    Desa Sunggal Kanan
                </a>
            </div>
            
            <!-- Navigation Links - Desktop Center -->
            <div class="hidden md:flex items-center space-x-2 absolute left-1/2 transform -translate-x-1/2">
                <a href="{{ url('/') }}" class="nav-link">Beranda</a>      
                <a href="{{ url('/tentang') }}" class="nav-link">Tentang</a>
                <a href="/complaints/public" class="nav-link">Laporan Publik</a>
            </div>
            
            <!-- Auth Buttons - Desktop Right -->
            <div class="hidden md:block">
                @auth
                    <div class="relative">
                        <button id="userMenuButton" class="user-menu-btn focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="userDropdown" class="user-dropdown">
                            <a href="{{ route('complaints.index') }}" class="dropdown-item">
                                <svg class="w-4 h-4 inline-block mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Laporan Saya
                            </a>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <svg class="w-4 h-4 inline-block mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item logout">
                                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('login') }}" class="btn-login">
                            <svg class="w-4 h-4 inline-block mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Masuk
                        </a>
                        <span class="text-gray-300 mx-1">|</span>
                        <a href="{{ route('register') }}" class="btn-register">
                            <svg class="w-4 h-4 inline-block mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            Register
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuButton" class="md:hidden p-2 rounded-lg hover:bg-gray-100 focus:outline-none transition-colors">
                <svg id="menuIcon" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="closeIcon" class="w-6 h-6 text-gray-700 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden border-t border-gray-200">
            <div class="py-3 space-y-1">
                <!-- Navigation Links -->
                <a href="{{ url('/') }}" class="mobile-nav-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Beranda
                </a>
                <a href="{{ url('/tentang') }}" class="mobile-nav-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Tentang
                </a>
                <a href="/complaints/public" class="mobile-nav-link">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Laporan Publik
                </a>

                @auth
                    <!-- Logged In User Links -->
                    <div class="pt-2 border-t border-gray-200 mt-2">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <div class="text-sm font-medium text-gray-900">
                                {{ Auth::user()->name }} 
                                <span class="text-gray-400 mx-1">|</span> 
                                <span class="text-white">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <a href="{{ route('complaints.index') }}" class="mobile-nav-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Laporan Saya
                        </a>
                        <a href="{{ route('profile.edit') }}" class="mobile-nav-link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="mobile-nav-link text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Guest User Buttons -->
                    <div class="pt-2 border-t border-gray-200 mt-2 px-4 space-y-2 pb-2">
                        <a href="{{ route('login') }}" class="mobile-btn-login">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="mobile-btn-register">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
/* Mobile Navigation Link Styles */
.mobile-nav-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    color:rgb(255, 255, 255);
    font-weight: 500;
    transition: all 0.2s;
    border-left: 3px solid transparent;
}

.mobile-nav-link:hover {
    background-color: #f3f4f6;
    border-left-color: #3b82f6;
    color: #1f2937;
}

.mobile-nav-link:active {
    background-color: #e5e7eb;
}

/* Mobile Auth Buttons */
.mobile-btn-login, .mobile-btn-register {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    font-weight: 500;
    transition: all 0.2s;
}

.mobile-btn-login {
    background-color: white;
    border: 1px solid #d1d5db;
    color: #374151;
}

.mobile-btn-login:hover {
    background-color: #f9fafb;
    border-color: #9ca3af;
}

.mobile-btn-register {
    background-color: #3b82f6;
    color: white;
}

.mobile-btn-register:hover {
    background-color: #2563eb;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    const userMenuButton = document.getElementById('userMenuButton');
    const userDropdown = document.getElementById('userDropdown');

    // Mobile menu toggle
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    }

    // Desktop user menu toggle
    if (userMenuButton) {
        userMenuButton.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    }
});
</script>

        <div class="pt-24">
        <!-- Content -->
        <main class="flex-grow container mx-auto px-4 py-8 max-w-4xl">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-red-500 to-red-600 px-8 py-6">
                    <h2 class="text-2xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Buat Laporan Baru
                    </h2>
                    <p class="text-red-50 text-sm mt-1">Sampaikan laporan atau aspirasi Anda dengan lengkap</p>
                </div>

                <div class="p-8">
                    {{-- Notifikasi Error --}}
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-r-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <div class="flex-1">
                                    <strong class="text-red-800 text-sm font-medium">Terjadi kesalahan!</strong>
                                    <ul class="mt-2 text-sm text-red-700 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li class="flex items-start">
                                                <span class="mr-2">•</span>
                                                <span>{{ $error }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data" class="space-y-7" x-data="{ type: '' }">
                        @csrf

                        <!-- Jenis Laporan -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="block text-sm font-medium text-gray-700">Jenis Laporan <span class="text-red-500">*</span></label>
                                <span class="text-xs text-gray-500">Pilih salah satu</span>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <label class="relative flex items-center justify-center p-4 bg-white border-2 rounded-xl cursor-pointer transition-all"
                                       :class="type === 'pengaduan' ? 'border-red-500 bg-red-50' : 'border-gray-200 hover:border-gray-300 hover:bg-gray-50'">
                                    <input type="radio" name="type" value="pengaduan" 
                                           x-model="type"
                                           class="sr-only"
                                           required>
                                    <div class="text-center">
                                        <svg class="w-8 h-8 mx-auto mb-2" :class="type === 'pengaduan' ? 'text-red-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                        <span class="block text-sm font-medium" :class="type === 'pengaduan' ? 'text-gray-900' : 'text-gray-700'">
                                            Pengaduan
                                        </span>
                                        <p class="mt-1 text-xs text-gray-500">Laporkan masalah atau keluhan</p>
                                    </div>
                                </label>
                                
                                <label class="relative flex items-center justify-center p-4 bg-white border-2 rounded-xl cursor-pointer transition-all"
                                       :class="type === 'aspirasi' ? 'border-blue-500 bg-blue-50' : 'border-gray-200 hover:border-gray-300 hover:bg-gray-50'">
                                    <input type="radio" name="type" value="aspirasi"
                                           x-model="type"
                                           class="sr-only"
                                           required>
                                    <div class="text-center">
                                        <svg class="w-8 h-8 mx-auto mb-2" :class="type === 'aspirasi' ? 'text-blue-500' : 'text-gray-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                        </svg>
                                        <span class="block text-sm font-medium" :class="type === 'aspirasi' ? 'text-gray-900' : 'text-gray-700'">
                                            Aspirasi
                                        </span>
                                        <p class="mt-1 text-xs text-gray-500">Sampaikan ide atau masukan</p>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- Error message -->
                            <div id="type-error" class="hidden mt-2 text-sm text-red-600">
                                <p>Silakan pilih jenis laporan</p>
                            </div>
                            
                            @error('type')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Judul -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Laporan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all" 
                                placeholder="Masukkan judul laporan yang jelas dan singkat"
                                required>
                        </div>

                        <!-- Konten -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2"
                                   x-text="type === 'pengaduan' ? 'Isi Pengaduan *' : 'Isi Aspirasi *'">
                            </label>
                            <textarea id="description" name="description" rows="6" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all resize-none"
                                x-bind:placeholder="type === 'pengaduan' ? 'Jelaskan pengaduan Anda secara detail dan kronologis' : 'Tuliskan aspirasi Anda dengan jelas dan konstruktif'">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select id="category" name="category"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all appearance-none bg-white" 
                                    style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 24 24%27 stroke=%27%236B7280%27%3E%3Cpath stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272%27 d=%27M19 9l-7 7-7-7%27/%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.25rem;"
                                    required>
                                <option value="">Pilih kategori yang sesuai</option>
                                @foreach($categories as $key => $label)
                                    <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dusun (Untuk Pengaduan dan Aspirasi) -->
                        <div>
                            <label for="dusun" class="block text-sm font-medium text-gray-700 mb-2">
                                Dusun <span class="text-red-500">*</span>
                            </label>
                            <select id="dusun" name="dusun"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all appearance-none bg-white"
                                    style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 fill=%27none%27 viewBox=%270 0 24 24%27 stroke=%27%236B7280%27%3E%3Cpath stroke-linecap=%27round%27 stroke-linejoin=%27round%27 stroke-width=%272%27 d=%27M19 9l-7 7-7-7%27/%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.25rem;"
                                    required>
                                <option value="">Pilih Dusun</option>
                                <option value="Dusun I" {{ old('dusun') == 'Dusun I' ? 'selected' : '' }}>Dusun I</option>
                                <option value="Dusun II" {{ old('dusun') == 'Dusun II' ? 'selected' : '' }}>Dusun II</option>
                                <option value="Dusun III" {{ old('dusun') == 'Dusun III' ? 'selected' : '' }}>Dusun III</option>
                                <option value="Dusun IV" {{ old('dusun') == 'Dusun IV' ? 'selected' : '' }}>Dusun IV</option>
                                <option value="Dusun V" {{ old('dusun') == 'Dusun V' ? 'selected' : '' }}>Dusun V</option>
                            </select>
                            @error('dusun')
                                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lokasi (Untuk Pengaduan dan Aspirasi) -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                <span x-text="type === 'pengaduan' ? 'Lokasi Kejadian' : 'Lokasi Aspirasi'"></span>
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="location" name="location" value="{{ old('location') }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                   x-bind:placeholder="type === 'pengaduan' ? 'Contoh: Jl. Merdeka No. 123, Kelurahan Contoh, Kecamatan Contoh' : 'Contoh: Jl. Raya Desa No. 45, Area Fasilitas Umum'">
                            @error('location')
                                <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Upload Foto -->
                        <div>
                            <label for="image_path" class="block text-sm font-medium text-gray-700 mb-2">
                                Upload Foto Pendukung <span class="text-red-500">*</span>
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 hover:border-red-400 transition-colors">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <label for="image_path" class="cursor-pointer">
                                        <span class="text-sm text-red-600 font-medium hover:text-red-700">Pilih file</span>
                                    </label>
                                    <p class="text-xs text-gray-500 mt-2">JPG, PNG, JPEG (Maks. 2MB)</p>
                                    <input type="file" id="image_path" name="image_path" accept="image/*" required class="hidden">
                                </div>
                                <div id="imagePreview" class="hidden mt-4">
                                    <img id="previewImg" class="max-h-48 mx-auto rounded-lg border border-gray-200 shadow-sm" alt="Preview">
                                </div>
                            </div>
                        </div>

                        <!-- Opsi Publik -->
                        <div class="bg-gray-50 rounded-xl p-4">
                            <label class="flex items-start cursor-pointer group">
                                <div class="relative flex items-center">
                                    <input id="is_public" name="is_public" type="checkbox" value="1"
                                        {{ old('is_public', true) ? 'checked' : '' }}
                                        class="w-5 h-5 text-red-600 border-gray-300 rounded focus:ring-2 focus:ring-red-500">
                                </div>
                                <div class="ml-3">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Tampilkan secara publik</span>
                                    <p class="text-xs text-gray-500 mt-0.5">Laporan Anda akan dapat dilihat oleh pengguna lain</p>
                                </div>
                            </label>
                        </div>

                        <!-- Tombol Action -->
                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                            <a href="{{ route('complaints.index') }}" 
                               class="px-6 py-2.5 rounded-xl text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 transition-all">
                                Batal
                            </a>
                            <button type="submit" 
                                    class="px-6 py-2.5 rounded-xl text-sm font-medium text-white bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 shadow-sm hover:shadow-md transition-all">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                    </svg>
                                    Kirim Laporan
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <script>
        // Initialize form handling after Alpine.js is loaded
        document.addEventListener('alpine:init', () => {
            // This will run after Alpine is initialized
            const form = document.querySelector('form');
            
            // Handle form submission
            if (form) {
                form.addEventListener('submit', function(e) {
                    const typeInput = document.querySelector('input[name="type"]:checked');
                    const typeError = document.getElementById('type-error');
                    
                    if (!typeInput && typeError) {
                        e.preventDefault();
                        typeError.classList.remove('hidden');
                        typeError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                });
                
                // Initialize type watcher
                if (form.__x && form.__x.$data) {
                    form.__x.$watch('type', value => {
                        const typeError = document.getElementById('type-error');
                        if (value && typeError) {
                            typeError.classList.add('hidden');
                        }
                    });
                }
            }
            
            // Initialize image preview
            const imageInput = document.getElementById('image_path');
            const previewImg = document.getElementById('previewImg');
            const imagePreview = document.getElementById('imagePreview');
            
            if (imageInput && previewImg && imagePreview) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImg.src = e.target.result;
                            imagePreview.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
        </script>

          <!-- Footer -->
          <footer class="bg-white border-t border-gray-200 mt-12">
            <div class="container mx-auto px-4 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-3 mb-4 md:mb-0">
                        <img src="{{ asset('images/logo.jpg') }}" 
                            alt="Logo Deli Serdang" 
                            class="h-10 rounded-lg">
                        <div>
                            <div class="font-bold text-gray-800">Desa Sunggal Kanan</div>
                            <div class="text-xs text-gray-500">Kabupaten Deli Serdang</div>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <p class="text-sm text-gray-600">Portal Laporan Masyarakat</p>
                        <p class="text-xs text-gray-500 mt-1">© 2025 All rights reserved</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // User menu toggle
            const button = document.getElementById("userMenuButton");
            const menu = document.getElementById("userMenu");

            if (button && menu) {
                button.addEventListener("click", function () {
                    menu.classList.toggle("hidden");
                });

                // Close menu when clicking outside
                document.addEventListener("click", function (event) {
                    if (!button.contains(event.target) && !menu.contains(event.target)) {
                        menu.classList.add("hidden");
                    }
                });
            }

            // Preview image
            const imageInput = document.getElementById("image_path");
            const imagePreview = document.getElementById("imagePreview");
            const previewImage = document.getElementById("previewImg");

            if (imageInput && previewImage && imagePreview) {
                imageInput.addEventListener("change", function () {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewImage.src = e.target.result;
                            imagePreview.classList.remove("hidden");
                        };
                        reader.readAsDataURL(file);
                    } else {
                        imagePreview.classList.add("hidden");
                    }
                });
            }
        });
    </script>
</body>
</html>