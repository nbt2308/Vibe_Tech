<div class="flex-1 overflow-y-auto py-2 border-t border-gray-700">
    <p class="px-4 py-2 text-xs font-bold text-gray-400 uppercase tracking-wider">Danh mục sản phẩm</p>
    <ul class="text-gray-700">
        <li><a href="/"
                class="block px-4 py-3 border-b border-gray-100 hover:bg-blue-50 hover:text-blue-600 font-medium"> Trang
                chủ</a></li>
        @foreach ($categories as $category)
            <li><a href="{{ route('categories.show', $category->slug) }}"
                    class="block px-4 py-3 border-b border-gray-100 hover:bg-blue-50 hover:text-blue-600 font-medium">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
        <li class="flex justify-center">
            <div class="px-4 py-3 border-b border-gray-100 font-medium">
                @if (Route::has('login'))
                    <div class="flex items-center relative">
                        @auth
                            <x-dropdown align="left" width="48">
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
                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Đơn hàng') }}
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
                            <div class="flex items-center gap-2">
                                <a href="{{ route('login') }}"
                                    class="px-4 py-1.5 text-blue-600 hover:text-blue-500 rounded-md text-sm font-medium transition border border-transparent">
                                    Đăng nhập
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-4 py-1.5 bg-white text-blue-600 border border-blue-200 hover:bg-blue-100 rounded-md text-sm font-medium transition">
                                        Đăng ký
                                    </a>
                                @endif
                            </div>


                            <!-- <a href="{{ route('login') }}"
                                        class="md:hidden flex flex-col items-center text-gray-700 hover:text-blue-600 transition">
                                        <i class="far fa-user text-xl"></i>
                                    </a> -->
                        @endauth
                    </div>
                @endif
            </div>
        </li>
    </ul>
</div>