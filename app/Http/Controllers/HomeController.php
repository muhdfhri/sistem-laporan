<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->is_admin) {
            // Jika admin, siapkan data untuk dashboard admin
            $recentComplaints = Complaint::latest()
                ->take(5)
                ->get();
                
            $stats = [
                'total' => Complaint::count(),
                'processing' => Complaint::where('status', 'processing')->count(),
                'resolved' => Complaint::where('status', 'resolved')->count(),
                'average_days' => Complaint::where('status', 'resolved')
                    ->selectRaw('AVG(DATEDIFF(updated_at, created_at)) as avg_days')
                    ->value('avg_days') ?? 7,
            ];
            
            // Get counts by type
            $typeStats = Complaint::selectRaw('type, COUNT(*) as count')
                ->groupBy('type')
                ->orderBy('type')
                ->get()
                ->keyBy('type');
            
            // Initialize data arrays
            $labels = ['Pengaduan', 'Aspirasi'];
            $pengaduanCount = $typeStats->get('pengaduan') ? (int)$typeStats['pengaduan']->count : 0;
            $aspirasiCount = $typeStats->get('aspirasi') ? (int)$typeStats['aspirasi']->count : 0;
            
            // For bar chart (showing both types)
            $pengaduanData = [$pengaduanCount, 0];
            $aspirasiData = [0, $aspirasiCount];
            
            // Get dates for the last 30 days
            $dates = [];
            $dailyCounts = [];
            
            for ($i = 29; $i >= 0; $i--) {
                $date = now()->subDays($i)->format('Y-m-d');
                $dates[] = $date;
                $dailyCounts[$date] = 0; // Initialize with 0
            }
            
            // Get actual daily counts from the database
            $actualDailyCounts = Complaint::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->where('created_at', '>=', now()->subDays(30))
                ->groupBy('date')
                ->orderBy('date')
                ->pluck('count', 'date')
                ->toArray();
            
            // Merge actual counts with the initialized array
            foreach ($actualDailyCounts as $date => $count) {
                if (array_key_exists($date, $dailyCounts)) {
                    $dailyCounts[$date] = (int)$count;
                }
            }
            
            // Prepare chart data for the view
            $chartData = [
                'labels' => $labels,
                'pengaduanData' => $pengaduanData,
                'aspirasiData' => $aspirasiData,
                'dates' => $dates,
                'dailyCounts' => $dailyCounts,
                'totalPengaduan' => $pengaduanCount,
                'totalAspirasi' => $aspirasiCount
            ];
            
            // For the stats table
            $categoryStats = collect([
                (object)['type' => 'pengaduan', 'count' => $pengaduanCount],
                (object)['type' => 'aspirasi', 'count' => $aspirasiCount]
            ]);
            
            $averageDays = (float)$stats['average_days'];
            
            // Debug: Log chart data
            \Log::info('Chart Data:', $chartData);
            
            // For admin users, we'll use the same view but with admin-specific data
            $viewData = [
                'stats' => $stats,
                'recentComplaints' => $recentComplaints,
                'categoryStats' => $categoryStats,
                'averageDays' => $averageDays,
                'pengaduanStats' => $pengaduanStats,
                'aspirasiStats' => $aspirasiStats,
                'chartData' => $chartData,
                'isAdmin' => true
            ];
            
            return view('dashboard', $viewData);
        } else {
            $stats = [
                'total' => Complaint::where('user_id', $user->id)->count(),
                'processing' => Complaint::where('user_id', $user->id)->where('status', 'processing')->count(),
                'resolved' => Complaint::where('user_id', $user->id)->where('status', 'resolved')->count(),
                'average_days' => Complaint::where('user_id', $user->id)
                    ->where('status', 'resolved')
                    ->selectRaw('AVG(DATEDIFF(updated_at, created_at)) as avg_days')
                    ->value('avg_days') ?? 7,
            ];

            $myComplaints = Complaint::where('user_id', $user->id)
                ->latest()
                ->take(5)
                ->get();
                
            // Get chart data for regular users (only their own data)
            $pengaduanStats = Complaint::where('user_id', $user->id)
                ->where('type', 'pengaduan')
                ->selectRaw('category, COUNT(*) as count')
                ->groupBy('category')
                ->orderBy('count', 'desc')
                ->get();
                
            $aspirasiStats = Complaint::where('user_id', $user->id)
                ->where('type', 'aspirasi')
                ->selectRaw('category, COUNT(*) as count')
                ->groupBy('category')
                ->orderBy('count', 'desc')
                ->get();
                
            // Prepare chart data
            $chartData = [
                'labels' => $pengaduanStats->pluck('category')
                    ->merge($aspirasiStats->pluck('category'))
                    ->unique()
                    ->toArray(),
                'pengaduanData' => $pengaduanStats->pluck('count')->toArray(),
                'aspirasiData' => $aspirasiStats->pluck('count')->toArray(),
                'dates' => Complaint::where('user_id', $user->id)
                    ->selectRaw('DATE(created_at) as date')
                    ->where('created_at', '>=', now()->subDays(30))
                    ->groupBy('date')
                    ->orderBy('date')
                    ->pluck('date')
                    ->toArray(),
                'dailyCounts' => Complaint::where('user_id', $user->id)
                    ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                    ->where('created_at', '>=', now()->subDays(30))
                    ->groupBy('date')
                    ->orderBy('date')
                    ->pluck('count', 'date')
                    ->toArray()
            ];

            // For regular users, use the same view but with user-specific data
            $viewData = [
                'stats' => $stats,
                'myComplaints' => $myComplaints,
                'chartData' => $chartData,
                'pengaduanStats' => $pengaduanStats,
                'aspirasiStats' => $aspirasiStats,
                'isAdmin' => false,
                'recentComplaints' => $myComplaints, // For consistency with admin view
                'categoryStats' => $pengaduanStats->concat($aspirasiStats)->sortByDesc('count'),
                'averageDays' => $stats['average_days']
            ];
            
            return view('dashboard', $viewData);
        }

    }
}
