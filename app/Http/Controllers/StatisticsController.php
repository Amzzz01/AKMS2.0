<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnakKariah;

class StatisticsController extends Controller
{
    public function index()
    {
        $areas = AnakKariah::pluck('areas')->unique()->toArray();
        $areaCounts = AnakKariah::groupBy('areas')->selectRaw('areas, COUNT(*) as count')->pluck('count')->toArray();

        return view('anak-kariah.statistics', compact('areas', 'areaCounts'));
    }
}