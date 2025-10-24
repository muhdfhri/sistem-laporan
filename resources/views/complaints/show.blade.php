<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan - Portal Laporan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // User menu toggle
            const button = document.getElementById("userMenuButton");
            const menu = document.getElementById("userMenu");
            const imageModal = document.getElementById('imageModal');
            const deleteModal = document.getElementById('deleteModal');
            let currentDeleteId = null;

            if (button && menu) {
                button.addEventListener("click", (e) => {
                    e.stopPropagation();
                    menu.classList.toggle("hidden");
                });
            }

            // Close modals when clicking outside
            document.addEventListener('click', function(event) {
                if (menu && !menu.contains(event.target) && button && !button.contains(event.target)) {
                    menu.classList.add('hidden');
                }
                
                if (imageModal && event.target === imageModal) {
                    closeImageModal();
                }
                
                if (deleteModal && event.target === deleteModal) {
                    hideDeleteModal();
                }
            });

            // Close with ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (!deleteModal.classList.contains('hidden')) {
                        hideDeleteModal();
                    }
                    if (!imageModal.classList.contains('hidden')) {
                        closeImageModal();
                    }
                }
            });
        });

        // Make functions globally available
        window.showDeleteModal = function(id, title) {
            const deleteModal = document.getElementById('deleteModal');
            if (deleteModal) {
                document.getElementById('itemTitle').textContent = title;
                deleteModal.classList.remove('hidden');
                currentDeleteId = id;
            }
        };

        window.hideDeleteModal = function() {
            const deleteModal = document.getElementById('deleteModal');
            if (deleteModal) {
                deleteModal.classList.add('hidden');
                currentDeleteId = null;
            }
        };

        window.confirmDelete = function() {
            if (currentDeleteId) {
                const form = document.getElementById('deleteForm');
                if (form) {
                    form.action = `/complaints/${currentDeleteId}`;
                    form.submit();
                }
            }
        };

        // Image modal functions
        window.openImageModal = function(src) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            if (modal && modalImg) {
                modalImg.src = src;
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        };

        window.closeImageModal = function() {
            const modal = document.getElementById('imageModal');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        };
    </script>
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
                    <i class="fas fa-file-alt text-red-500 mr-3"></i> Detail Laporan
                </h2>
                <a href="{{ route('complaints.index') }}" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke daftar
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
            @endif

            <div class="space-y-6">
                <!-- Informasi Laporan -->
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Laporan</h3>
                    
                    <!-- Judul -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul Laporan</label>
                        <div class="p-3 bg-gray-100 border border-gray-200 rounded-lg">
                            {{ $complaint->title }}
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <div class="inline-block">
                            @if ($complaint->status == 'pending')
                                <span class="px-3 py-1 text-xs bg-yellow-100 text-yellow-700 rounded-full font-medium">
                                    <i class="fas fa-clock mr-1"></i>Menunggu
                                </span>
                            @elseif ($complaint->status == 'processing')
                                <span class="px-3 py-1 text-xs bg-blue-100 text-blue-700 rounded-full font-medium">
                                    <i class="fas fa-spinner fa-spin mr-1"></i>Diproses
                                </span>
                            @elseif ($complaint->status == 'resolved')
                                <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full font-medium">
                                    <i class="fas fa-check-circle mr-1"></i>Selesai
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded-full font-medium">
                                    <i class="fas fa-times-circle mr-1"></i>Ditolak
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Jenis Laporan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Laporan</label>
                        <div class="p-3 bg-gray-100 border border-gray-200 rounded-lg">
                            @if($complaint->type == 'pengaduan')
                                <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>Pengaduan
                            @else
                                <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>Aspirasi
                            @endif
                        </div>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <div class="p-3 bg-gray-100 border border-gray-200 rounded-lg">
                            {{ ucfirst($complaint->category) }}
                        </div>
                    </div>

                    <!-- Dusun -->
                    @if($complaint->dusun)
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Dusun</label>
                        <div class="p-3 bg-gray-100 border border-gray-200 rounded-lg">
                            {{ $complaint->dusun }}
                        </div>
                    </div>
                    @endif

                    <!-- Lokasi -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                        <div class="p-3 bg-gray-100 border border-gray-200 rounded-lg">
                            {{ $complaint->location }}
                        </div>
                    </div>

                    <!-- Tanggal Dibuat -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Dibuat Pada</label>
                        <div class="p-3 bg-gray-100 border border-gray-200 rounded-lg">
                            {{ $complaint->created_at->format('d F Y H:i') }} WIB
                        </div>
                    </div>

                    <!-- Isi Laporan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Isi Laporan</label>
                        <div class="p-3 bg-gray-100 border border-gray-200 rounded-lg whitespace-pre-line">
                            {{ $complaint->description }}
                        </div>
                    </div>

                    <!-- Gambar -->
                    @if($complaint->image_path)
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Lampiran Gambar</label>
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$complaint->image_path) }}" 
                                     alt="Laporan Gambar" 
                                     class="max-w-full h-auto rounded-lg border border-gray-200 cursor-pointer"
                                     onclick="openImageModal('{{ asset('storage/'.$complaint->image_path) }}')">
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Tanggapan Admin -->
                @if($complaint->admin_response)
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-6 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-user-tie text-blue-500 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-blue-800">Tanggapan Admin</h3>
                                <div class="mt-2 text-blue-700">
                                    <p class="whitespace-pre-line">{{ $complaint->admin_response }}</p>
                                </div>
                                @if($complaint->responded_at)
                                    <div class="mt-2 text-sm text-blue-600">
                                        <i class="far fa-clock mr-1"></i> 
                                        Ditanggapi pada {{ $complaint->responded_at->format('d F Y H:i') }} WIB
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Tombol Aksi -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('complaints.edit', $complaint->id) }}" 
                       class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center">
                        <i class="fas fa-edit mr-2"></i> Edit Laporan
                    </a>
                    <button onclick="showDeleteModal('{{ $complaint->id }}', '{{ addslashes($complaint->title) }}')" 
                            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition flex items-center">
                        <i class="fas fa-trash-alt mr-2"></i> Hapus Laporan
                    </button>
                    
                    <!-- Hidden form for delete action -->
                    <form id="deleteForm" action="" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>

            <!-- Likes & Views -->
            <div class="flex justify-between items-center mt-6">
                <div class="flex items-center space-x-4">
                    <form action="{{ route('complaints.like', $complaint->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            👍 Like ({{ $complaint->likes }})
                        </button>
                    </form>
                    <span class="text-gray-600">
                        👁 {{ $complaint->views }} views
                    </span>
                </div>
            </div>
        </div>

        {{-- Related complaints --}}
        @if(isset($relatedComplaints) && $relatedComplaints->count())
            <div class="mt-10">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Keluhan Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($relatedComplaints as $related)
                        <a href="{{ route('complaints.show', $related->id) }}" 
                           class="block p-4 bg-gray-50 rounded-lg hover:shadow">
                            <h3 class="font-semibold text-gray-800">
                                {{ $related->title }}
                            </h3>
                            <p class="text-sm text-gray-600">
                                {{ Str::limit($related->content, 80) }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
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
                        <p class="text-sm text-gray-600">Portal Laporan Masyarakat</p>
                        <p class="text-xs text-gray-500 mt-1">© 2025 All rights reserved</p>
                    </div>
                </div>
            </div>
        </footer>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Konfirmasi Penghapusan</h3>
            <p class="text-gray-600 mb-6">
                Yakin ingin menghapus laporan "<span id="itemTitle" class="font-semibold text-gray-800"></span>"? 
                Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex justify-center space-x-3">
                <button type="button" 
                        onclick="hideDeleteModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                    <i class="fas fa-times mr-2"></i>Batal
                </button>
                <button type="button" 
                        onclick="confirmDelete()"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    <i class="fas fa-trash mr-2"></i>Hapus
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="relative">
        <button onclick="closeImageModal()" class="absolute -top-10 right-0 text-white hover:text-gray-300">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <img id="modalImage" src="" alt="Preview" class="max-h-[90vh] max-w-[90vw] rounded-lg">
    </div>
</div>



</body>
</html>