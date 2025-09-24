@extends('layouts.main')

@section('content')
<div class="p-6 space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-bold">Dashboard</h2>
            <p class="text-gray-500">Welcome back, {{ Auth::user()->name ?? 'User' }}!</p>
        </div>

        <!-- Settings Dropdown -->
        <div class="mt-4 md:mt-0">
     
        </div>
    </div>

    <!-- Sales Report Section -->
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-900">Sales Report</h3>
            <div class="flex gap-2 mt-4 md:mt-0">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold shadow hover:bg-blue-700 transition text-sm">
                    Generate Report
                </button>
            </div>
        </div>
        

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="flex items-center bg-gradient-to-r from-blue-100 to-blue-50 p-4 rounded-xl shadow hover:shadow-lg transition">
                <div class="bg-blue-600 text-white rounded-full p-3 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <div class="text-lg font-bold">₱{{ number_format($todaySales, 2) }}</div>
            <div class="text-gray-500 text-xs">Today Sales</div>
                </div>
            </div>

            <div class="flex items-center bg-gradient-to-r from-green-100 to-green-50 p-4 rounded-xl shadow hover:shadow-lg transition">
                <div class="bg-green-600 text-white rounded-full p-3 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 10c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                    </svg>
                </div>
                <div>
                    <div class="text-lg font-bold">₱{{ number_format($monthlySales, 2) }}</div>
            <div class="text-gray-500 text-xs">Monthly Sales</div>
                </div>
            </div>

            <div class="flex items-center bg-gradient-to-r from-purple-100 to-purple-50 p-4 rounded-xl shadow hover:shadow-lg transition">
                <div class="bg-purple-600 text-white rounded-full p-3 mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 7 5-5 5 5"/>
                    </svg>
                </div>
                <div>
                    <div class="text-lg font-bold">₱{{ number_format($totalSales, 2) }}</div>
            <div class="text-gray-500 text-xs">Total Sales</div>
                </div>
            </div>
        </div>

     <!-- Chart -->
<div class="bg-white rounded-xl shadow p-6">
    <canvas id="salesChart" height="100"></canvas>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'Monthly Sales',
                data: @json(array_values($salesByMonth)),
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: 'rgba(59, 130, 246, 1)'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: true }},
            scales: { y: { beginAtZero: true }}
        }
    });
</script>

@endsection
