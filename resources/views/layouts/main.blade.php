<x-app-layout>
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-1">
                <!-- Sidebar -->
                <div class="w-64 bg-white shadow-lg sm:rounded-xl ">
                    <div class="p-6">
                      <div class="flex items-center mb-6">
                         <img src="{{ asset('images/bizmalogo.png') }}" alt="Logo" class="w-10 h-10 mr-3 rounded-full shadow">
                           <h3 class="text-2xl font-bold text-blue-700 tracking-wide">BIZMATECH</h3>
                      </div>
                        <nav class="space-y-2">
                            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition hover:bg-blue-100 hover:text-blue-800 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700' : 'text-gray-700' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 7 5-5 5 5"></path>
                                </svg>
                                Dashboard
                            </a>
                         <a href="{{ route('branches.index') }}"
                           class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition
                         {{ request()->routeIs('branches.index') 
                            ? 'bg-blue-50 text-blue-700' 
                           : 'text-gray-700 hover:bg-blue-100 hover:text-blue-800' }}">
               <!-- Icon -->
                   <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
             <!-- Label -->
                <span>Branches</span>
                    </a>

                           <a href="{{ route('pcs') }}"
                               class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition
                                 {{ request()->routeIs('pcs') 
                                     ? 'bg-blue-50 text-blue-700' 
                                       : 'text-gray-700 hover:bg-blue-100 hover:text-blue-800' }}">
    
                    <!-- Icon (Desktop/PC) -->
                           <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17h4.5m-9.75-3.25h15a1.5 1.5 0 001.5-1.5v-7a1.5 1.5 0 00-1.5-1.5h-15a1.5 1.5 0 00-1.5 1.5v7a1.5 1.5 0 001.5 1.5z" />
                                 </svg>
                     <!-- Label -->
                          <span>PCs</span>
                             </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition hover:bg-blue-100 hover:text-blue-800 text-gray-700">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </a>
                            <a href="#" class="flex items-center px-3 py-2 text-sm font-semibold rounded-lg transition hover:bg-blue-100 hover:text-blue-800 text-gray-700">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Reports
                            </a>
                        </nav>
                        <div class="mt-[500px] ">
                          <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-[60px] py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-blue-700 transition">
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
                <div class="flex-1 bg-white overflow-hidden shadow-lg sm:rounded-xl">
                       <!-- 🔹 Top Header inside Content -->
                    <header class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
                       <div class="flex items-center space-x-2 w-full max-w-xs">
            <div class="relative w-full">
              <input 
                  type="text" 
                  placeholder="Search..." 
                 class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          >
        <!-- Search Icon -->
        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" 
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
        </svg>
    </div>
</div>
                         <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-semibold rounded-lg text-blue-700 bg-blue-50 hover:bg-blue-100 hover:text-blue-900 focus:outline-none transition shadow">
                        <div class="mr-2">{{ Auth::user()->name }}</div>
                        <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <!-- Authentication -->
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