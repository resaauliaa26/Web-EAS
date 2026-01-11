<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $vehicles = Vehicles::count();

        return view('admin.admin-dashboard', compact('vehicles'));
    }
}
