@extends('layouts.main')
@section('content')
<div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Header Section with Animation -->
   <div class="flex items-center justify-between mb-8 animate-fade-in">
    <!-- Left: Heading -->
    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
        Branches
    </h2>

    <!-- Right: Buttons -->
    <div class="flex items-center space-x-4">
       <button id="toggleViewBtn" 
        class="group relative inline-flex items-center gap-2 px-4 py-2.5 bg-transparent hover:bg-gray-50 text-gray-700 hover:text-blue-600 font-semibold rounded-lg transition-all duration-200">
    <!-- Underline effect -->
    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 group-hover:w-full transition-all duration-300"></span>
    
    <!-- Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="h-5 w-5 transform group-hover:rotate-12 transition-transform duration-200" 
         fill="none" 
         viewBox="0 0 24 24" 
         stroke="currentColor"
         stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
    </svg>
    
    <span id="toggleText" class="relative">Switch to Table</span>
</button>

        <a href="{{ route('branches.create') }}" 
           class="group relative bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 ease-in-out overflow-hidden">
           <span class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
           <span class="relative flex items-center space-x-2">
               <svg class="w-5 h-5 transform group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
               </svg>
               <span>Add Branch</span>
           </span>
        </a>
    </div>
</div>
    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <!-- Branches Grid -->
    <div id="boxView" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($branches as $index => $branch)
       <div onclick="window.location='{{ route('branches.show', explode(' ', $branch->name)[0]) }}'">

     
            <div class="group bg-white shadow-md hover:shadow-2xl rounded-2xl p-6 border border-gray-200 hover:border-blue-300 transform hover:scale-105 transition-all duration-300 ease-in-out animate-card-slide" 
                 style="animation-delay: {{ $index * 100 }}ms">
                
                <!-- Branch Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                            {{ $branch->name }}
                        </h3>
                        <div class="flex items-center mt-1 text-sm text-gray-500">
                            <span class="bg-gray-100 px-2 py-1 rounded-full text-xs font-medium">
                                {{ $branch->code }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Status Badge -->
                    <div class="flex items-center">
                        <span class="relative px-3 py-1 text-xs font-semibold rounded-full transition-all duration-300
                            {{ $branch->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                            <span class="absolute left-2 top-1/2 transform -translate-y-1/2 w-2 h-2 rounded-full
                                {{ $branch->is_active ? 'bg-green-400 animate-pulse' : 'bg-red-400' }}"></span>
                            <span class="ml-2">{{ $branch->is_active ? 'Active' : 'Inactive' }}</span>
                        </span>
                    </div>
                </div>

            <!-- Branch Details + Total Sales -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">

    <!-- Left: Branch Details -->
    <div class="space-y-4">
        <!-- Address -->
        <div class="flex items-center text-sm text-gray-600 group-hover:text-gray-700 transition-colors duration-300">
            <div class="flex items-center justify-center w-8 h-8 bg-blue-50 rounded-full mr-3 group-hover:bg-blue-100 transition-colors duration-300">
                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <span class="truncate">{{ $branch->address }}</span>
        </div>
        <!-- Phone -->
        <div class="flex items-center text-sm text-gray-600 group-hover:text-gray-700 transition-colors duration-300">
            <div class="flex items-center justify-center w-8 h-8 bg-green-50 rounded-full mr-3 group-hover:bg-green-100 transition-colors duration-300">
                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </div>
            <span>{{ $branch->phone ?? 'No phone number' }}</span>
        </div>
    </div>
    <!-- Right: Total Sales -->
    <div class="justify-center mt-2 ml-8">
    <h3 class="text-sm font-medium text-gray-500 flex items-center gap-2 ">
        <!-- Money Icon -->
        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M12 3c-1.657 0-3 1.343-3 3v1H8a2 2 0 00-2 2v1h12V9a2 2 0 00-2-2h-1V6c0-1.657-1.343-3-3-3zM5 12a7 7 0 0014 0H5z"/>
        </svg>
        Total Sales
    </h3>
    <p class="mt-2 text-2xl font-bold text-green-600">
        ₱{{ number_format($totalSales ?? $branch->pcs->sum('sales'), 2) }}
    </p>
</div>
</div>
                <!-- Action Buttons -->
                <div class="flex space-x-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('branches.edit', $branch->id) }}" 
                       class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-600 hover:text-blue-700 px-4 py-2 rounded-lg text-center text-sm font-medium transition-all duration-300 transform hover:scale-105 group/edit">
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-4 h-4 group-hover/edit:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            <span>Edit</span>
                        </span>
                    </a>              
                    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this branch?')" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-red-50 hover:bg-red-100 text-red-600 hover:text-red-700 px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 transform hover:scale-105 group/delete">
                            <span class="flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4 group-hover/delete:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                <span>Delete</span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
    </div>
        @empty
            <div class="col-span-3 flex flex-col items-center justify-center py-12 animate-fade-in">
                <div class="bg-gray-100 rounded-full p-6 mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">No branches found</h3>
                <p class="text-gray-500 text-center mb-6">Get started by creating your first branch location</p>
                <a href="{{ route('branches.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors duration-300 transform hover:scale-105">
                   Create Your First Branch
                </a>
            </div>
        @endforelse
    </div>
      <div id="tableView" class="hidden bg-white shadow rounded-lg overflow-x-auto">
         <table class="w-full border-collapse bg-white">
        <thead>
            <tr class="bg-gradient-to-r from-gray-700 to-gray-800 text-white">
                <th class="px-6 py-4 text-left text-sm font-semibold">#</th>
                <th class="px-6 py-4 text-left text-sm font-semibold">Branch Name</th>
                <th class="px-6 py-4 text-left text-sm font-semibold">Code</th>
                <th class="px-6 py-4 text-left text-sm font-semibold">Address</th>
                <th class="px-6 py-4 text-left text-sm font-semibold">Phone</th>
                <th class="px-6 py-4 text-left text-sm font-semibold">Status</th>
                <th class="px-6 py-4 text-left text-sm font-semibold">Total Sales</th>
                <th class="px-6 py-4 text-center text-sm font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($branches as $i => $branch)
                <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $i+1 }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $branch->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-mono">{{ $branch->code }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate" title="{{ $branch->address }}">
                        {{ $branch->address }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $branch->phone ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm">
                        @if($branch->is_active)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                Inactive
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                        ₱{{ number_format($branch->pcs->sum('sales'), 2) }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <!-- Edit -->
                            <a href="{{ route('branches.edit', $branch->id) }}" 
                               class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 transform hover:scale-105"
                               title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" 
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" 
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this branch?')" 
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 transform hover:scale-105"
                                    title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" 
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" 
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>

                            <!-- View PC -->
                           <a href="{{ route('branches.show', explode(' ', $branch->name)[0]) }}" 
   class="px-3 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg shadow-sm hover:shadow-md transition-all duration-200 transform hover:scale-105 text-xs font-medium"
   title="View PC">
   View PC
</a>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-12">
                        <div class="flex flex-col items-center justify-center text-gray-400">
                            <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="text-lg font-medium">No branches found</p>
                            <p class="text-sm mt-1">Start by adding your first branch</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>


<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes card-slide {
    from {
        opacity: 0;
        transform: translateY(20px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}

.animate-slide-up {
    animation: slide-up 0.6s ease-out 0.2s both;
}

.animate-card-slide {
    animation: card-slide 0.6s ease-out both;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom hover effects */
.group:hover .group-hover\:rotate-12 {
    transform: rotate(12deg);
}

.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}

/* Pulse animation for active status */
@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>

<script>
    document.getElementById("toggleViewBtn").addEventListener("click", function() {
        const boxView = document.getElementById("boxView");
        const tableView = document.getElementById("tableView");

        if (boxView.classList.contains("hidden")) {
            // Show box view
            boxView.classList.remove("hidden");
            tableView.classList.add("hidden");
            this.textContent = "Switch to Table";
        } else {
            // Show table view
            boxView.classList.add("hidden");
            tableView.classList.remove("hidden");
            this.textContent = "Switch to Boxes";
        }
    });
</script>
@endsection