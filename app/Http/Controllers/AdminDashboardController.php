<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AnakKariah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Basic statistics
        $totalAnakKariah = AnakKariah::count();
        $activeMembers = AnakKariah::where('status', 'active')->count();
        $inactiveMembers = AnakKariah::where('status', 'inactive')->count();
        
        // Calculate trends (this month vs last month)
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $lastMonth = now()->subMonth()->month;
        $lastMonthYear = now()->subMonth()->year;
        
        $newThisMonth = AnakKariah::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
            
        $newLastMonth = AnakKariah::whereMonth('created_at', $lastMonth)
            ->whereYear('created_at', $lastMonthYear)
            ->count();
            
        $changeVsLastMonth = $newThisMonth - $newLastMonth;
        
        // This week stats
        $newActiveThisWeek = AnakKariah::where('status', 'active')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();
            
        $changeInactive = 0; // You can calculate this based on your needs
        
        // Recent Anak Kariah data for the table
        $anakKariahs = AnakKariah::latest()
            ->take(10)
            ->get();
        
        // Get all data for potential chart usage
        $allData = AnakKariah::all();
        
        // Monthly trends for charts
        $monthlyTrends = AnakKariah::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        
        // Area statistics - check your actual column name
        $areaStats = AnakKariah::select('areas', DB::raw('COUNT(*) as count'))
            ->whereNotNull('areas')
            ->groupBy('areas')
            ->get();
        
        $areas = $areaStats->pluck('areas');
        $counts = $areaStats->pluck('count');
        
        // Fetch admins
        $admins = User::where('role', 'admin')->latest()->get();
        
        // Pass all data to the view
        return view('admin.dashboard', compact(
            'totalAnakKariah',
            'activeMembers',
            'inactiveMembers',
            'newThisMonth',
            'newActiveThisWeek',
            'changeInactive',
            'changeVsLastMonth',
            'anakKariahs',
            'allData',
            'monthlyTrends',
            'areas',
            'counts',
            'admins'
        ));
    }
}