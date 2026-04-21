<!-- Header & Navigation -->
<header class="bg-gray-800 shadow-sm sticky top-0 z-40 relative">

    <!-- 1. Header Chính -->
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between gap-3 md:gap-4">

            <!-- Nút 3 gạch (Mobile) -->
            <button id="mobileMenuBtn"
                class="md:hidden flex-shrink-0 text-gray-700 text-2xl hover:text-blue-600 transition">
                <i class="fas fa-bars text-white"></i>
            </button>

            <!-- Logo -->
            <a href="/"
                class="text-xl md:text-2xl font-bold text-blue-600 flex-shrink-0 flex items-center gap-2 whitespace-nowrap">
                <i class="fas fa-microchip text-white"></i>
                <span class="text-white">Vibe Tech</span>
            </a>

            <!-- Thanh Tìm Kiếm (Desktop) -->
            <div class="md:items-center hidden md:flex flex-1 max-w-2xl mx-8 relative group">

                <div class="flex-1 min-w-[150px]">
                    <x-searchbar action="{{ route('search') }}" placeholder="Nhập tên sản phẩm..."
                        value="{{ request('search') }}" />
                </div>

            </div>

            <!-- Tài khoản & Giỏ hàng -->
            <div class="flex items-center space-x-4 md:space-x-5 flex-shrink-0">
                <!-- Giỏ Hàng -->
                <a href="{{ route('cart.index') }}" class="flex flex-col items-center text-white hover:text-blue-500 transition relative">
                    <div class="relative mt-1">
                        <i class="fa-solid fa-cart-shopping hover:text-blue"></i>
                        @auth
                            <span
                                class="absolute -top-2.5 -right-2.5 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full border border-white">
                                {{ Auth::user()->cartItemCount() }}
                            </span>
                        @else
                            <span
                                class="absolute -top-2.5 -right-2.5 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full border border-white">
                                0
                            </span>
                        @endauth
                    </div>
                    <span class="text-xs font-medium hidden md:block">Giỏ hàng</span>
                </a>
                @if (Route::has('login'))
                    <div class="items-center relative hidden md:flex">
                        @auth
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
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

                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Tài khoản') }}
                                    </x-dropdown-link>

                                    <div class="border-t border-gray-200"></div>
                                    @if(Auth::user()->user_type == 1)
                                        <x-dropdown-link href="{{ route('dashboard') }}">
                                            {{ __('Quản trị') }}
                                        </x-dropdown-link>
                                    @endif
                                    <x-dropdown-link href="{{ route('order.orderHistory') }}">
                                        {{ __('Đơn hàng') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('wishlist.index') }}">
                                        {{ __('Danh sách yêu thích') }}
                                    </x-dropdown-link>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Đăng xuất') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <div class="hidden md:flex items-center gap-2">
                                <a href="{{ route('login') }}"
                                    class="px-4 py-1.5 text-white hover:text-blue-500 rounded-md text-sm font-medium transition border border-transparent">
                                    Đăng nhập
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-4 py-1.5 bg-white text-blue-600 border border-blue-200 hover:bg-blue-100 rounded-md text-sm font-medium transition">
                                        Đăng ký
                                    </a>
                                @endif
                            </div>
                        @endauth
                    </div>
                @endif


            </div>
        </div>

        <!-- Thanh Tìm Kiếm dưới điện thoại -->
        <div class="md:hidden mt-3 relative">
            <div class="flex-1 min-w-[150px]">
                <x-searchbar action="{{ route('search') }}" placeholder="Nhập tên sản phẩm..."
                    value="{{ request('search') }}" />
            </div>
        </div>
    </div>

    <!-- 2. Header Phụ: Danh Mục  -->

    @include('user.layouts.navigation-menu')


    @if(isset($breadcrumbs))
        <x-breadcrumb :items="$breadcrumbs" />
    @endif
</header>


<!--Sidebar cho Mobile -->
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