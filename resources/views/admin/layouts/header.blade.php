<header class="h-20 flex-shrink-0 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10 w-full">
    <div class="flex items-center gap-4">
        <button onclick="toggleSidebar()" class="md:hidden text-gray-500 hover:text-gray-700 text-xl">
            <i class="fas fa-bars"></i>
        </button>
        @include('admin.components.breadcrumb')
    </div>
</header>