@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Sales Log for {{ $pc->name }}</h2>

    <a href="{{ route('pcs.create', $pc->id) }}" 
   class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
   + Add Sales (Test)
</a>

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border">Date</th>
                    <th class="px-4 py-2 border">Branch</th>
                    <th class="px-4 py-2 border">PC Name</th>
                    <th class="px-4 py-2 border">SSID</th>
                    <th class="px-4 py-2 border">Coins</th>
                    <th class="px-4 py-2 border">Credits</th>
                </tr>
            </thead>
            <tbody>
                @forelse($saleslogs as $log)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                    <td class="px-4 py-2 border">{{ $log->branch->name }}</td>
                    <td class="px-4 py-2 border">{{ $log->pc->name }}</td>
                    <td class="px-4 py-2 border">{{ $log->ssid ?? '-' }}</td>
                    <td class="px-4 py-2 border">₱{{ $log->coins }}</td>
                    <td class="px-4 py-2 border">{{ $log->credits }} mins</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 text-center text-gray-500 border">
                        No sales logs available
                    </td>
                </tr>
                @endforelse
            </tbody>
           

        </table>

          
 
{{-- ✅ Sticky total at bottom --}}
<div class="sticky bottom-0 w-full bg-white shadow-lg border-t px-6 py-4 text-right font-bold text-lg">
    Total Coins: ₱{{ number_format($totalCoins?? 0, 2) }}
</div>
@endsection
