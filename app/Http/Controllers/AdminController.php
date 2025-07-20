<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User model

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->get(); // Assuming 'role' column exists
        return view('admin/admin-list', compact('admins'));
    }
}
