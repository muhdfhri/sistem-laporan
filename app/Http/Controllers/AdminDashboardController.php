<?php

namespace App\Http\Controllers;

use App\Models\Complaint;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik lengkap untuk 4 cards
        $stats = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'processing' => Complaint::where('status', 'processing')->count(),
            'resolved' => Complaint::where('status', 'resolved')->count(),
            'rejected' => Complaint::where('status', 'rejected')->count(),
        ];

        // Recent complaints dengan relasi user
        $recentComplaints = Complaint::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Statistik kategori untuk panel kedua
        $categoryStats = Complaint::selectRaw('category, count(*) as count')
            ->groupBy('category')
            ->orderBy('count', 'desc')
            ->get();

        // Average response days (opsional)
        $averageDays = Complaint::where('status', 'resolved')
            ->selectRaw('AVG(DATEDIFF(updated_at, created_at)) as avg_days')
            ->value('avg_days') ?? 0;

        // Data untuk chart
        $endDate = now();
        $startDate = now()->subDays(30);
        
        // Get daily counts for the last 30 days
        $dailyCounts = [];
        $currentDate = $startDate->copy();
        
        while ($currentDate <= $endDate) {
            $dateStr = $currentDate->format('Y-m-d');
            $dailyCounts[$dateStr] = [
                'pengaduan' => 0,
                'aspirasi' => 0
            ];
            $currentDate->addDay();
        }
        
        // Get actual data from database
        $complaints = Complaint::where('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, type, COUNT(*) as count')
            ->groupBy('date', 'type')
            ->get();
            
        foreach ($complaints as $complaint) {
            $date = date('Y-m-d', strtotime($complaint->date));
            if (isset($dailyCounts[$date])) {
                $dailyCounts[$date][$complaint->type] = (int)$complaint->count;
            }
        }
        
        $chartData = [
            'totalPengaduan' => Complaint::where('type', 'pengaduan')->count(),
            'totalAspirasi' => Complaint::where('type', 'aspirasi')->count(),
            'dailyCounts' => $dailyCounts
        ];

        // Debug info (bisa dihapus nanti)
        \Log::info('Admin Dashboard Stats: ' . json_encode($stats));
        \Log::info('Recent Complaints Count: ' . $recentComplaints->count());

        // Return ke view dashboard.blade.php (bukan admin.dashboard)
        return view('dashboard', compact('stats', 'recentComplaints', 'categoryStats', 'averageDays', 'chartData'));
    }
}