<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pengaduan Masyarakat</title>
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
        <!-- Welcome Section -->
<section class="relative bg-gradient-to-br from-red-600 via-red-500 to-red-600 text-white overflow-hidden" style="margin-top: 0; padding: 140px 0 120px;">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl transform translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <!-- Pattern Overlay -->
    <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%23ffffff%27 fill-opacity=%271%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium text-white border border-white/20 mb-6">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Platform Resmi Pengaduan Masyarakat
            </div>

            <!-- Heading -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Portal Pengaduan
                <span class="block text-red-100">Masyarakat</span>
            </h1>

            <!-- Description -->
            <p class="text-xl md:text-2xl mb-3 text-white/95 font-light">
                Suarakan aspirasi Anda untuk lingkungan yang lebih baik
            </p>
            <p class="text-lg mb-10 text-red-50/80 max-w-2xl mx-auto">
                Kami mendengar, kami tanggap, kami bertindak untuk mewujudkan perubahan nyata
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-8">
                <a href="/complaints/public" 
                   class="group inline-flex items-center justify-center px-8 py-4 bg-white text-red-600 rounded-xl font-semibold transition-all duration-300 hover:shadow-2xl hover:scale-105 w-full sm:w-auto">
                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Lihat Laporan
                </a>
                <a href="{{ route('login') }}" 
                   class="group inline-flex items-center justify-center px-8 py-4 bg-red-700 hover:bg-red-800 text-white rounded-xl font-semibold transition-all duration-300 hover:shadow-2xl hover:scale-105 border-2 border-white/20 w-full sm:w-auto">
                    <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Sampaikan Laporan
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="flex flex-wrap justify-center items-center gap-6 text-sm text-red-50">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-200" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Aman & Terpercaya</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                    <span>Respon Cepat</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-200" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                    </svg>
                    <span>Transparan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg class="w-full h-12 md:h-16 text-white" viewBox="0 0 1440 54" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 22L60 25.3C120 28.7 240 35.3 360 37.8C480 40.3 600 38.7 720 35.3C840 32 960 27 1080 25.3C1200 23.7 1320 25.3 1380 26.2L1440 27V54H1380C1320 54 1200 54 1080 54C960 54 840 54 720 54C600 54 480 54 360 54C240 54 120 54 60 54H0V22Z" fill="currentColor"/>
        </svg>
    </div>
</section>

       <!-- Stats Section -->
<section class="py-8 -mt-6 relative z-10">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-gray-100">
                
                <!-- Total Laporan -->
                <div class="group p-8 hover:bg-gradient-to-br hover:from-red-50 hover:to-white transition-all duration-300">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="text-5xl font-bold text-gray-900 mb-2 tracking-tight">{{ $stats['total'] ?? 0 }}</div>
                        <div class="text-sm font-semibold text-gray-700 mb-1">Total Laporan</div>
                        <div class="inline-flex items-center px-2.5 py-1 rounded-lg bg-red-50 text-red-700 text-xs font-medium">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            Semua waktu
                        </div>
                    </div>
                </div>

                <!-- Sedang Diproses -->
                <div class="group p-8 hover:bg-gradient-to-br hover:from-orange-50 hover:to-white transition-all duration-300">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="text-5xl font-bold text-gray-900 mb-2 tracking-tight">{{ $stats['processing'] ?? 0 }}</div>
                        <div class="text-sm font-semibold text-gray-700 mb-1">Sedang Diproses</div>
                        <div class="inline-flex items-center px-2.5 py-1 rounded-lg bg-orange-50 text-orange-700 text-xs font-medium">
                            <svg class="w-3.5 h-3.5 mr-1 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Dalam antrian
                        </div>
                    </div>
                </div>

                <!-- Telah Selesai -->
                <div class="group p-8 hover:bg-gradient-to-br hover:from-green-50 hover:to-white transition-all duration-300">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="text-5xl font-bold text-gray-900 mb-2 tracking-tight">{{ $stats['resolved'] ?? 0 }}</div>
                        <div class="text-sm font-semibold text-gray-700 mb-1">Telah Selesai</div>
                        <div class="inline-flex items-center px-2.5 py-1 rounded-lg bg-green-50 text-green-700 text-xs font-medium">
                            <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Terselesaikan
                        </div>
                    </div>
                </div>

                <!-- Rata-rata Hari -->
                <div class="group p-8 hover:bg-gradient-to-br hover:from-blue-50 hover:to-white transition-all duration-300">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="flex items-baseline justify-center mb-2">
                            <span class="text-5xl font-bold text-gray-900 tracking-tight">{{ round($stats['average_days'] ?? 0) }}</span>
                            <span class="text-2xl font-semibold text-gray-500 ml-1">hari</span>
                        </div>
                        <div class="text-sm font-semibold text-gray-700 mb-1">Rata-rata Waktu</div>
                        <div class="inline-flex items-center px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 text-xs font-medium">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Penyelesaian
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Laporan Terbaru -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            
            <!-- Header -->
            <div class="px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Laporan Terbaru</h2>
                            <p class="text-sm text-gray-500 mt-0.5">Pantau perkembangan laporan dari masyarakat</p>
                        </div>
                    </div>
                    <a href="#" class="hidden md:inline-flex items-center text-sm font-medium text-red-600 hover:text-red-700 transition-colors">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6 space-y-4 max-h-[600px] overflow-y-auto custom-scrollbar">
                @forelse($recentComplaints as $complaint)
                    <div class="group bg-white border border-gray-200 rounded-xl p-5 hover:border-red-200 hover:shadow-md transition-all duration-300">
                        <div class="flex gap-4">
                            
                            {{-- Thumbnail gambar --}}
                            <div class="flex-shrink-0">
                                @if($complaint->image_path)
                                    <div class="relative w-20 h-20 rounded-xl overflow-hidden cursor-pointer border-2 border-gray-200 hover:border-red-400 transition-colors"
                                         onclick="openImageModal('{{ asset('storage/'.$complaint->image_path) }}')">
                                        <img src="{{ asset('storage/'.$complaint->image_path) }}" 
                                            alt="Complaint Image" 
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity"></div>
                                    </div>
                                @else
                                    <div class="w-20 h-20 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center bg-gray-50">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Isi pengaduan --}}
                            <div class="flex-1 min-w-0">
                                <!-- Title -->
                                <h4 class="font-semibold text-gray-900 text-lg mb-2 line-clamp-1">{{ $complaint->title }}</h4>
                                
                                {{-- Status Badge --}}
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-100 text-blue-700">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $complaint->status ?? 'Pending' }}
                                    </span>
                                    <span class="text-xs text-gray-400">•</span>
                                    <span class="text-xs text-gray-500">{{ $complaint->category ?? 'Umum' }}</span>
                                </div>
                                
                                {{-- Content with Read More functionality --}}
                                <div class="complaint-content" data-full="{{ $complaint->content }}">
                                    <p class="text-gray-600 text-sm leading-relaxed mb-3 complaint-text">{{ Str::limit($complaint->content, 120) }}</p>
                                    @if(strlen($complaint->content) > 120)
                                        <button class="read-more-btn inline-flex items-center text-xs font-medium text-red-600 hover:text-red-700 transition-colors">
                                            <span>Baca selengkapnya</span>
                                            <svg class="w-3 h-3 ml-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                                
                                {{-- Info pengaduan --}}
                                <div class="flex items-center gap-4 text-xs text-gray-500 mt-3 pt-3 border-t border-gray-100">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span class="font-medium">{{ $complaint->user->name }}</span>
                                    </div>
                                    <span class="text-gray-300">•</span>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $complaint->created_at->diffForHumans() }}
                                    </div>
                                </div>

                                {{-- Balasan Admin --}}
                                @if($complaint->admin_response)
                                    <div class="mt-4 pt-4 border-t border-gray-100">
                                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
                                            <div class="flex items-center gap-2 mb-2">
                                                <div class="w-6 h-6 bg-blue-600 rounded-lg flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                                    </svg>
                                                </div>
                                                <div class="flex-1">
                                                    <span class="text-xs font-semibold text-blue-900">Tanggapan Admin</span>
                                                    @if($complaint->responded_at)
                                                        <span class="text-xs text-blue-600 ml-2">• {{ \Carbon\Carbon::parse($complaint->responded_at)->diffForHumans() }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            {{-- Admin response with Read More functionality --}}
                                            <div class="admin-response" data-full="{{ $complaint->admin_response }}">
                                                <p class="text-sm text-gray-700 leading-relaxed admin-text">{{ Str::limit($complaint->admin_response, 120) }}</p>
                                                @if(strlen($complaint->admin_response) > 120)
                                                    <button class="admin-read-more-btn inline-flex items-center text-xs font-medium text-blue-600 hover:text-blue-700 transition-colors mt-2">
                                                        <span>Baca selengkapnya</span>
                                                        <svg class="w-3 h-3 ml-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                                        </svg>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-2xl mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <p class="text-gray-500 font-medium">Belum ada laporan terbaru</p>
                        <p class="text-sm text-gray-400 mt-1">Laporan akan muncul di sini setelah masyarakat mengirimkan pengaduan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<style>
/* Custom Scrollbar */
.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Line clamp utility */
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<script>
// Read More functionality for complaint content
document.querySelectorAll('.read-more-btn').forEach(button => {
    button.addEventListener('click', function() {
        const container = this.closest('.complaint-content');
        const textElement = container.querySelector('.complaint-text');
        const fullText = container.dataset.full;
        const icon = this.querySelector('svg');
        
        if (textElement.textContent.length < fullText.length) {
            textElement.textContent = fullText;
            this.querySelector('span').textContent = 'Sembunyikan';
            icon.style.transform = 'rotate(180deg)';
        } else {
            textElement.textContent = fullText.substring(0, 120) + '...';
            this.querySelector('span').textContent = 'Baca selengkapnya';
            icon.style.transform = 'rotate(0deg)';
        }
    });
});

// Read More functionality for admin response
document.querySelectorAll('.admin-read-more-btn').forEach(button => {
    button.addEventListener('click', function() {
        const container = this.closest('.admin-response');
        const textElement = container.querySelector('.admin-text');
        const fullText = container.dataset.full;
        const icon = this.querySelector('svg');
        
        if (textElement.textContent.length < fullText.length) {
            textElement.textContent = fullText;
            this.querySelector('span').textContent = 'Sembunyikan';
            icon.style.transform = 'rotate(180deg)';
        } else {
            textElement.textContent = fullText.substring(0, 120) + '...';
            this.querySelector('span').textContent = 'Baca selengkapnya';
            icon.style.transform = 'rotate(0deg)';
        }
    });
});
</script>

        <!-- Tata Cara Melaporkan -->
<section class="py-16 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Header Section -->
        <div class="text-center mb-14">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-red-100 rounded-2xl mb-4">
                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Tata Cara Melaporkan</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Proses pelaporan yang mudah dan transparan dalam tiga langkah sederhana</p>
        </div>

        <!-- Steps Grid -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <!-- Langkah 1 -->
            <div class="relative group">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md hover:border-red-200 transition-all duration-300 h-full">
                    <!-- Step Number -->
                    <div class="relative mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">1</span>
                        </div>
                        <!-- Connector Line (hidden on mobile) -->
                        <div class="hidden md:block absolute top-8 left-[calc(50%+2rem)] w-[calc(100%+1.5rem)] h-0.5 bg-gradient-to-r from-red-300 to-gray-200"></div>
                    </div>
                    
                    <!-- Icon -->
                    <div class="mb-4 flex justify-center">
                        <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 text-center mb-3">Login / Daftar</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Masuk ke akun Anda atau buat akun baru untuk mengajukan laporan</p>
                </div>
            </div>

            <!-- Langkah 2 -->
            <div class="relative group">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md hover:border-red-200 transition-all duration-300 h-full">
                    <!-- Step Number -->
                    <div class="relative mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">2</span>
                        </div>
                        <!-- Connector Line (hidden on mobile) -->
                        <div class="hidden md:block absolute top-8 left-[calc(50%+2rem)] w-[calc(100%+1.5rem)] h-0.5 bg-gradient-to-r from-red-300 to-gray-200"></div>
                    </div>
                    
                    <!-- Icon -->
                    <div class="mb-4 flex justify-center">
                        <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 text-center mb-3">Isi Formulir</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Lengkapi detail laporan dengan jelas dan lampirkan bukti pendukung</p>
                </div>
            </div>

            <!-- Langkah 3 -->
            <div class="relative group">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover:shadow-md hover:border-red-200 transition-all duration-300 h-full">
                    <!-- Step Number -->
                    <div class="relative mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-2xl font-bold text-white">3</span>
                        </div>
                    </div>
                    
                    <!-- Icon -->
                    <div class="mb-4 flex justify-center">
                        <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 text-center mb-3">Kirim & Pantau</h3>
                    <p class="text-gray-600 text-center leading-relaxed">Submit laporan dan lacak progres penanganan secara real-time</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center">
            <p class="text-sm text-gray-500 mt-6">Respon rata-rata dalam <span class="font-semibold text-gray-700">2-3 hari kerja</span></p>
        </div>
    </div>
</section>

        <!-- Modal untuk menampilkan gambar full -->
        <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 hidden flex items-center justify-center z-50">
            <span class="absolute top-4 right-6 text-white text-3xl cursor-pointer" onclick="closeImageModal()">&times;</span>
            <img id="modalImage" src="" class="max-h-[90%] max-w-[90%] rounded-lg shadow-lg">
        </div>

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
        // Navbar Scroll Behavior
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('mainNav');
            const heroSection = document.querySelector('.hero-section');
            let lastScroll = 0;
            
            // Set initial state
            function updateNavbar() {
                const scrollPosition = window.scrollY;
                const heroHeight = heroSection ? heroSection.offsetHeight : 0;
                const heroTop = heroSection ? heroSection.offsetTop : 0;
                
                // Jika di bagian paling atas
                if (scrollPosition <= 10) {
                    navbar.classList.add('at-top');
                    navbar.classList.remove('hidden');
                    return;
                } else {
                    navbar.classList.remove('at-top');
                }
                
                // Jika scroll ke bawah
                if (scrollPosition > lastScroll && scrollPosition > 100) {
                    navbar.classList.add('hidden');
                } 
                // Jika scroll ke atas
                else if (scrollPosition < lastScroll - 10) {
                    navbar.classList.remove('hidden');
                }
                
                lastScroll = scrollPosition;
                
                // Update posisi section hero
                if (heroSection) {
                    if (scrollPosition <= 10) {
                        heroSection.style.paddingTop = '180px';
                        heroSection.style.paddingBottom = '150px';
                        heroSection.style.marginTop = '0';
                    } else {
                        heroSection.style.paddingTop = '140px';
                        heroSection.style.paddingBottom = '120px';
                        heroSection.style.marginTop = '0';
                    }
                }
            }
            
            // Jalankan sekali saat load halaman
            updateNavbar();
            
            // Update saat scroll
            window.addEventListener('scroll', updateNavbar);
            
            // Update saat resize
            window.addEventListener('resize', updateNavbar);
        });
        
        // Initialize read more functionality when DOM is loaded
        document.addEventListener("DOMContentLoaded", function () {
            initializeReadMore();
        });

        function initializeReadMore() {
            // Proses semua elemen dengan class complaint-content
            document.querySelectorAll('.complaint-content').forEach(function(element) {
                const fullText = element.getAttribute('data-full');
                const textElement = element.querySelector('.complaint-text');
                const button = element.querySelector('.read-more-btn');
                
                if (fullText && fullText.length > 80) {
                    const shortText = fullText.substring(0, 80) + '...';
                    let isExpanded = false;
                    
                    textElement.textContent = shortText;
                    
                    if (button) {
                        button.addEventListener('click', function() {
                            if (!isExpanded) {
                                textElement.textContent = fullText;
                                button.innerHTML = '<i class="fas fa-chevron-up mr-1"></i>Tutup';
                                isExpanded = true;
                            } else {
                                textElement.textContent = shortText;
                                button.innerHTML = '<i class="fas fa-chevron-down mr-1"></i>Baca selengkapnya';
                                isExpanded = false;
                            }
                        });
                    }
                } else {
                    // Jika teks pendek, sembunyikan tombol
                    if (button) button.style.display = 'none';
                }
            });

            // Proses semua elemen admin-response
            document.querySelectorAll('.admin-response').forEach(function(element) {
                const fullText = element.getAttribute('data-full');
                const textElement = element.querySelector('.admin-text');
                const button = element.querySelector('.admin-read-more-btn');
                
                if (fullText && fullText.length > 80) {
                    const shortText = fullText.substring(0, 80) + '...';
                    let isExpanded = false;
                    
                    textElement.textContent = shortText;
                    
                    if (button) {
                        button.addEventListener('click', function() {
                            if (!isExpanded) {
                                textElement.textContent = fullText;
                                button.innerHTML = '<i class="fas fa-chevron-up mr-1"></i>Tutup';
                                isExpanded = true;
                            } else {
                                textElement.textContent = shortText;
                                button.innerHTML = '<i class="fas fa-chevron-down mr-1"></i>Baca selengkapnya';
                                isExpanded = false;
                            }
                        });
                    }
                } else {
                    // Jika teks pendek, sembunyikan tombol
                    if (button) button.style.display = 'none';
                }
            });
        }

        function openImageModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
</body>
</html>