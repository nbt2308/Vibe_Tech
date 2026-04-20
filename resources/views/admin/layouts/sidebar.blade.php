<nav
    class="bg-white shadow-md border-r border-gray-200 h-screen w-[250px] flex-shrink-0 py-6 px-4 overflow-auto z-20">
    <div class="relative flex flex-col h-full">

        <div class="flex flex-wrap items-center justify-center cursor-pointer relative">
            <!-- Logo -->
            <a href="/"
                class="text-xl md:text-2xl font-bold text-blue-600 flex-shrink-0 flex items-center gap-2 whitespace-nowrap">
                <i class="fas fa-microchip"></i>
                <span>Vibe Tech</span>
            </a>
        </div>

        <hr class="my-6 border-gray-200" />

        <div class="mb-4">
            <ul class="space-y-4 px-2">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="text-sm flex items-center font-medium hover:text-blue-600 transition-all
                        {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-slate-800' }}">
                        <i class="fa-solid fa-house mr-3"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
            </ul>


        </div>
        <div>
            <h4 class="text-sm text-slate-500 mb-4">Người dùng</h4>
            <ul class="space-y-4 px-2 flex-1">
                <li>
                    <a href="{{ route('users') }}"
                        class="text-sm flex items-center font-medium hover:text-blue-600 transition-all
                        {{ request()->routeIs('users') ? 'text-blue-600' : 'text-slate-800' }}">
                        <i class="fa-solid fa-user-shield mr-3"></i>
                        <span>Danh sách quản trị viên</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('customers') }}"
                        class="text-sm flex items-center font-medium hover:text-blue-600 transition-all
                        {{ request()->routeIs('customers') ? 'text-blue-600' : 'text-slate-800' }}">
                        <i class="fa-solid fa-users mr-3"></i>
                        <span>Danh sách khách hàng</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('comments') }}"
                        class="text-sm flex items-center font-medium hover:text-blue-600 transition-all
                        {{ request()->routeIs('comments') ? 'text-blue-600' : 'text-slate-800' }}">
                        <i class="fa-solid fa-comment-dots mr-3"></i>
                        <span>Bình luận</span>
                    </a>
                </li>
            </ul>
        </div>

        <hr class="my-6 border-gray-200" />

        <div class="">
            <h4 class="text-sm text-slate-500 mb-4">Sản phẩm</h4>
            <ul class="space-y-4 px-2 flex-1">
                <li>
                    <a href="{{ route('products') }}"
                        class="text-sm flex items-center font-medium hover:text-blue-600 transition-all
                        {{ request()->routeIs('products') ? 'text-blue-600' : 'text-slate-800' }}">
                        <i class="fa-solid fa-box mr-3"></i>
                        <span>Danh sách sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories') }}"
                        class="text-sm flex items-center font-medium hover:text-blue-600 transition-all
                        {{ request()->routeIs('categories') ? 'text-blue-600' : 'text-slate-800' }}">
                        <i class="fa-solid fa-tags mr-3"></i>
                        <span>Danh mục</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('brands') }}"
                        class="text-sm flex items-center font-medium hover:text-blue-600 transition-all
                        {{ request()->routeIs('brands') ? 'text-blue-600' : 'text-slate-800' }}">
                        <i class="fa-solid fa-copyright mr-3"></i>
                        <span>Thương hiệu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('templates') }}"
                        class="text-sm flex items-center font-medium hover:text-blue-600 transition-all
                        {{ request()->routeIs('templates') ? 'text-blue-600' : 'text-slate-800' }}">
                        <i class="fa-brands fa-buffer mr-3"></i>
                        <span>Thuộc tính</span>
                    </a>
                </li>
            </ul>
        </div>

        <hr class="my-6 border-gray-200" />

        <div class="flex-1">
            <h4 class="text-sm text-slate-500 mb-4">Bán hàng</h4>
            <ul class="space-y-4 px-2 flex-1">
                <li>
                    <a href="{{ route('orders') }}"
                        class="text-slate-800 text-sm flex items-center font-medium hover:text-blue-600 transition-all">
                        <i class="fa-solid fa-cart-shopping mr-3"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mt-4">
            <ul class="space-y-4 px-2">
                <li>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <button type="submit"
                            class="text-slate-800 text-sm flex items-center font-medium hover:text-blue-600 transition-all">
                            <i class="fa-solid fa-right-from-bracket mr-3"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>


        </div>
    </div>
</nav>