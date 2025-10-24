<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kelola Laporan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">

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
                        <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden z-50">
                            <a href="{{ route('admin.complaints.dashboard') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                <i class="fas fa-database mr-2"></i>Kelola Pengaduan
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

        <!-- Welcome Section -->
        <section class="bg-gray-700 text-white py-12">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl font-bold mb-2">Kelola Laporan</h1>
                <p class="text-lg mb-4">Kelola & pantau seluruh laporan masyarakat</p>
                <a href="/admin/complaints" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200">
                    <i class="fas fa-tasks mr-2"></i>Kelola Semua Laporan
                </a>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-8 -mt-6 relative z-10">
            <div class="container mx-auto px-4">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                        <div class="p-4">
                            <div class="text-4xl font-bold text-red-500 mb-2">{{ $stats['total'] ?? 0 }}</div>
                            <div class="text-gray-600 font-medium">Total Laporan</div>
                            <div class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-chart-line mr-1"></i>Semua waktu
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="text-4xl font-bold text-orange-500 mb-2">{{ $stats['processing'] ?? 0 }}</div>
                            <div class="text-gray-600 font-medium">Sedang Diproses</div>
                            <div class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-clock mr-1"></i>Dalam antrian
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="text-4xl font-bold text-green-500 mb-2">{{ $stats['resolved'] ?? 0 }}</div>
                            <div class="text-gray-600 font-medium">Telah Selesai</div>
                            <div class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-check-circle mr-1"></i>Terselesaikan
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="text-4xl font-bold text-blue-500 mb-2">{{ $stats['pending'] ?? 0 }}</div>
                            <div class="text-gray-600 font-medium">Menunggu</div>
                            <div class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-hourglass-half mr-1"></i>Perlu tindakan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="py-8">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                    <!-- Laporan Terbaru -->
                    <div class="bg-white rounded-lg shadow-lg h-full flex flex-col">
                        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                            <h2 class="text-2xl font-bold flex items-center text-gray-800">
                                <i class="fas fa-list text-gray-600 mr-3"></i>
                                Laporan Terbaru
                            </h2>
                            <a href="{{ route('admin.complaints.dashboard') }}" 
                               class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors text-sm">
                                <i class="fas fa-arrow-right mr-1"></i>Kelola Semua
                            </a>
                        </div>
                        <div class="p-6 space-y-4 max-h-96 overflow-y-auto flex-1">
                            @forelse($recentComplaints as $complaint)
                                <div class="border-l-4 
                                    @if($complaint->status == 'resolved') border-green-500 bg-green-50
                                    @elseif($complaint->status == 'processing') border-yellow-500 bg-yellow-50
                                    @else border-red-500 bg-red-50 @endif
                                    pl-4 py-3 rounded-r-lg hover:shadow-md transition-all flex space-x-4">
                                    
                                    <!-- Thumbnail Image -->
                                    @if($complaint->image_path)
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('storage/'.$complaint->image_path) }}" 
                                                 alt="Complaint Image" 
                                                 class="w-16 h-16 rounded-lg object-cover border border-gray-200 cursor-pointer hover:opacity-80 transition"
                                                 onclick="openImageModal('{{ asset('storage/'.$complaint->image_path) }}')">
                                        </div>
                                    @else
                                        <div class="flex-shrink-0 w-16 h-16 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center text-xs text-gray-400 bg-gray-50">
                                            <i class="fas fa-image text-2xl"></i>
                                        </div>
                                    @endif

                                    <!-- Content -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex justify-between items-start">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                {{ $complaint->title }}
                                            </p>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($complaint->type === 'pengaduan') bg-blue-100 text-blue-800
                                                @else bg-green-100 text-green-800 @endif">
                                                {{ ucfirst($complaint->type) }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-500 truncate mt-1">
                                            {{ Str::limit($complaint->content, 80) }}
                                        </p>

                                        <!-- Admin Response -->
                                        @if($complaint->admin_response)
                                            <div class="text-sm text-blue-700 bg-blue-50 border border-blue-200 rounded p-2 mb-2">
                                                <i class="fas fa-reply mr-1"></i> {{ Str::limit($complaint->admin_response, 60) }}
                                            </div>
                                        @endif

                                        <div class="flex justify-between items-center text-xs text-gray-500">
                                            <div class="flex items-center">
                                                <i class="fas fa-user mr-1"></i> {{ $complaint->user->name ?? 'Unknown' }}
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-clock mr-1"></i> {{ $complaint->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <i class="fas fa-inbox text-gray-300 text-5xl mb-4"></i>
                                    <p class="text-gray-500 text-lg">Belum ada laporan terbaru</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Statistik Laporan -->
                    <div class="bg-white rounded-lg shadow-lg h-full flex flex-col">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                                    <i class="fas fa-chart-pie text-blue-500 mr-3"></i>
                                    Statistik Laporan
                                </h2>
                                <div class="flex space-x-2">
                                    <button id="barChartBtn" class="px-3 py-1 text-sm rounded-lg bg-blue-500 text-white hover:bg-blue-600 transition">
                                        <i class="fas fa-chart-bar mr-1"></i> Batang
                                    </button>
                                    <button id="lineChartBtn" class="px-3 py-1 text-sm rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                                        <i class="fas fa-chart-line mr-1"></i> Garis
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6 flex-1 overflow-y-auto">
                            <!-- Chart Container -->
                            <div class="mb-6 bg-gray-50 p-4 rounded-lg">
                                <div style="position: relative; height: 280px;">
                                    <canvas id="reportChart"></canvas>
                                </div>
                                @if(empty($chartData['totalPengaduan']) && empty($chartData['totalAspirasi']))
                                    <div class="text-center py-8 text-gray-500">
                                        <i class="fas fa-chart-bar text-4xl mb-2"></i>
                                        <p>Belum ada data laporan untuk ditampilkan</p>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Data Tables -->
                            <div class="space-y-6">
                                <!-- Pengaduan Section -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                                        <span class="w-3 h-3 rounded-full bg-blue-500 mr-2"></span>
                                        Pengaduan
                                    </h3>
                                    <div class="bg-gray-50 rounded-lg p-3">
                                        <div class="flex justify-between items-center py-2 px-2">
                                            <span class="text-gray-700">Total Laporan</span>
                                            <div class="flex items-center space-x-2">
                                                <span class="font-semibold text-blue-600" data-pengaduan-count>{{ $chartData['totalPengaduan'] ?? 0 }}</span>
                                                <span class="text-xs text-gray-500">laporan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Aspirasi Section -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                                        <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                                        Aspirasi
                                    </h3>
                                    <div class="bg-gray-50 rounded-lg p-3">
                                        <div class="flex justify-between items-center py-2 px-2">
                                            <span class="text-gray-700">Total Laporan</span>
                                            <div class="flex items-center space-x-2">
                                                <span class="font-semibold text-green-600" data-aspirasi-count>{{ $chartData['totalAspirasi'] ?? 0 }}</span>
                                                <span class="text-xs text-gray-500">laporan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <p class="text-sm text-gray-600">Portal Pengaduan Masyarakat</p>
                        <p class="text-xs text-gray-500 mt-1">© 2025 All rights reserved</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Modal Gambar -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center z-50" onclick="closeImageModal()">
        <div class="relative max-w-4xl max-h-screen p-4" onclick="event.stopPropagation()">
            <button onclick="closeImageModal()" 
                    class="absolute -top-2 -right-2 bg-white rounded-full p-3 shadow-lg hover:bg-gray-100 transition z-10">
                <i class="fas fa-times text-gray-700 text-xl"></i>
            </button>
            <img id="modalImage" src="" alt="Preview" class="max-h-[90vh] max-w-full rounded-lg shadow-2xl">
        </div>
    </div>

    <script>
        // User Menu Toggle
        document.addEventListener("DOMContentLoaded", function () {
            const button = document.getElementById("userMenuButton");
            const menu = document.getElementById("userMenu");

            if (button && menu) {
                button.addEventListener("click", function (e) {
                    e.stopPropagation();
                    menu.classList.toggle("hidden");
                });

                document.addEventListener("click", function (e) {
                    if (!button.contains(e.target) && !menu.contains(e.target)) {
                        menu.classList.add("hidden");
                    }
                });
            }
        });

        // Image Modal Functions
        function openImageModal(src) {
            const modal = document.getElementById("imageModal");
            const modalImage = document.getElementById("modalImage");
            
            if (modal && modalImage) {
                modalImage.src = src;
                modal.classList.remove("hidden");
                modal.classList.add("flex");
                document.body.style.overflow = 'hidden';
            }
        }

        function closeImageModal() {
            const modal = document.getElementById("imageModal");
            if (modal) {
                modal.classList.remove("flex");
                modal.classList.add("hidden");
                document.body.style.overflow = 'auto';
            }
        }

        // Chart.js Implementation
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('reportChart');
            if (!ctx) return;
            
            const chartContext = ctx.getContext('2d');
            const barChartBtn = document.getElementById('barChartBtn');
            const lineChartBtn = document.getElementById('lineChartBtn');
            
            // Get chart data from PHP
            @php
                $defaultChartData = [
                    'totalPengaduan' => 0,
                    'totalAspirasi' => 0
                ];
                $chartDataJson = json_encode($chartData ?? $defaultChartData, JSON_HEX_TAG);
            @endphp
            const chartData = {!! $chartDataJson !!};
            
            // Debug: Log chart data to console
            console.log('Chart Data:', chartData);
            
            // Prepare chart data
            const chartLabels = ['Jumlah Laporan'];
            const pengaduanData = [chartData.totalPengaduan || 0];
            const aspirasiData = [chartData.totalAspirasi || 0];
            
            // Update the UI with the counts
            document.querySelectorAll('[data-pengaduan-count]').forEach(el => {
                el.textContent = chartData.totalPengaduan || 0;
            });
            
            document.querySelectorAll('[data-aspirasi-count]').forEach(el => {
                el.textContent = chartData.totalAspirasi || 0;
            });
            
            // Prepare data for bar chart
            const barLabels = chartLabels;
            
            // Prepare data for line chart
            const lineLabels = Object.keys(chartData.dailyCounts || {}).sort();
            const pengaduanLineData = lineLabels.map(date => chartData.dailyCounts[date]?.pengaduan || 0);
            const aspirasiLineData = lineLabels.map(date => chartData.dailyCounts[date]?.aspirasi || 0);
            const totalLineData = lineLabels.map((date, i) => pengaduanLineData[i] + aspirasiLineData[i]);
            
            // Format labels to be more readable
            const formattedLabels = lineLabels.map(date => {
                const d = new Date(date);
                return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' });
            });
            
            // Bar Chart Configuration
            const barConfig = {
                type: 'bar',
                data: {
                    labels: barLabels,
                    datasets: [
                        {
                            label: 'Pengaduan',
                            data: pengaduanData,
                            backgroundColor: 'rgba(59, 130, 246, 0.8)',
                            borderColor: 'rgba(59, 130, 246, 1)',
                            borderWidth: 2,
                            barPercentage: 0.8,
                            categoryPercentage: 0.9
                        },
                        {
                            label: 'Aspirasi',
                            data: aspirasiData,
                            backgroundColor: 'rgba(16, 185, 129, 0.8)',
                            borderColor: 'rgba(16, 185, 129, 1)',
                            borderWidth: 2,
                            barPercentage: 0.8,
                            categoryPercentage: 0.9
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'x',
                    scales: {
                        x: {
                            stacked: true,
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            },
                            stacked: true
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                boxWidth: 12,
                                padding: 20
                            }
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Laporan per Jenis',
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            padding: {
                                bottom: 20
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += context.parsed.y + ' laporan';
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            };
            
            // Debug log
            console.log('Line Labels:', formattedLabels);
            console.log('Pengaduan Data:', pengaduanLineData);
            console.log('Aspirasi Data:', aspirasiLineData);
            console.log('Total Data:', totalLineData);
            
            // Line Chart Configuration
            const lineConfig = {
                type: 'line',
                data: {
                    labels: formattedLabels,
                    datasets: [
                        {
                            label: 'Pengaduan',
                            data: pengaduanLineData,
                            borderColor: 'rgba(59, 130, 246, 1)',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: false,
                            pointRadius: 3,
                            pointHoverRadius: 5
                        },
                        {
                            label: 'Aspirasi',
                            data: aspirasiLineData,
                            borderColor: 'rgba(16, 185, 129, 1)',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 2,
                            tension: 0.3,
                            fill: false,
                            pointRadius: 3,
                            pointHoverRadius: 5
                        },
                        {
                            label: 'Total',
                            data: totalLineData,
                            borderColor: 'rgba(99, 102, 241, 1)',
                            backgroundColor: 'rgba(99, 102, 241, 0.2)',
                            borderWidth: 3,
                            tension: 0.4,
                            fill: false,
                            pointBackgroundColor: 'rgba(99, 102, 241, 1)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Tren Laporan 30 Hari Terakhir',
                            font: {
                                size: 16,
                                weight: 'bold'
                            }
                        }
                    }
                }
            };
            
            // Initialize chart
            let myChart = new Chart(chartContext, barConfig);
            
            // Toggle between charts
            if (barChartBtn && lineChartBtn) {
                barChartBtn.addEventListener('click', function() {
                    myChart.destroy();
                    myChart = new Chart(chartContext, barConfig);
                    
                    barChartBtn.classList.remove('bg-gray-200', 'text-gray-700');
                    barChartBtn.classList.add('bg-blue-500', 'text-white');
                    lineChartBtn.classList.remove('bg-blue-500', 'text-white');
                    lineChartBtn.classList.add('bg-gray-200', 'text-gray-700');
                });
                
                lineChartBtn.addEventListener('click', function() {
                    myChart.destroy();
                    myChart = new Chart(chartContext, lineConfig);
                    
                    lineChartBtn.classList.remove('bg-gray-200', 'text-gray-700');
                    lineChartBtn.classList.add('bg-blue-500', 'text-white');
                    barChartBtn.classList.remove('bg-blue-500', 'text-white');
                    barChartBtn.classList.add('bg-gray-200', 'text-gray-700');
                });
            }
        });
    </script>
</body>
</html>