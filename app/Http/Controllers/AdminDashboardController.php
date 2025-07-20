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
        // Fetch data for the dashboard
        $totalAnakKariah = AnakKariah::count(); // Total registered Anak Kariah
        $activeMembers = AnakKariah::where('status', 'active')->count(); // Active members
        $inactiveMembers = AnakKariah::where('status', 'inactive')->count(); // Inactive members
    
        // Get recent registrations (latest 5)
        $recentRegistrations = AnakKariah::latest()->take(5)->get();
        $anakKariahs = AnakKariah::orderBy('created_at', 'desc')->get();
    
        // Fetch admins
        $admins = User::where('role', 'admin')->latest()->get();
    
        $allData = DB::table('anak_kariah')->get();
    
        // Get monthly trends (new members added each month in the current year)
        $monthlyTrends = AnakKariah::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    
        // Pass data to the view
        return view('admin.dashboard', compact(
            'anakKariahs',
            'totalAnakKariah',
            'activeMembers',
            'inactiveMembers',
            'recentRegistrations',
            'allData',
            'monthlyTrends',
            'admins' // Ensure this is included
        ));
    }
    


    public function dashboard()
    {
        $anakKariahs = AnakKariah::all(); // Fetch all data
        $totalAnakKariah = $anakKariahs->count();
        $activeMembers = $anakKariahs->where('status', 'active')->count();
        $inactiveMembers = $anakKariahs->where('status', 'inactive')->count();
    
        // Fetch area statistics
        $areaStats = AnakKariah::select('area', DB::raw('COUNT(*) as count'))
            ->groupBy('area')
            ->get();

        $areas = $areaStats->pluck('area'); // Extract areas
        $counts = $areaStats->pluck('count'); // Extract counts

        // Pass data to the view
        return view('admin.dashboard', compact(
            'totalAnakKariah',
            'activeMembers',
            'inactiveMembers',
            'areas',
            'counts',
            'anakKariahs' // Pass recent records
        ));
    }
    
}
