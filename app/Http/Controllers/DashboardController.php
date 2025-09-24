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

         // Sales grouped by month (for chart)
    $monthlySalesData = Pc::selectRaw('MONTH(created_at) as month, SUM(sales) as total')
                          ->whereYear('created_at', now()->year)
                          ->groupBy('month')
                          ->pluck('total', 'month')
                          ->toArray();

    // Fill missing months with 0
    $salesByMonth = [];
    for ($m = 1; $m <= 12; $m++) {
        $salesByMonth[$m] = $monthlySalesData[$m] ?? 0;
    }

        return view('dashboard', compact('todaySales', 'monthlySales', 'totalSales','salesByMonth'));
    }
}
