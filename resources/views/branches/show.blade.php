@extends('layouts.main')

@section('content')
<div class="p-6 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
    <!-- Header Section -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-blue-600 rounded-lg shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke-width="1.5" 
                     stroke="currentColor" 
                     class="w-8 h-8 text-white">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          d="M9.75 17.25h4.5m-6.75 3h9.75M3 4.5h18v9.75a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 14.25V4.5z" />
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">{{ $branch->name }}</h2>
                <p class="text-sm text-gray-600">PC Management Dashboard</p>
            </div>
        </div>
 <a href="{{ route('branches.index') }}" 
   class="group relative inline-flex items-center gap-2 px-5 py-2.5 bg-white/80 backdrop-blur-sm hover:bg-white border-2 border-gray-200 hover:border-blue-400 text-gray-700 hover:text-blue-600 font-semibold rounded-xl shadow-md hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
   <!-- Background glow on hover -->
   <span class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-400 to-indigo-400 opacity-0 group-hover:opacity-10 blur-xl transition-opacity duration-300"></span>
   
   <!-- Arrow Icon -->
   <svg xmlns="http://www.w3.org/2000/svg" 
        class="relative h-5 w-5 transform group-hover:-translate-x-1 transition-transform duration-200" 
        fill="none" 
        viewBox="0 0 24 24" 
        stroke="currentColor"
        stroke-width="2.5">
      <path stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
   </svg>
   
   <span class="relative">Back</span>
</a>

 
    </div>

   @if(session('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
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
     <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b-2 border-gray-200">
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">PC Name</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Sales</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @forelse($branch->pcs as $i => $pc)
                    <tr class="hover:bg-gray-50">
                         <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-semibold text-sm">
                                    {{ $i + 1 }}
                                </span>
                            </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-800">{{ $pc->name }}</span>
                                </div>
                            </td>
                        

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
                                <button type="submit" 
                                                class="px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white rounded-lg text-sm font-medium shadow-sm hover:shadow-md transition-all duration-200 inline-flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            Delete
                                        </button>
                            </form>
                              <!-- View Saleslogs Button -->
                        <div class="inline-block ml-8">
                       <a href="{{ route('pcs.saleslogs', $pc->id) }}" 
                                       class="px-4 py-2 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white rounded-lg text-sm font-medium shadow-sm hover:shadow-md transition-all duration-200 inline-flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
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
