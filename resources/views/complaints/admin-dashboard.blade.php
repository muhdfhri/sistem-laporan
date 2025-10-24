<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Laporan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-gray-800 text-white shadow-lg">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.jpg') }}" 
                     alt="Logo Deli Serdang" 
                     class="h-12 bg-white p-1 rounded-lg shadow">
                <h1 class="text-xl font-bold">Desa Sunggal Kanan - Admin</h1>
            </div>
            <div class="flex items-center space-x-4">
                <span class="hidden md:inline">Halo, {{ auth()->user()->name }}</span>
                <div class="relative inline-block">
                    <button id="userMenuButton" class="bg-red-600 px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-user-cog"></i>
                    </button>
                    <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden">
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                            <i class="fas fa-house mr-2"></i>Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Title Section -->
    <section class="bg-gray-700 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-2">Kelola Laporan</h1>
            <p class="text-lg">Pantau & tindaklanjuti laporan masyarakat</p>
        </div>
    </section>

    <!-- Table Section -->
    <section class="py-8 -mt-6 relative z-10">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center mb-4 md:mb-0">
                        <i class="fas fa-database text-blue-500 mr-3"></i>
                        Daftar Laporan
                    </h2>
                    
                    <!-- Filter Section -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <!-- Jenis Laporan Filter -->
                        <div class="relative">
                            <select id="filter-type" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Semua Jenis Laporan</option>
                                <option value="pengaduan">Pengaduan</option>
                                <option value="aspirasi">Aspirasi</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Kategori Filter -->
                        <div class="relative">
                            <select id="filter-category" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Dusun Filter -->
                        <div class="relative">
                            <select id="filter-dusun" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Semua Dusun</option>
                                <option value="Dusun I">Dusun I</option>
                                <option value="Dusun II">Dusun II</option>
                                <option value="Dusun III">Dusun III</option>
                                <option value="Dusun IV">Dusun IV</option>
                                <option value="Dusun V">Dusun V</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Reset Filter Button -->
                        <button id="reset-filter" class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-lg text-sm transition-colors">
                            <i class="fas fa-sync-alt mr-1"></i> Reset
                        </button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border text-left">Pelapor</th>
                                <th class="px-4 py-2 border text-left">Judul</th>
                                <th class="px-4 py-2 border text-left">Isi Laporan</th>
                                <th class="px-4 py-2 border text-center">Jenis Laporan</th>
                                <th class="px-4 py-2 border text-left">Kategori</th>
                                <th class="px-4 py-2 border text-center">Dusun</th>
                                <th class="px-4 py-2 border text-left">Lokasi</th>
                                <th class="px-4 py-2 border text-center">Foto</th>
                                <th class="px-4 py-2 border text-center">Status</th>
                                <th class="px-4 py-2 border text-left">Balasan Admin</th>
                                <th class="px-4 py-2 border text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentComplaints as $complaint)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-2 border">{{ $complaint->user->name ?? 'Anonim' }}</td>
                                    <td class="px-4 py-2 border">
                                        <div class="max-w-xs">
                                            <p class="font-semibold text-gray-800">{{ $complaint->title }}</p>
                                        </div>
                                    </td>

                                    {{-- Isi Laporan / Keterangan - With Modal --}}
                                    <td class="px-4 py-2 border">
                                        <div class="max-w-xs">
                                            @php
                                                $wordCount = str_word_count(strip_tags($complaint->description));
                                                $wordLimit = 10; // Show first 10 words
                                                $words = preg_split('/\s+/', strip_tags($complaint->description), $wordLimit + 1);
                                                $shouldShowMore = count($words) > $wordLimit;
                                                $preview = implode(' ', array_slice($words, 0, $wordLimit));
                                            @endphp
                                            
                                            <p class="text-sm text-gray-700 leading-relaxed">
                                                {{ $preview }}{{ $shouldShowMore ? '...' : '' }}
                                            </p>
                                            
                                            @if($shouldShowMore)
                                                <div class="w-full">
                                                    <button onclick='showFullDescription({{ $complaint->id }}, `{{ str_replace(["`", "\"", "\n"], ["'", "'", " "], $complaint->description) }}`)' 
                                                            class="text-blue-500 text-xs hover:underline mt-1 text-left">
                                                        Lihat selengkapnya
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                    {{-- Jenis Laporan --}}
                                    <td class="px-4 py-2 border text-center">
                                        @if($complaint->type === 'pengaduan')
                                            <span class="inline-block px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full">
                                                Pengaduan
                                            </span>
                                        @else
                                            <span class="inline-block px-3 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">
                                                Aspirasi
                                            </span>
                                        @endif
                                    </td>
                                        </div>
                                    </td>

                                    {{-- Kategori --}}
                                    <td class="px-4 py-2 border">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ ucfirst($complaint->category) }}
                                        </span>
                                    </td>

                                    {{-- Dusun --}}
                                    <td class="px-4 py-2 border text-center">
                                        @if($complaint->dusun)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                {{ $complaint->dusun }}
                                            </span>
                                        @else
                                            <span class="text-gray-400 text-xs">-</span>
                                        @endif
                                    </td>

                                    {{-- Lokasi --}}
                                    <td class="px-4 py-2 border">
                                        <div class="flex items-center text-sm text-gray-600">
                                            <i class="fas fa-map-marker-alt text-red-500 mr-1"></i>
                                            {{ $complaint->location }}
                                        </div>
                                    </td>

                                    {{-- Thumbnail Foto --}}
                                    <td class="px-4 py-2 border text-center">
                                        @if($complaint->image_path)
                                            <a href="{{ asset('storage/' . $complaint->image_path) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $complaint->image_path) }}" 
                                                    alt="Lampiran" 
                                                    class="h-16 w-16 object-cover rounded shadow hover:scale-105 transition-transform">
                                            </a>
                                        @else
                                            <span class="text-gray-400 italic text-xs">Tidak ada foto</span>
                                        @endif
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-4 py-2 border text-center">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium
                                            @if($complaint->status == 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($complaint->status == 'processing') bg-blue-100 text-blue-800
                                            @elseif($complaint->status == 'resolved') bg-green-100 text-green-800
                                            @elseif($complaint->status == 'rejected') bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($complaint->status) }}
                                        </span>
                                    </td>

                                    {{-- Balasan --}}
                                    <td class="px-4 py-2 border">
                                        <div class="max-w-xs">
                                            @if($complaint->admin_response)
                                                @if(strlen($complaint->admin_response) > 50)
                                                    <p class="text-gray-700 text-sm line-clamp-2">
                                                        {{ Str::limit($complaint->admin_response, 50) }}
                                                    </p>
                                                    <button onclick='showFullResponse({{ $complaint->id }}, `{{ str_replace(["`", "\"", "\n"], ["'", "'", " "], $complaint->admin_response) }}`, "{{ $complaint->responded_at?->format('d M Y H:i') }}")' 
                                                            class="text-blue-500 text-xs hover:underline mt-1">
                                                        Lihat selengkapnya
                                                    </button>
                                                @else
                                                    <p class="text-gray-700 text-sm">{{ $complaint->admin_response }}</p>
                                                @endif
                                                <p class="text-xs text-gray-500 mt-1 response-time">
                                                    Dibalas: {{ $complaint->responded_at?->diffForHumans() }}
                                                </p>
                                            @else
                                                <span class="text-gray-400 italic text-sm">Belum ada balasan</span>
                                            @endif
                                        </div>
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-4 py-2 border">
                                        <form action="{{ route('admin.complaints.updateStatus', $complaint->id) }}" method="POST" class="space-y-2">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="border rounded px-2 py-1 text-sm w-full">
                                                <option value="pending" @selected($complaint->status == 'pending')>Ditunda</option>
                                                <option value="processing" @selected($complaint->status == 'processing')>Diproses</option>
                                                <option value="resolved" @selected($complaint->status == 'resolved')>Diterima</option>
                                                <option value="rejected" @selected($complaint->status == 'rejected')>Ditolak</option>
                                            </select>
                                            <textarea name="admin_response" placeholder="Tulis balasan..." rows="2"
                                                class="border rounded px-2 py-1 text-sm block w-full resize-none">{{ old('admin_response', $complaint->admin_response) }}</textarea>
                                            <button type="submit"
                                                class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 w-full transition-colors">
                                                <i class="fas fa-save mr-1"></i>Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="px-4 py-6 text-center text-gray-500">
                                        <i class="fas fa-inbox text-gray-300 text-2xl mb-2"></i><br>
                                        Belum ada laporan masuk.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Full Content -->
    <div id="descriptionModal" class="fixed inset-0 bg-black bg-opacity-70 hidden flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-hidden modal-enter">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-6 border-b border-gray-200">
                <div class="flex items-center">
                    <i class="fas fa-file-alt text-blue-500 text-xl mr-3"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Isi Laporan Lengkap</h3>
                </div>
                <button onclick="closeDescriptionModal()" class="text-gray-400 hover:text-gray-600 text-xl transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <!-- Modal Content -->
            <div class="p-6 overflow-y-auto max-h-[60vh]">
                <div class="bg-gray-50 border-l-4 border-gray-400 p-4 rounded-r-lg">
                    <p id="modalDescriptionContent" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="flex justify-end p-6 border-t border-gray-200 bg-gray-50">
                <button onclick="closeDescriptionModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-medium">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Full Response -->
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
                    <span id="modalResponseTime">-</span>
                </div>
                
                <!-- Isi Balasan -->
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
                    <p id="modalResponseContent" class="text-gray-700 leading-relaxed whitespace-pre-line"></p>
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
    });

    // Fungsi untuk toggle konten lengkap - FIXED VERSION
    function toggleContent(complaintId) {
        const shortContent = document.getElementById(`short-content-${complaintId}`);
        const fullContent = document.getElementById(`full-content-${complaintId}`);
        const toggleBtn = document.getElementById(`toggle-btn-${complaintId}`);
        
        if (fullContent.classList.contains('hidden')) {
            // Tampilkan konten lengkap, sembunyikan konten singkat
            shortContent.classList.add('hidden');
            fullContent.classList.remove('hidden');
            toggleBtn.textContent = 'Sembunyikan';
        } else {
            // Tampilkan konten singkat, sembunyikan konten lengkap
            fullContent.classList.add('hidden');
            shortContent.classList.remove('hidden');
            toggleBtn.textContent = 'Lihat selengkapnya';
        }
    }
    </script>
    <script>
        // Function to show full description in modal
        function showFullDescription(complaintId, fullDescription) {
            try {
                // Set the description content
                const descriptionContent = document.getElementById('modalDescriptionContent');
                descriptionContent.textContent = fullDescription.replace(/\\'/g, "'");
                
                // Show the modal
                const modal = document.getElementById('descriptionModal');
                if (modal) {
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                    
                    // Focus the close button for better accessibility
                    setTimeout(() => {
                        const closeBtn = modal.querySelector('button[onclick="closeDescriptionModal()"]');
                        if (closeBtn) closeBtn.focus();
                    }, 50);
                }
            } catch (error) {
                console.error('Error showing full description:', error);
            }
        }

        // Function to close the description modal
        function closeDescriptionModal() {
            const modal = document.getElementById('descriptionModal');
            if (modal) {
                // Add fade out effect
                modal.style.opacity = '0';
                
                // Wait for animation to complete before hiding
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.style.opacity = ''; // Reset opacity for next time
                    document.body.style.overflow = '';
                }, 300);
            }
        }

        // Function to show full response in modal
        function showFullResponse(complaintId, fullResponse, responseTime) {
            try {
                // Set the response content directly (it's already escaped by Laravel)
                const responseContent = document.getElementById('modalResponseContent');
                responseContent.textContent = fullResponse.replace(/\\'/g, "'");
                
                // Set the response time
                const responseTimeElement = document.getElementById('modalResponseTime');
                if (responseTime) {
                    responseTimeElement.textContent = responseTime;
                } else {
                    responseTimeElement.textContent = 'Waktu tidak tersedia';
                }
                
                // Show the modal
                const modal = document.getElementById('responseModal');
                if (modal) {
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                    
                    // Focus the close button for better accessibility
                    setTimeout(() => {
                        const closeBtn = modal.querySelector('button[onclick="closeResponseModal()"]');
                        if (closeBtn) closeBtn.focus();
                    }, 50);
                }
            } catch (error) {
                console.error('Error showing full response:', error);
            }
        }

        // Function to close the modal
        function closeResponseModal() {
            const modal = document.getElementById('responseModal');
            if (modal) {
                // Add fade out effect
                modal.style.opacity = '0';
                
                // Wait for animation to complete before hiding
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.style.opacity = ''; // Reset opacity for next time
                    document.body.style.overflow = '';
                }, 300);
            }
        }

        // Close modals when clicking outside the modal content
        const responseModal = document.getElementById('responseModal');
        const descriptionModal = document.getElementById('descriptionModal');
        
        if (responseModal) {
            responseModal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeResponseModal();
                }
            });
        }
        
        if (descriptionModal) {
            descriptionModal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeDescriptionModal();
                }
            });
        }

        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (responseModal && !responseModal.classList.contains('hidden')) {
                    closeResponseModal();
                } else if (descriptionModal && !descriptionModal.classList.contains('hidden')) {
                    closeDescriptionModal();
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const filterType = document.getElementById('filter-type');
            const filterCategory = document.getElementById('filter-category');
            const filterDusun = document.getElementById('filter-dusun');
            const resetButton = document.getElementById('reset-filter');
            const tableRows = document.querySelectorAll('tbody tr');

            // Get current URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            
            // Set initial filter values from URL
            if (urlParams.has('type')) {
                filterType.value = urlParams.get('type');
            }
            if (urlParams.has('category')) {
                filterCategory.value = urlParams.get('category');
            }
            if (urlParams.has('dusun')) {
                filterDusun.value = urlParams.get('dusun');
            }

            // Apply initial filters
            filterComplaints();

            // Add event listeners
            [filterType, filterCategory, filterDusun].forEach(select => {
                select.addEventListener('change', function() {
                    updateURL();
                    filterComplaints();
                });
            });

            resetButton.addEventListener('click', function() {
                filterType.value = '';
                filterCategory.value = '';
                filterDusun.value = '';
                updateURL();
                filterComplaints();
            });

            function updateURL() {
                const params = new URLSearchParams();
                
                if (filterType.value) params.set('type', filterType.value);
                if (filterCategory.value) params.set('category', filterCategory.value);
                if (filterDusun.value) params.set('dusun', filterDusun.value);
                
                // Update URL without page reload
                const newUrl = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
                window.history.pushState({ path: newUrl }, '', newUrl);
            }

            function filterComplaints() {
                const typeValue = filterType.value.toLowerCase();
                const categoryValue = filterCategory.value.toLowerCase();
                const dusunValue = filterDusun.value;

                tableRows.forEach(row => {
                    if (row.classList.contains('no-data-row')) return;
                    
                    const type = row.querySelector('td:nth-child(4)').textContent.trim().toLowerCase();
                    const category = row.querySelector('td:nth-child(5)').textContent.trim().toLowerCase();
                    const dusun = row.querySelector('td:nth-child(6)').textContent.trim();
                    
                    const typeMatch = !typeValue || type === typeValue || (typeValue === 'pengaduan' && type.includes('pengaduan')) || (typeValue === 'aspirasi' && type.includes('aspirasi'));
                    const categoryMatch = !categoryValue || category === categoryValue.toLowerCase();
                    const dusunMatch = !dusunValue || dusun === dusunValue;
                    
                    if (typeMatch && categoryMatch && dusunMatch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Show/hide no data message
                const visibleRows = Array.from(tableRows).filter(row => row.style.display !== 'none' && !row.classList.contains('no-data-row'));
                const noDataRow = document.querySelector('.no-data-row');
                
                if (visibleRows.length === 0) {
                    if (!noDataRow) {
                        const newRow = document.createElement('tr');
                        newRow.className = 'no-data-row';
                        newRow.innerHTML = `
                            <td colspan="11" class="px-4 py-6 text-center text-gray-500">
                                <i class="fas fa-search text-gray-300 text-2xl mb-2"></i><br>
                                Tidak ada laporan yang sesuai dengan filter yang dipilih.
                            </td>
                        `;
                        document.querySelector('tbody').appendChild(newRow);
                    }
                } else if (noDataRow) {
                    noDataRow.remove();
                }
            }
        });
    </script>
</body>
</html>