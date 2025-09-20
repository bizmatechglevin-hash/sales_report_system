@extends('layouts.main')

@section('content')

    <div class="max-w-lg mx-auto">
        <!-- Form Container with Enhanced Design -->
      
            <!-- Header Section -->
            <div class=" p-6">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent flex items-center gap-3">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    Add New Branch
                </h2>
                <p class="text-blue-100 mt-2 text-sm">Create a new branch location for your organization</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form action="{{ route('branches.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Branch Name Field -->
                    <div class="group">
                        <label class="block text-gray-700 font-medium mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Branch Name
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="name" 
                                   class="w-full flex-1 border-2 border-gray-200 rounded-xl p-4 pl-12 text-gray-700 transition-all duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 focus:outline-none hover:border-gray-300 group-hover:shadow-md" 
                                   placeholder="Enter branch name..."
                                   required>
                            <div class="absolute left-4 top-4 text-gray-400 transition-colors duration-300 group-focus-within:text-blue-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Code Field -->
                    <div class="group">
                        <label class="block text-gray-700 font-medium mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                            Branch Code
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="code" 
                                   class="w-full border-2 border-gray-200 rounded-xl p-4 pl-12 text-gray-700 transition-all duration-300 focus:border-green-500 focus:ring-4 focus:ring-green-500/20 focus:outline-none hover:border-gray-300 group-hover:shadow-md" 
                                   placeholder="e.g., BR001"
                                   required>
                            <div class="absolute left-4 top-4 text-gray-400 transition-colors duration-300 group-focus-within:text-green-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Address Field -->
                    <div class="group">
                        <label class="block text-gray-700 font-medium mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Address
                        </label>
                        <div class="relative">
                            <textarea name="address" 
                                      rows="4"
                                      class="w-full border-2 border-gray-200 rounded-xl p-4 pl-12 text-gray-700 transition-all duration-300 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 focus:outline-none hover:border-gray-300 group-hover:shadow-md resize-none" 
                                      placeholder="Enter complete address..."
                                      required></textarea>
                            <div class="absolute left-4 top-4 text-gray-400 transition-colors duration-300 group-focus-within:text-purple-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div class="group">
                        <label class="block text-gray-700 font-medium mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Phone Number <span class="text-gray-400 text-sm font-normal">(Optional)</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="phone" 
                                   class="w-full border-2 border-gray-200 rounded-xl p-4 pl-12 text-gray-700 transition-all duration-300 focus:border-orange-500 focus:ring-4 focus:ring-orange-500/20 focus:outline-none hover:border-gray-300 group-hover:shadow-md" 
                                   placeholder="Enter phone number...">
                            <div class="absolute left-4 top-4 text-gray-400 transition-colors duration-300 group-focus-within:text-orange-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
                        <a href="{{ route('branches.index') }}" 
                           class="group relative px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center gap-2">
                            <svg class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Cancel
                        </a>
                        <button type="submit" 
                                class="group relative px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-xl font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center gap-2 overflow-hidden">
                            <div class="absolute inset-0 bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                            <svg class="w-4 h-4 z-10 transition-transform duration-300 group-hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="z-10">Save Branch</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-4 left-4 w-24 h-24 bg-blue-200/30 rounded-full blur-xl -z-10"></div>
        <div class="absolute bottom-4 right-4 w-32 h-32 bg-purple-200/30 rounded-full blur-xl -z-10"></div>
    </div>
</div>

<style>
/* Additional smooth animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.group {
    animation: fadeInUp 0.6s ease-out forwards;
}

.group:nth-child(1) { animation-delay: 0.1s; }
.group:nth-child(2) { animation-delay: 0.2s; }
.group:nth-child(3) { animation-delay: 0.3s; }
.group:nth-child(4) { animation-delay: 0.4s; }

/* Enhanced input focus effects */
input:focus, textarea:focus {
    transform: translateY(-2px);
}
 
/* Button hover effects */
button[type="submit"]:hover {
    box-shadow: 0 20px 25px -5px rgba(59, 130, 246, 0.4), 0 10px 10px -5px rgba(59, 130, 246, 0.1);
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}
</style>
@endsection