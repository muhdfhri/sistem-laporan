<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengaduan - Portal Pengaduan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-edit text-red-500 mr-3"></i>
                        {{ in_array($complaint->status, ['processing', 'resolved']) ? 'Edit Laporan' : 'Edit Laporan' }}
                    </h2>
                    <a href="{{ route('complaints.index') }}" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke daftar
                    </a>
                </div>

                {{-- Notifikasi Error --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-6">
                        <strong>Terjadi kesalahan!</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Info Status --}}
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                Status pengaduan saat ini: 
                                @if ($complaint->status == 'pending')
                                    <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded font-semibold">Pending</span>
                                @elseif ($complaint->status == 'processing')
                                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded font-semibold">Diproses</span>
                                @elseif ($complaint->status == 'resolved')
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded font-semibold">Selesai</span>
                                @else
                                    <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded font-semibold">Ditolak</span>
                                @endif
                            </p>
                            @if (in_array($complaint->status, ['processing', 'resolved']))
                                <p class="text-sm text-red-600 mt-1 font-medium">
                                    <i class="fas fa-lock mr-1"></i>
                                    Pengaduan tidak dapat diedit karena sudah {{ $complaint->status == 'processing' ? 'sedang diproses' : 'selesai ditangani' }}.
                                </p>
                            @elseif ($complaint->status == 'rejected')
                                <p class="text-sm text-orange-600 mt-1">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    Pengaduan telah ditolak. Anda masih bisa mengedit untuk diajukan kembali.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Form atau View Only --}}
                @if (in_array($complaint->status, ['processing', 'resolved']))
                    {{-- View Only Mode --}}
                    <div class="space-y-6">
                        <!-- Judul -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul Laporan Anda</label>
                            <div class="mt-1 p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
                                {{ $complaint->title }}
                            </div>
                        </div>

                        <!-- Konten -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Isi Laporan Anda</label>
                            <div class="mt-1 p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 whitespace-pre-wrap">{{ $complaint->content }}</div>
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kategori</label>
                            <div class="mt-1 p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
                                @if(isset($categories[$complaint->category]))
                                    {{ $categories[$complaint->category] }}
                                @else
                                    {{ $complaint->category }}
                                @endif
                            </div>
                        </div>

                        <!-- Dusun -->
                        @if($complaint->dusun)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Dusun</label>
                            <div class="mt-1 p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
                                {{ $complaint->dusun }}
                            </div>
                        </div>
                        @endif

                        <!-- Lokasi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Lokasi</label>
                            <div class="mt-1 p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-900">
                                {{ $complaint->location }}
                            </div>
                        </div>

                        <!-- Foto -->
                        @if ($complaint->image_path)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Pengaduan</label>
                                <div class="flex justify-center">
                                    <img src="{{ asset('storage/' . $complaint->image_path) }}" 
                                         alt="Foto Pengaduan" 
                                         class="max-w-md h-auto rounded-lg shadow-lg border border-gray-300">
                                </div>
                            </div>
                        @endif

                        <!-- Status Publik -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status Publikasi</label>
                            <div class="mt-1 p-3 bg-gray-50 border border-gray-300 rounded-lg">
                                @if ($complaint->is_public)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-eye mr-1"></i>Publik
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <i class="fas fa-eye-slash mr-1"></i>Privat
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Editable Form --}}
                    <form action="{{ route('complaints.update', $complaint->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Judul -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul Laporan Anda</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $complaint->title) }}"
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500" required>
                        </div>

                        <!-- Konten -->
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Isi Pengaduan</label>
                            <textarea id="content" name="content" rows="5"
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500" required>{{ old('content', $complaint->content) }}</textarea>
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select id="category" name="category"
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $key => $label)
                                    <option value="{{ $key }}" 
                                        {{ old('category', $complaint->category) == $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dusun -->
                        <div>
                            <label for="dusun" class="block text-sm font-medium text-gray-700">Dusun</label>
                            <select id="dusun" name="dusun"
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                                <option value="">-- Pilih Dusun --</option>
                                <option value="Dusun I" {{ old('dusun', $complaint->dusun) == 'Dusun I' ? 'selected' : '' }}>Dusun I</option>
                                <option value="Dusun II" {{ old('dusun', $complaint->dusun) == 'Dusun II' ? 'selected' : '' }}>Dusun II</option>
                                <option value="Dusun III" {{ old('dusun', $complaint->dusun) == 'Dusun III' ? 'selected' : '' }}>Dusun III</option>
                                <option value="Dusun IV" {{ old('dusun', $complaint->dusun) == 'Dusun IV' ? 'selected' : '' }}>Dusun IV</option>
                                <option value="Dusun V" {{ old('dusun', $complaint->dusun) == 'Dusun V' ? 'selected' : '' }}>Dusun V</option>
                            </select>
                            @error('dusun')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lokasi -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                            <input type="text" id="location" name="location" value="{{ old('location', $complaint->location) }}"
                                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500" required>
                        </div>

                        <!-- Foto Saat Ini -->
                        @if ($complaint->image_path)
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Foto Saat Ini</label>
                                <div class="mt-2 flex justify-center">
                                    <img src="{{ asset('storage/' . $complaint->image_path) }}" 
                                         alt="Foto Pengaduan" 
                                         class="max-w-md h-auto rounded-lg shadow-lg border border-gray-300">
                                </div>
                            </div>
                        @endif

                        <!-- Upload Foto -->
                        <div>
                            <label for="image_path" class="block text-sm font-medium text-gray-700">
                                @if ($complaint->image_path)
                                    Upload Foto Baru (Opsional)
                                @else
                                    Upload Foto <span class="text-red-500">*</span>
                                @endif
                            </label>
                            <div class="mt-1 flex items-center space-x-3">
                                <input type="file" id="image_path" name="image_path" accept="image/*" 
                                    {{ !$complaint->image_path ? 'required' : '' }}
                                    class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                <div id="imagePreview" class="hidden">
                                    <img id="previewImg" class="h-20 w-20 object-cover rounded-lg border border-gray-300" alt="Preview">
                                </div>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">
                                <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                                @if ($complaint->image_path)
                                    Kosongkan jika ingin tetap menggunakan foto yang ada. Upload foto baru akan mengganti foto lama. Format: JPG, PNG, JPEG (Maks 2MB)
                                @else
                                    Wajib upload foto sebagai bukti pengaduan. Format yang didukung: JPG, PNG, JPEG (Maksimal 2MB)
                                @endif
                            </p>
                        </div>

                        <!-- Apakah Publik -->
                        <div class="flex items-center">
                            <input id="is_public" name="is_public" type="checkbox" value="1"
                                {{ old('is_public', $complaint->is_public) ? 'checked' : '' }}
                                class="h-4 w-4 text-red-600 border-gray-300 rounded">
                            <label for="is_public" class="ml-2 text-sm text-gray-700">Tampilkan secara publik</label>
                        </div>

                        <!-- Tombol -->
                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="px-6 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition inline-flex items-center">
                                <i class="fas fa-save mr-2"></i>Update Pengaduan
                            </button>
                        </div>
                    </form>
                @endif

                <!-- Info Tambahan -->
                <div class="bg-gray-50 p-4 rounded-lg mt-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-clock mr-2"></i>Informasi Pengaduan
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                        <div>
                            <span class="font-medium">Dibuat:</span> {{ $complaint->created_at->format('d M Y, H:i') }}
                        </div>
                        <div>
                            <span class="font-medium">Terakhir diubah:</span> {{ $complaint->updated_at->format('d M Y, H:i') }}
                        </div>
                        <div>
                            <span class="font-medium">Views:</span> {{ number_format($complaint->views) }}
                        </div>
                        <div>
                            <span class="font-medium">Likes:</span> {{ number_format($complaint->likes) }}
                        </div>
                    </div>
                    
                    @if ($complaint->admin_response)
                        <div class="mt-4 p-3 bg-blue-50 border-l-4 border-blue-400 rounded">
                            <h5 class="text-sm font-medium text-blue-800 mb-1">
                                <i class="fas fa-reply mr-1"></i>Respon Admin
                            </h5>
                            <p class="text-sm text-blue-700">{{ $complaint->admin_response }}</p>
                            @if ($complaint->responded_at)
                                <p class="text-xs text-blue-600 mt-1">
                                    Direspon: {{ $complaint->responded_at->format('d M Y, H:i') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </main>

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
                        <p class="text-sm text-gray-600">Portal Pengaduan Masyarakat</p>
                        <p class="text-xs text-gray-500 mt-1">© 2025 All rights reserved</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const button = document.getElementById("userMenuButton");
            const menu = document.getElementById("userMenu");

            button.addEventListener("click", function () {
                menu.classList.toggle("hidden");
            });

            document.addEventListener("click", function (e) {
                if (!button.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.add("hidden");
                }
            });

            // Image preview functionality (hanya jika dalam mode edit)
            const imageInput = document.getElementById('image_path');
            if (imageInput) {
                const imagePreview = document.getElementById("imagePreview");
                const previewImg = document.getElementById("previewImg");

                imageInput.addEventListener("change", function(e) {
                    const file = e.target.files[0];
                    
                    if (file) {
                        // Show preview tanpa client-side validation
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImg.src = e.target.result;
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