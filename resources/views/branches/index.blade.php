@extends('layouts.main')
@section('content')
<div class="p-8 min-h-screen">

    <!-- Header Section -->
    <div class="flex items-center justify-between mb-8">
        <!-- Left: Heading -->
        <div>
            <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Branches
            </h2>
            <p class="text-sm text-gray-500 mt-1">Manage your branch locations</p>
        </div>

        <!-- Right: Buttons -->
        <div class="flex items-center space-x-3">
            <button id="toggleViewBtn" 
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 text-gray-700 hover:text-blue-600 hover:border-blue-300 font-semibold rounded-xl transition-all duration-200 shadow-sm hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 transition-transform duration-200" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
                <span id="toggleText">Switch to Table</span>
            </button>

            <div x-data="{ open: false }">
                <!-- Add Branch Button -->
                <button 
                    @click="open = true"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-200 transform hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Branch
                </button>

                <!-- Add Modal Background -->
                <div 
                    x-show="open" 
                    x-transition
                    class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm z-50"
                    @click.self="open = false">

                    <!-- Modal Box -->
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-4">
                        
                        <!-- Modal Header -->
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-t-2xl flex justify-between items-center">
                            <h2 class="text-lg font-semibold">Add New Branch</h2>
                            <button @click="open = false" class="text-white/80 hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="p-6">
                            <form action="{{ route('branches.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Branch Name</label>
                                    <input type="text" name="name" required 
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Branch Code</label>
                                    <input type="text" name="code" required 
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
                                    <textarea name="address" rows="2"
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all"></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                                    <input type="text" name="phone"
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                    <select name="status"
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <!-- Modal Footer -->
                                <div class="flex justify-end space-x-3 pt-4">
                                    <button type="button" @click="open = false"
                                        class="px-5 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all transform hover:scale-105">
                                        Save Branch
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-3">
            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Branches Grid -->
    <div id="boxView" class="rounded-2xl border border-gray-100 p-6 max-h-[calc(100vh-24rem)] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($branches as $index => $branch)
            <div onclick="window.location='{{ route('branches.show', explode(' ', $branch->name)[0]) }}'" 
                 class="cursor-pointer" x-data="{ editOpen: false }">
                <div class="group bg-white shadow-lg hover:shadow-2xl rounded-2xl p-6 border border-gray-100 hover:border-blue-200 transition-all duration-300 h-full">
                    
                    <!-- Branch Header -->
                    <div class="flex items-start justify-between mb-5">
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                                {{ $branch->name }}
                            </h3>
                            <span class="inline-block mt-2 bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold text-gray-600">
                                {{ $branch->code }}
                            </span>
                        </div>
                        
                        <!-- Status Badge -->
                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full
                            {{ $branch->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            <span class="w-2 h-2 rounded-full mr-2
                                {{ $branch->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            {{ $branch->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>

                    <!-- Branch Details -->
                    <div class="space-y-3 mb-5">
                        <!-- Address -->
                        <div class="flex items-start gap-3 text-sm text-gray-600">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span class="flex-1 leading-relaxed">{{ $branch->address }}</span>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <div class="flex-shrink-0 w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <span>{{ $branch->phone ?? 'No phone number' }}</span>
                        </div>

                        <!-- Total Sales -->
                        <div class="flex items-center gap-3 pt-3 border-t border-gray-100">
                            <div class="flex-shrink-0 w-8 h-8 bg-emerald-50 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-medium text-gray-500">Total Sales</p>
                                <p class="text-lg font-bold text-emerald-600">
                                    ₱{{ number_format($totalSales ?? $branch->pcs->sum('sales'), 2) }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2 pt-4 border-t border-gray-100">
                        <button @click.stop="editOpen = true"
                           class="flex-1 flex items-center justify-center gap-2 bg-blue-50 hover:bg-blue-100 text-blue-600 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </button>
                        <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" 
                              onclick="event.stopPropagation()" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this branch?')"
                                class="w-full flex items-center justify-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div 
                    x-show="editOpen" 
                    x-transition
                    @click.stop
                    class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm z-50"
                    @click.self="editOpen = false">

                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-4">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-t-2xl flex justify-between items-center">
                            <h2 class="text-lg font-semibold">Edit Branch</h2>
                            <button @click="editOpen = false" class="text-white/80 hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <div class="p-6">
                            <form action="{{ route('branches.update', $branch->id) }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Branch Name</label>
                                    <input type="text" name="name" value="{{ $branch->name }}" required 
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Branch Code</label>
                                    <input type="text" name="code" value="{{ $branch->code }}" required 
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
                                    <textarea name="address" rows="2"
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">{{ $branch->address }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                                    <input type="text" name="phone" value="{{ $branch->phone }}"
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                    <select name="status"
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                        <option value="active" {{ $branch->is_active ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ !$branch->is_active ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <div class="flex justify-end space-x-3 pt-4">
                                    <button type="button" @click="editOpen = false"
                                        class="px-5 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all transform hover:scale-105">
                                        Update Branch
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 flex flex-col items-center justify-center py-16">
                <div class="bg-gray-100 rounded-full p-8 mb-6">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">No branches found</h3>
                <p class="text-gray-500 mb-6">Get started by creating your first branch location</p>
                <a href="{{ route('branches.create') }}" 
                   class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold shadow-md hover:shadow-lg transition-all transform hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create Your First Branch
                </a>
            </div>
        @endforelse
        </div>
    </div>
    

    <!-- Table View -->
    <div id="tableView" class="hidden rounded-2xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto max-h-[calc(100vh-24rem)] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
            <table class="w-full">
            <thead class="sticky top-0 z-10">
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
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse($branches as $i => $branch)
                    <tr class="hover:bg-gray-50 transition-colors" x-data="{ editOpen: false }">
                        <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $i+1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ $branch->name }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="inline-block bg-gray-100 px-3 py-1 rounded-full text-xs font-semibold text-gray-600">
                                {{ $branch->code }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate" title="{{ $branch->address }}">
                            {{ $branch->address }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $branch->phone ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                {{ $branch->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                <span class="w-2 h-2 rounded-full mr-2
                                    {{ $branch->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                {{ $branch->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-bold text-emerald-600">
                            ₱{{ number_format($branch->pcs->sum('sales'), 2) }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button @click="editOpen = true"
                                   class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-all transform hover:scale-110"
                                   title="Edit">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all transform hover:scale-110"
                                        title="Delete">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                                <a href="{{ route('branches.show', explode(' ', $branch->name)[0]) }}" 
                                   class="px-3 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg text-xs font-semibold transition-all transform hover:scale-110"
                                   title="View PC">
                                    View PC
                                </a>
                            </div>
                        </td>

                        
                        <!-- Edit Modal for Table Row -->
                        <td>
                            <div 
                                x-show="editOpen" 
                                x-transition
                                class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm z-50"
                                @click.self="editOpen = false">

                                <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-4">
                                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-4 rounded-t-2xl flex justify-between items-center">
                                        <h2 class="text-lg font-semibold">Edit Branch</h2>
                                        <button @click="editOpen = false" class="text-white/80 hover:text-white transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="p-6">
                                        <form action="{{ route('branches.update', $branch->id) }}" method="POST" class="space-y-4">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <label class="block text-sm font-semibold text-gray-700 mb-2">Branch Name</label>
                                                <input type="text" name="name" value="{{ $branch->name }}" required 
                                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                            </div>

                                            <div>
                                                <label class="block text-sm font-semibold text-gray-700 mb-2">Branch Code</label>
                                                <input type="text" name="code" value="{{ $branch->code }}" required 
                                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                            </div>

                                            <div>
                                                <label class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
                                                <textarea name="address" rows="2"
                                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">{{ $branch->address }}</textarea>
                                            </div>

                                            <div>
                                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                                                <input type="text" name="phone" value="{{ $branch->phone }}"
                                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                            </div>

                                            <div>
                                                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                                <select name="status"
                                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all">
                                                    <option value="active" {{ $branch->is_active ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ !$branch->is_active ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                            <div class="flex justify-end space-x-3 pt-4">
                                                <button type="button" @click="editOpen = false"
                                                    class="px-5 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all">
                                                    Cancel
                                                </button>
                                                <button type="submit"
                                                    class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all transform hover:scale-105">
                                                    Update Branch
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-16">
                            <div class="flex flex-col items-center text-gray-400">
                                <svg class="w-20 h-20 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                <p class="text-lg font-semibold text-gray-600">No branches found</p>
                                <p class="text-sm mt-1">Start by adding your first branch</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
    <div class="mt-6 mb-2 flex justify-end">
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-xl shadow-lg font-bold text-lg">
        Total Sales (All Branches): ₱{{ number_format($branches->sum(fn($branch) => $branch->pcs->sum('sales')), 2) }}
    </div>
</div>
    </div>
</div>

<style>
/* Custom Scrollbar Styles */
.scrollbar-thin::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
    transition: background 0.2s;
}

.scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Firefox scrollbar */
.scrollbar-thin {
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 #f1f5f9;
}
</style>

<script>
    document.getElementById("toggleViewBtn").addEventListener("click", function() {
        const boxView = document.getElementById("boxView");
        const tableView = document.getElementById("tableView");
        const toggleText = document.getElementById("toggleText");

        if (boxView.classList.contains("hidden")) {
            boxView.classList.remove("hidden");
            tableView.classList.add("hidden");
            toggleText.textContent = "Switch to Table";
        } else {
            boxView.classList.add("hidden");
            tableView.classList.remove("hidden");
            toggleText.textContent = "Switch to Grid";
        }
    });
</script>
@endsection