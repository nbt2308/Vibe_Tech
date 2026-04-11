<!-- Header & Navigation -->
<header class="bg-white shadow-sm sticky top-0 z-40 relative">

    <!-- 1. Header Chính -->
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between gap-3 md:gap-4">

            <!-- Nút 3 gạch (Mobile) -->
            <button id="mobileMenuBtn"
                class="md:hidden flex-shrink-0 text-gray-700 text-2xl hover:text-blue-600 transition">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Logo -->
            <a href="/"
                class="text-xl md:text-2xl font-bold text-blue-600 flex-shrink-0 flex items-center gap-2 whitespace-nowrap">
                <i class="fas fa-microchip"></i>
                <span>Vibe Tech</span>
            </a>

            <!-- Thanh Tìm Kiếm (Desktop) -->
            <div class="hidden md:flex flex-1 max-w-2xl mx-8 relative group">
                <input type="text" placeholder="Tìm kiếm sản phẩm, thương hiệu..."
                    class="w-full border-2 border-blue-500 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-200 transition">
                <button
                    class="absolute right-0 top-0 h-full bg-blue-600 text-white px-6 rounded-r-lg hover:bg-blue-700 transition">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <!-- Tài khoản & Giỏ hàng -->
            <div class="flex items-center space-x-4 md:space-x-5 flex-shrink-0">
                <!-- Giỏ Hàng -->
                <a href="#" class="flex flex-col items-center text-gray-700 hover:text-blue-600 transition relative">
                    <div class="relative mt-1">
                        <i class="fas fa-shopping-cart text-xl sm:mb-1"></i>
                        <span
                            class="absolute -top-2.5 -right-2.5 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full border border-white">
                            3
                        </span>
                    </div>
                    <span class="text-xs font-medium hidden md:block">Giỏ hàng</span>
                </a>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->user_type === 1)
                            <a href="{{ route('admin.dashboard.index') }}"
                                class="flex flex-col items-center text-gray-700 hover:text-blue-600 transition relative">
                                <div class="relative mt-1">
                                    <i class="fas fa-user text-xl sm:mb-1"></i>
                                </div>
                                <span class="text-xs font-medium hidden md:block">Admin</span>
                            </a>
                        @endif

                    @endauth
                    <div class="flex items-center">
                        @auth
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="size-8 rounded-full object-cover"
                                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ Auth::user()->name }}

                                                <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-200"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <div class="hidden md:flex items-center gap-2">
                                <a href="{{ route('login') }}"
                                    class="px-4 py-1.5 text-gray-700 hover:bg-gray-100 rounded-md text-sm font-medium transition border border-transparent">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-4 py-1.5 bg-blue-50 text-blue-600 border border-blue-200 hover:bg-blue-100 rounded-md text-sm font-medium transition">
                                        Register
                                    </a>
                                @endif
                            </div>


                            <a href="{{ route('login') }}"
                                class="md:hidden flex flex-col items-center text-gray-700 hover:text-blue-600 transition">
                                <i class="far fa-user text-xl"></i>
                            </a>
                        @endauth
                    </div>
                @endif


            </div>
        </div>

        <!-- Thanh Tìm Kiếm dưới điện thoại -->
        <div class="md:hidden mt-3 relative">
            <input type="text" placeholder="Tìm kiếm sản phẩm..."
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
            <button class="absolute right-0 top-0 h-full bg-blue-600 text-white px-4 rounded-r-lg">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    <!-- 2. Header Phụ: Danh Mục  -->
    @include('user.layouts.navigation-menu')
</header>

<!-- 3. Menu Trượt (Sidebar) cho Mobile -->
<div id="mobileMenu" class="fixed inset-0 z-50 invisible">
    <div id="menuOverlay" class="absolute inset-0 bg-black/60 opacity-0 transition-opacity duration-300"></div>
    <div id="menuContent"
        class="absolute top-0 left-0 h-full w-4/5 max-w-sm bg-white shadow-2xl transform -translate-x-full transition-transform duration-300 flex flex-col">
        <!-- Phần đầu của Sidebar -->
        <div class="bg-blue-600 p-4 flex justify-between items-center text-white">
            <a href="/"
                class="text-xl md:text-2xl font-bold text-white-600 flex-shrink-0 flex items-center gap-2 whitespace-nowrap">
                <i class="fas fa-microchip"></i>
                <span>Vibe Tech</span>
            </a>
            <button id="closeMenuBtn"
                class="text-white hover:text-gray-200 text-2xl w-8 h-8 flex items-center justify-center">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Danh sách menu -->
        @include('user.layouts.navigation-menu-mobile')

    </div>
</div>