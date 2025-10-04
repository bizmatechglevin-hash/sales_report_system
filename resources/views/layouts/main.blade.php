<x-app-layout>
    <div class="flex min-h-screen bg-white">
        
        <!-- Sidebar -->
        <aside class="w-72 bg-white shadow-xl border-r border-gray-100 flex flex-col relative overflow-hidden">
            <!-- Subtle decorative element -->
            <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full blur-3xl opacity-40 -translate-y-24 translate-x-24"></div>
            
            <div class="p-8 relative z-10">
                <!-- Logo -->
                <div class="flex items-center mb-10 pb-6 border-b border-gray-100 group cursor-pointer">
                    <div class="relative transform transition-all duration-500 group-hover:scale-110">
                        <img src="{{ asset('images/bizmalogo.png') }}" 
                             alt="Logo" 
                             class="w-12 h-12 mr-4 rounded-xl shadow-md ring-1 ring-gray-100 group-hover:ring-2 group-hover:ring-blue-200 transition-all duration-300">
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full shadow-sm"></div>
                    </div>
                    <h3 class="text-2xl font-black bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent tracking-tight">
                        BIZMATECH
                    </h3>
                </div>

                <!-- Navigation -->
                <nav class="space-y-1.5">
                    <a href="{{ route('dashboard') }}" 
                       class="group flex items-center px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                        <div class="p-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-white/20' : 'bg-gray-100 group-hover:bg-blue-50' }} mr-3 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 7 5-5 5 5"></path>
                            </svg>
                        </div>
                        <span class="flex-1">Dashboard</span>
                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 {{ request()->routeIs('dashboard') ? 'opacity-100' : '' }} transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <a href="{{ route('branches.index') }}"
                       class="group flex items-center px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->routeIs('branches.index') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                        <div class="p-2 rounded-lg {{ request()->routeIs('branches.index') ? 'bg-white/20' : 'bg-gray-100 group-hover:bg-blue-50' }} mr-3 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span class="flex-1">Branches</span>
                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 {{ request()->routeIs('branches.index') ? 'opacity-100' : '' }} transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <a href="{{ route('pcs') }}"
                       class="group flex items-center px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->routeIs('pcs') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/30' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-700' }}">
                        <div class="p-2 rounded-lg {{ request()->routeIs('pcs') ? 'bg-white/20' : 'bg-gray-100 group-hover:bg-blue-50' }} mr-3 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17h4.5m-9.75-3.25h15a1.5 1.5 0 001.5-1.5v-7a1.5 1.5 0 00-1.5-1.5h-15a1.5 1.5 0 00-1.5 1.5v7a1.5 1.5 0 001.5 1.5z" />
                            </svg>
                        </div>
                        <span class="flex-1">PCs</span>
                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 {{ request()->routeIs('pcs') ? 'opacity-100' : '' }} transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <a href="#" class="group flex items-center px-4 py-3.5 text-sm font-semibold rounded-xl text-gray-700 hover:bg-gray-50 hover:text-blue-700 transition-all duration-300">
                        <div class="p-2 rounded-lg bg-gray-100 group-hover:bg-blue-50 mr-3 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="flex-1">Settings</span>
                        <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </nav>
            </div>

            <!-- Bottom accent -->
            <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500"></div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col bg-gray-50">
            <!-- Header -->
            <header class="flex items-center justify-between px-8 py-5 bg-white border-b border-gray-100 shadow-sm">
                <!-- Search -->
                <div class="flex items-center space-x-2 w-full max-w-md">
                    <div class="relative w-full group">
                        <input 
                            type="text" 
                            placeholder="Search anything..." 
                            class="w-full pl-12 pr-4 py-3.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition-all duration-300 bg-gray-50 group-hover:bg-white"
                        >
                        <svg class="w-5 h-5 absolute left-4 top-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" 
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                        </svg>
                    </div>
                </div>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-5 py-3 border border-gray-200 text-sm leading-5 font-semibold rounded-xl text-gray-700 bg-white hover:bg-gray-50 hover:border-blue-300 transition-all duration-300 shadow-sm hover:shadow-md">
                            <div class="mr-3 flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-xs mr-2 shadow-md">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                {{ Auth::user()->name }}
                            </div>
                            <svg class="fill-current h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown> 
            </header>

            <!-- Page Content -->
            <main class="p-8 flex-1 overflow-y-auto bg-white">
                @yield('content')
            </main>
        </div>
    </div>
</x-app-layout>