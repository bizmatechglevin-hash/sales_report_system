<x-app-layout>
    <div class="py-8 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        
            <div class="flex gap-6">
                <!-- Sidebar -->
                <div class="w-72 bg-white/80 backdrop-blur-xl shadow-2xl rounded-2xl border border-white/20">
                    <div class="p-8">
                      <div class="flex items-center mb-10 pb-6 border-b border-gray-100">
                         <div class="relative">
                           <img src="{{ asset('images/bizmalogo.png') }}" alt="Logo" class="w-12 h-12 mr-4 rounded-xl shadow-lg ring-2 ring-blue-100">
                           <div class="absolute -top-1 -right-1 w-4 h-4 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full animate-pulse"></div>
                         </div>
                         <h3 class="text-2xl font-black bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent tracking-tight">BIZMATECH</h3>
                      </div>
                      
                        <nav class="space-y-3">
                            <a href="{{ route('dashboard') }}" class="group flex items-center px-4 py-3.5 text-sm font-bold rounded-xl transition-all duration-300 transform hover:scale-105 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/50' : 'text-gray-600 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:text-blue-700' }}">
                                <div class="p-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-white/20' : 'bg-gray-100 group-hover:bg-blue-100' }} mr-3 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 7 5-5 5 5"></path>
                                    </svg>
                                </div>
                                <span class="tracking-wide">Dashboard</span>
                            </a>
                            
                            <a href="{{ route('branches.index') }}"
                               class="group flex items-center px-4 py-3.5 text-sm font-bold rounded-xl transition-all duration-300 transform hover:scale-105 {{ request()->routeIs('branches.index') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/50' : 'text-gray-600 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:text-blue-700' }}">
                                <div class="p-2 rounded-lg {{ request()->routeIs('branches.index') ? 'bg-white/20' : 'bg-gray-100 group-hover:bg-blue-100' }} mr-3 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span class="tracking-wide">Branches</span>
                            </a>
                            
                            <a href="{{ route('pcs') }}"
                               class="group flex items-center px-4 py-3.5 text-sm font-bold rounded-xl transition-all duration-300 transform hover:scale-105 {{ request()->routeIs('pcs') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white shadow-lg shadow-blue-500/50' : 'text-gray-600 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:text-blue-700' }}">
                                <div class="p-2 rounded-lg {{ request()->routeIs('pcs') ? 'bg-white/20' : 'bg-gray-100 group-hover:bg-blue-100' }} mr-3 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17h4.5m-9.75-3.25h15a1.5 1.5 0 001.5-1.5v-7a1.5 1.5 0 00-1.5-1.5h-15a1.5 1.5 0 00-1.5 1.5v7a1.5 1.5 0 001.5 1.5z" />
                                    </svg>
                                </div>
                                <span class="tracking-wide">PCs</span>
                            </a>
                            
                            <a href="#" class="group flex items-center px-4 py-3.5 text-sm font-bold rounded-xl transition-all duration-300 transform hover:scale-105 text-gray-600 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:text-blue-700">
                                <div class="p-2 rounded-lg bg-gray-100 group-hover:bg-blue-100 mr-3 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <span class="tracking-wide">Settings</span>
                            </a>
                            
                            <a href="#" class="group flex items-center px-4 py-3.5 text-sm font-bold rounded-xl transition-all duration-300 transform hover:scale-105 text-gray-600 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:text-blue-700">
                                <div class="p-2 rounded-lg bg-gray-100 group-hover:bg-blue-100 mr-3 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <span class="tracking-wide">Reports</span>
                            </a>
                        </nav>
                        
                        <div class="mt-auto pt-[380px]">
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3.5 bg-gradient-to-r from-red-500 to-rose-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/40 hover:from-red-600 hover:to-rose-700 transition-all duration-300 transform hover:scale-105">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                                </svg>
                                Logout
                            </button>
                          </form>
                        </div>                       
                    </div>                
                </div>
                
                <!-- Main content -->
                <div class="flex-1 bg-white/80 backdrop-blur-xl overflow-hidden shadow-2xl rounded-2xl border border-white/20">
                    <!-- Top Header inside Content -->
                    <header class="flex items-center justify-between px-8 py-5 border-b border-gray-100 bg-gradient-to-r from-white to-blue-50/30">
                       <div class="flex items-center space-x-2 w-full max-w-md">
                            <div class="relative w-full group">
                              <input 
                                  type="text" 
                                  placeholder="Search anything..." 
                                  class="w-full pl-12 pr-4 py-3.5 text-sm border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-white shadow-sm group-hover:shadow-md"
                              >
                                <svg class="w-5 h-5 absolute left-4 top-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" 
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                   d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                </svg>
                            </div>
                        </div>
                        
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-5 py-3 border-2 border-blue-200 text-sm leading-5 font-bold rounded-xl text-blue-700 bg-gradient-to-r from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 hover:border-blue-300 focus:outline-none transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                                    <div class="mr-3 flex items-center">
                                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-xs mr-2">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </div>
                                        {{ Auth::user()->name }}
                                    </div>
                                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>