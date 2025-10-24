<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Portal Laporan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
    <body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Sticky Navigation -->
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
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .sticky-nav.hidden {
        transform: translateY(-100%);
    }
    
    .sticky-nav.at-top {
        background: transparent;
        box-shadow: none;
        backdrop-filter: none;
    }
    
    .nav-link {
        color: #333 !important;
        padding: 0.5rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.2s;
        font-weight: 500;
        font-size: 0.95rem;
    }
    
    .sticky-nav.at-top .nav-link {
        color: white !important;
    }
    
    .nav-link:hover {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626 !important;
    }
    
    .sticky-nav.at-top .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
        color: white !important;
    }
    
    /* Login & Register Button Styles */
    .btn-login, .btn-register {
        background: transparent !important;
        color: #333 !important;
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
        background: rgba(239, 68, 68, 0.1) !important;
        text-decoration: none;
    }
    
    .sticky-nav.at-top .btn-login:hover,
    .sticky-nav.at-top .btn-register:hover {
        background: rgba(255, 255, 255, 0.2) !important;
    }
    
    .logo-text {
        color: #333;
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
        color: #333 !important;
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
        background: rgba(239, 68, 68, 0.1);
    }

    .sticky-nav.at-top .user-menu-btn:hover {
        background: rgba(255, 255, 255, 0.2);
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
<body class="bg-gray-100">
    <div class="min-h-screen">
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
                        <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase">
                            {{ Auth::user()->name }}
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
    color: #374151;
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
  <!-- Hero Section -->
  <section class="bg-gradient-to-br from-red-600 via-red-700 to-red-800 text-white relative overflow-hidden" style="padding: 120px 0 100px;">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-32 -translate-y-32"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-48 translate-y-48"></div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="max-w-4xl mx-auto fade-in">
                <div class="inline-block mb-4 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium">
                    Portal Laporan Masyarakat
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Tentang Kami</h1>
                <p class="text-xl md:text-2xl mb-4 font-light">Menjadi jembatan antara masyarakat dan instansi terkait</p>
                <p class="text-lg text-red-50 mb-10 max-w-2xl mx-auto">Kami hadir untuk mendengarkan, mencatat, dan menindaklanjuti setiap aspirasi Anda dengan transparan dan profesional</p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#" class="bg-red-800/50 backdrop-blur-sm text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 hover:bg-red-800 hover:shadow-lg inline-flex items-center justify-center group border border-white/20">
                        <i class="fas fa-comments mr-2 group-hover:scale-110 transition-transform"></i>
                        Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
    </section>

 <!-- About Section -->
 <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16 fade-in">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Siapa Kami?</h2>
                    <div class="w-20 h-1 bg-red-600 mx-auto mb-6"></div>
                    <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                        Portal Laporan Masyarakat adalah platform digital yang memudahkan masyarakat dalam menyampaikan keluhan, pengaduan, dan aspirasi terkait pelayanan publik secara transparan dan akuntabel.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="space-y-8">
                        <div class="card-hover bg-gradient-to-br from-red-50 to-white p-8 rounded-2xl border border-red-100">
                            <div class="flex items-start gap-4">
                                <div class="bg-red-600 text-white p-3 rounded-lg shrink-0">
                                    <i class="fas fa-eye text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Visi Kami</h3>
                                    <p class="text-gray-700 leading-relaxed">
                                        Menjadi platform terdepan dalam menciptakan tata kelola pemerintahan yang transparan dan partisipatif melalui teknologi informasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-hover bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl border border-gray-200">
                            <div class="flex items-start gap-4">
                                <div class="bg-gray-800 text-white p-3 rounded-lg shrink-0">
                                    <i class="fas fa-bullseye text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi Kami</h3>
                                    <ul class="space-y-3">
                                        <li class="flex items-start gap-3 text-gray-700">
                                            <i class="fas fa-check-circle text-red-600 mt-1 shrink-0"></i>
                                            <span>Menyediakan platform yang mudah digunakan untuk menyampaikan laporan masyarakat</span>
                                        </li>
                                        <li class="flex items-start gap-3 text-gray-700">
                                            <i class="fas fa-check-circle text-red-600 mt-1 shrink-0"></i>
                                            <span>Meningkatkan transparansi penanganan laporan masyarakat</span>
                                        </li>
                                        <li class="flex items-start gap-3 text-gray-700">
                                            <i class="fas fa-check-circle text-red-600 mt-1 shrink-0"></i>
                                            <span>Mempercepat respon terhadap keluhan dan aspirasi masyarakat</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="p-8 rounded-2xl shadow-lg">
                            <img src="{{ asset('images/service.png') }}" alt="Ilustrasi" class="w-full h-auto rounded-xl" onerror="this.src='https://placehold.co/600x400/FEE2E2/DC2626?text=Gambar+Tidak+Ditemukan'">
                        </div>
                        <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-xl shadow-xl border border-gray-100 hidden md:block">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-red-600">100%</div>
                                <div class="text-sm text-gray-600">Masyarakat Terlayani</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <span class="inline-block px-4 py-2 bg-red-50 text-red-600 text-sm font-medium rounded-full mb-4">Mengapa Memilih Kami</span>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Layanan Unggulan</h2>
                    <div class="w-20 h-1 bg-red-600 mx-auto mb-6"></div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">Solusi terpercaya untuk menyalurkan aspirasi dan laporan masyarakat dengan efektif</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="stat-counter bg-white p-8 rounded-2xl shadow-md text-center border border-gray-100">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 text-red-600 rounded-full mb-4">
                            <i class="fas fa-clock text-2xl"></i>
                        </div>
                        <div class="text-5xl font-bold text-red-600 mb-2">24/7</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Layanan Nonstop</h3>
                        <p class="text-gray-600">Sistem kami siap melayani kapan saja, di mana saja</p>
                    </div>
                    
                    <div class="stat-counter bg-white p-8 rounded-2xl shadow-md text-center border border-gray-100">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 text-red-600 rounded-full mb-4">
                            <i class="fas fa-shield-alt text-2xl"></i>
                        </div>
                        <div class="text-5xl font-bold text-red-600 mb-2">100%</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Transparan</h3>
                        <p class="text-gray-600">Proses yang terbuka dan dapat dipantau oleh masyarakat</p>
                    </div>
                    
                    <div class="stat-counter bg-white p-8 rounded-2xl shadow-md text-center border border-gray-100">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 text-red-600 rounded-full mb-4">
                            <i class="fas fa-file-alt text-2xl"></i>
                        </div>
                        <div class="text-5xl font-bold text-red-600 mb-2">≤ 3 Hari</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Respons Cepat</h3>
                        <p class="text-gray-600">Proses penanganan laporan masyarakat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    
    <!-- JavaScript for Navigation -->
    <script>
        // Navbar Scroll Behavior
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('mainNav');
            const heroSection = document.querySelector('.hero-section');
            let lastScroll = 0;
            let ticking = false;

            // Function to handle scroll events
            function handleScroll() {
                const currentScroll = window.pageYOffset;
                
                // Add/remove at-top class based on scroll position
                if (currentScroll <= 10) {
                    navbar.classList.add('at-top');
                } else {
                    navbar.classList.remove('at-top');
                }

                // Show/hide navbar on scroll
                if (currentScroll <= 0) {
                    navbar.classList.remove('hidden');
                } else if (currentScroll > lastScroll && currentScroll > 100) {
                    // Scrolling down
                    navbar.classList.add('hidden');
                } else if (currentScroll < lastScroll) {
                    // Scrolling up
                    navbar.classList.remove('hidden');
                }

                lastScroll = currentScroll;
                ticking = false;
            }

            // Throttle scroll events for better performance
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    window.requestAnimationFrame(handleScroll);
                    ticking = true;
                }
            }, { passive: true });

            // Initialize navbar state
            if (window.pageYOffset <= 10) {
                navbar.classList.add('at-top');
            }
        });
    </script>
</div><!-- End of min-h-screen -->
</body>
</html>