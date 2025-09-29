@extends('layouts.main')

@section('content')
<div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold flex items-center gap-2">
        <!-- Heroicon: Computer Desktop -->
        <svg xmlns="http://www.w3.org/2000/svg" 
             fill="none" 
             viewBox="0 0 24 24" 
             stroke-width="1.5" 
             stroke="currentColor" 
             class="w-7 h-7 text-blue-600">
            <path stroke-linecap="round" 
                  stroke-linejoin="round" 
                  d="M9.75 17.25h4.5m-6.75 3h9.75M3 4.5h18v9.75a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 14.25V4.5z" />
        </svg>
        {{ $branch->name }} — PCs
    </h2>
        <span class="text-lg font-semibold text-green-700">
            💰 Total Sales: ₱{{ number_format($totalSales ?? $branch->pcs->sum('sales'), 2) }}
        </span>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add PC form -->
    <form method="POST" action="{{ route('pcs.store', $branch->id) }}" class="mb-6 flex space-x-2">
        @csrf
        <input type="text" name="name" placeholder="Enter PC name (ex: PC 1)" required
               class="flex-1 border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">➕ Add PC</button>
    </form>

    
    <!-- PCs table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-sm border">
        <table class="w-full">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">PC Name</th>
                    <th class="px-4 py-3 border-b">Sales</th>
                    <th class="px-4 py-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($branch->pcs as $i => $pc)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $i + 1 }}</td>
                        <td class="px-4 py-3 border-b">💻 {{ $pc->name }}</td>

                        <!-- Sales + inline update form -->
                        <td class="px-4 py-3 border-b">
                            <div class="flex items-center space-x-3">
                                <div>₱{{ number_format($pc->sales, 2) }}</div>

                                <form method="POST" action="{{ route('pcs.updateSales', [$branch->id, $pc->id]) }}" class="flex items-center space-x-2">
                                    @csrf
                                    @method('PATCH')
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="sales"
                                        value="{{ old('sales', $pc->sales) }}"
                                        class="w-28 border border-gray-200 rounded px-2 py-1 text-sm"
                                        min="0"
                                    >
                                    <button type="submit" class="px-2 py-1 bg-green-600 text-white rounded text-sm">Update</button>
                                </form>
                            </div>
                        </td>

                        <td class="px-4 py-3 border-b">
                          
                            <form method="POST" action="{{ route('pcs.destroy', [$branch->id, $pc->id]) }}" onsubmit="return confirm('Delete this PC?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded "> Delete</button>
                            </form>
                              <!-- View Saleslogs Button -->
                        <div class="inline-block ml-8">
                        <a href="{{ route('pcs.saleslogs', $pc->id) }}" class="btn btn-info px-4 py-2 bg-green-600 text-white rounded">
                            View Sales
                        </a>
                        </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">No PCs yet. Add one above.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
