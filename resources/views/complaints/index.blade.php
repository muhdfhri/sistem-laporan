<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan - Portal Laporan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .modal-enter {
            animation: modalEnter 0.2s ease-out;
        }
        @keyframes modalEnter {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
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
            <main class="flex-grow container mx-auto px-4 py-8">
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-list text-red-500 mr-3"></i> Daftar Laporan Saya
                        </h2>
                        
                        <!-- Filter Section -->
                        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                            <!-- Jenis Laporan Filter -->
                            <div class="relative w-full sm:w-48">
                                <select id="filter-type" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 text-sm">
                                    <option value="all">Semua Jenis Laporan</option>
                                    <option value="pengaduan" {{ request('type') == 'pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                                    <option value="aspirasi" {{ request('type') == 'aspirasi' ? 'selected' : '' }}>Aspirasi</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            
                            <a href="{{ route('complaints.create') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg flex items-center justify-center whitespace-nowrap">
                                <i class="fas fa-plus mr-2"></i> Buat Laporan Baru
                            </a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Foto</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Judul</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Isi Laporan</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Jenis</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Kategori</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Dusun</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Lokasi</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Balasan Admin</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Dibuat</th>
                                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($complaints as $complaint)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3">
                                        @if($complaint->image_path)
                                            <img src="{{ asset('storage/'.$complaint->image_path) }}" 
                                                alt="Complaint Image" 
                                                class="w-12 h-12 rounded-lg object-cover border border-gray-200 cursor-pointer hover:shadow-lg transition-shadow"
                                                onclick="openImageModal('{{ asset('storage/'.$complaint->image_path) }}')">
                                        @else
                                            <div class="w-12 h-12 rounded-lg border border-dashed border-gray-300 flex items-center justify-center text-gray-400">
                                                <i class="fas fa-camera text-lg"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $complaint->title }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700 max-w-xs">
                                        <div class="line-clamp-2">
                                            {{ $complaint->description }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($complaint->type === 'pengaduan')
                                            <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full">
                                                Pengaduan
                                            </span>
                                        @else
                                            <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">
                                                Aspirasi
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $categories[$complaint->category] ?? ucfirst(str_replace('_', ' ', $complaint->category)) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($complaint->dusun)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                {{ $complaint->dusun }}
                                            </span>
                                        @else
                                            <span class="text-gray-400 text-xs">-</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-start text-sm text-gray-600 max-w-xs">
                                            <i class="fas fa-map-marker-alt text-red-500 mr-2 mt-0.5 flex-shrink-0"></i>
                                            <span class="truncate">{{ $complaint->location }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if ($complaint->status == 'pending')
                                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full font-medium">Pending</span>
                                        @elseif ($complaint->status == 'processing')
                                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full font-medium">Diproses</span>
                                        @elseif ($complaint->status == 'resolved')
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full font-medium">Selesai</span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full font-medium">Ditolak</span>
                                        @endif
                                    </td>

                                    <!-- Balasan Admin - FIXED -->
                                    <td class="px-4 py-3">
                                        <div class="max-w-xs">
                                            @if($complaint->admin_response)
                                                <div class="bg-blue-50 p-3 rounded-lg border-l-4 border-blue-400">
                                                    <p class="text-sm text-blue-800 font-medium mb-1">
                                                        <i class="fas fa-user-tie mr-1"></i>Balasan Admin:
                                                    </p>
                                                    <!-- Tampilkan preview singkat -->
                                                    <p class="text-sm text-gray-700 mb-2">
                                                        {{ Str::limit($complaint->admin_response, 50, '...') }}
                                                    </p>
                                                    
                                                    <!-- Tampilkan tombol "Lihat Balasan" jika teks panjang -->
                                                    @if(strlen($complaint->admin_response) > 50)
                                                    <button type="button" 
                                                        onclick="openResponseModal({{ $complaint->id }})" 
                                                        class="text-blue-500 text-xs hover:underline font-medium flex items-center text-left">
                                                        <i class="fas fa-eye mr-1"></i>Lihat Balasan Lengkap
                                                    </button>

                                                    @endif
                                                    
                                                    @if($complaint->responded_at)
                                                        <p class="text-xs text-gray-500 mt-2">
                                                            <i class="fas fa-clock mr-1"></i>{{ $complaint->responded_at->diffForHumans() }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="text-center py-4">
                                                    <i class="fas fa-hourglass-half text-gray-300 text-xl mb-2"></i>
                                                    <p class="text-xs text-gray-400">Menunggu balasan</p>
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm text-gray-500">
                                        <div class="flex flex-col">
                                            <span>{{ $complaint->created_at->format('d M Y') }}</span>
                                            <span class="text-xs text-gray-400">{{ $complaint->created_at->format('H:i') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <!-- Tombol Lihat -->
                                            <a href="{{ route('complaints.show', $complaint->id) }}" 
                                               class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition inline-flex items-center text-xs">
                                                <i class="fas fa-eye mr-1"></i> Lihat
                                            </a>

                                            <!-- Tombol Edit -->
                                            <a href="{{ route('complaints.edit', $complaint->id) }}" 
                                               class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition inline-flex items-center text-xs">
                                                <i class="fas fa-edit mr-1"></i> Edit
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('complaints.destroy', $complaint->id) }}" 
                                                  method="POST" class="inline" 
                                                  onsubmit="return confirmDelete(event, '{{ addslashes($complaint->title) }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition inline-flex items-center text-xs">
                                                    <i class="fas fa-trash mr-1"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="px-4 py-8 text-center text-gray-500">
                                        <i class="fas fa-inbox text-gray-300 text-3xl mb-3"></i>
                                        <p class="text-lg">Belum ada pengaduan yang dibuat.</p>
                                        <a href="{{ route('complaints.create') }}" class="inline-block mt-3 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                            <i class="fas fa-plus mr-2"></i>Buat Laporan Pertama
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $complaints->links() }}
                    </div>
                </div>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-auto">
            <div class="container mx-auto px-4 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-3 mb-4 md:mb-0">
                        <img src="{{ asset('images/logo.jpg') }}" 
                            alt="Logo Desa" 
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

        <!-- Modal untuk menampilkan gambar full -->
        <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 hidden flex items-center justify-center z-50 p-4">
            <div class="relative max-w-4xl w-full">
                <button onclick="closeImageModal()" class="absolute -top-12 right-0 text-white text-3xl hover:text-gray-300 transition">
                    <i class="fas fa-times"></i>
                </button>
                <img id="modalImage" src="" class="w-full h-auto rounded-lg shadow-lg">
            </div>
        </div>

        <!-- Delete Confirmation -->
        <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 p-4">
            <div class="h-full flex items-center justify-center">
                <div class="bg-white rounded-lg p-6 max-w-md w-full modal-enter">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Konfirmasi Penghapusan</h3>
                <p class="text-gray-600 text-center mb-6">
                    Yakin ingin menghapus pengaduan "<span id="itemTitle" class="font-semibold text-gray-800"></span>"? 
                    <br><span class="text-sm text-red-600">Tindakan ini tidak dapat dibatalkan.</span>
                </p>
                <div class="flex space-x-3">
                    <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">
                        <i class="fas fa-times mr-2"></i>Batal
                    </button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium">
                            <i class="fas fa-trash mr-2"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal untuk Balasan Admin - FIXED -->
        <div id="responseModal" class="fixed inset-0 bg-black bg-opacity-70 hidden flex items-center justify-center z-50 p-4">
            <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-hidden modal-enter">
                <!-- Modal Header -->
                <div class="flex justify-between items-center p-6 border-b border-gray-200">
                    <div class="flex items-center">
                        <i class="fas fa-user-tie text-blue-500 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-800">Balasan Admin</h3>
                    </div>
                    <button onclick="closeResponseModal()" class="text-gray-400 hover:text-gray-600 text-xl transition">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <!-- Modal Content -->
                <div class="p-6 overflow-y-auto max-h-[60vh]">
                    <!-- Info Waktu -->
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <i class="fas fa-clock mr-2"></i>
                        <span id="responseTime">-</span>
                    </div>
                    
                    <!-- Isi Balasan -->
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
                        <p id="responseContent" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>
                    </div>
                </div>
                
                <!-- Modal Footer -->
                <div class="flex justify-end p-6 border-t border-gray-200 bg-gray-50">
                    <button onclick="closeResponseModal()" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium">
                        <i class="fas fa-times mr-2"></i>Tutup
                    </button>
                </div>
            </div>
        </div>

        <script>
            // Data storage untuk balasan admin
            const complaintResponses = {
                @foreach($complaints as $complaint)
                    @if($complaint->admin_response)
                        {{ $complaint->id }}: {
                            response: `{{ addslashes($complaint->admin_response) }}`,
                            time: `{{ $complaint->responded_at ? $complaint->responded_at->format('d M Y H:i') : '' }}`
                        },
                    @endif
                @endforeach
            };

            document.addEventListener("DOMContentLoaded", function () {
                // User menu toggle
                const userMenuButton = document.getElementById("userMenuButton");
                const userDropdown = document.getElementById("userDropdown");
                
                if (userMenuButton && userDropdown) {
                    userMenuButton.addEventListener("click", (e) => {
                        e.stopPropagation();
                        userDropdown.classList.toggle("hidden");
                    });
                    
                    document.addEventListener("click", () => {
                        userDropdown.classList.add("hidden");
                    });
                }

                // Mobile menu toggle
                const mobileMenuButton = document.getElementById("mobileMenuButton");
                const mobileMenu = document.getElementById("mobileMenu");
                const menuIcon = document.getElementById("menuIcon");
                
                if (mobileMenuButton && mobileMenu) {
                    mobileMenuButton.addEventListener("click", function() {
                        mobileMenu.classList.toggle("hidden");
                        if (mobileMenu.classList.contains("hidden")) {
                            menuIcon.className = "fas fa-bars";
                        } else {
                            menuIcon.className = "fas fa-times";
                        }
                    });
                }

                // Complaint type filter
                const filterType = document.getElementById('filter-type');
                if (filterType) {
                    filterType.addEventListener('change', function() {
                        const type = this.value;
                        const url = new URL(window.location.href);
                        
                        if (type === 'all') {
                            url.searchParams.delete('type');
                        } else {
                            url.searchParams.set('type', type);
                        }
                        
                        window.location.href = url.toString();
                    });
                }
            });

            // Image modal functions
            function openImageModal(src) {
                document.getElementById('modalImage').src = src;
                document.getElementById('imageModal').classList.remove('hidden');
            }
            
            function closeImageModal() {
                document.getElementById('imageModal').classList.add('hidden');
            }

            // Response modal functions - FIXED
            function openResponseModal(complaintId) {
                const responseData = complaintResponses[complaintId];
                if (responseData) {
                    document.getElementById('responseContent').textContent = responseData.response;
                    document.getElementById('responseTime').textContent = responseData.time ? 
                        `Dibalas pada: ${responseData.time}` : 'Waktu balasan tidak tersedia';
                    
                    document.getElementById('responseModal').classList.remove('hidden');
                }
            }

            function closeResponseModal() {
                document.getElementById('responseModal').classList.add('hidden');
            }

            // Delete modal functions
            function confirmDelete(event, title) {
                event.preventDefault();
                document.getElementById('itemTitle').textContent = title;
                document.getElementById('deleteForm').action = event.target.action;
                document.getElementById('deleteModal').classList.remove('hidden');
                return false;
            }

            function closeDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
            }

            // Close modals when clicking outside
            document.addEventListener('click', function(e) {
                if (e.target.id === 'imageModal') closeImageModal();
                if (e.target.id === 'responseModal') closeResponseModal();
                if (e.target.id === 'deleteModal') closeDeleteModal();
            });

            // Close modals with escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeImageModal();
                    closeResponseModal();
                    closeDeleteModal();
                }
            });
        </script>
    </div>
</body>
</html>