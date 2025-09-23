<?php

namespace App\Http\Controllers;

use App\Models\Pc;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Today sales
        $todaySales = Pc::whereDate('created_at', Carbon::today())
                        ->sum('sales');

        // Monthly sales (current month)
        $monthlySales = Pc::whereMonth('created_at', Carbon::now()->month)
                          ->whereYear('created_at', Carbon::now()->year)
                          ->sum('sales');

        // Total sales (all time)
        $totalSales = Pc::sum('sales');

        return view('dashboard', compact('todaySales', 'monthlySales', 'totalSales'));
    }
}
