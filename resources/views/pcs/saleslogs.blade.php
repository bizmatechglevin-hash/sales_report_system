@extends('layouts.main')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-8 animate-fade-in">
        
   <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
    <!-- Computer Desktop Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke-width="1.5" 
         stroke="currentColor" 
         class="w-7 h-7 text-blue-600">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M9 17.25v1.5m6-1.5v1.5m-9 0h12a2.25 2.25 0 002.25-2.25V6.75A2.25 
              2.25 0 0018 4.5H6a2.25 2.25 0 00-2.25 2.25v9.75A2.25 
              2.25 0 006 18.75zm3-3h6" />
    </svg>

    Sales Records {{ $pc->name }}
</h2>

  <a href="{{ route('pcs.saleslogs.create', ['pc' => $pc->id]) }}" 
   class="inline-block mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
   + Add Sales 
</a>
</div>
 @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-x-auto ">
        <table class="w-full border-collapse ">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border">Date</th>
                    <th class="px-4 py-2 border">Branch</th>
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
