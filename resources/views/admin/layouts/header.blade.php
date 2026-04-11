<header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10">
    <div class="flex items-center gap-4">
        <button class="md:hidden text-gray-500 hover:text-gray-700 text-xl">
            <i class="fas fa-bars"></i>
        </button>
        <h1 class="text-xl font-semibold text-gray-800">@yield('header-title')</h1>
    </div>

    <div class="flex items-center gap-4">
        <div
            class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 p-1.5 rounded-lg transition border border-transparent">
            <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" alt="Admin"
                class="w-8 h-8 rounded-full">
            <span class="text-sm font-medium text-gray-700 hidden sm:block">Admin</span>
            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
        </div>
    </div>
</header>