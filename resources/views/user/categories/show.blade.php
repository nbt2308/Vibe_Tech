@extends('user.layouts.app')

@section('title', $category->name)

@section('content')
    <h2 class="text-center text-2xl font-bold mb-6 pb-2">{{ $category->name }}</h2>
    <div class="container mx-auto my-6">
        <div class="flex relative md:static">
            <!-- Overlay cho điện thoại -->
            <div id="filter-overlay" class="fixed inset-0 bg-black/50 z-[60] hidden md:hidden" onclick="toggleFilter()"></div>

            <!-- thanh lọc dọc -->
            <div id="filter-sidebar" class="fixed md:static inset-y-0 left-0 z-[70] md:z-auto w-[280px] md:w-auto transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out h-full md:h-auto overflow-y-auto md:overflow-visible bg-gray-50 md:bg-transparent shadow-2xl md:shadow-none">
                @include('user.components.filter-bar')
            </div>
            
            <div class="flex-1 px-4 md:px-0 md:mx-4 w-full md:w-auto">
                <div class="flex items-center justify-between mb-4 bg-white p-4 rounded-lg">
                    <!-- thanh lọc ngang -->
                    <div class="flex items-center gap-3">
                        <button onclick="toggleFilter()" class="md:hidden text-slate-800 hover:text-slate-600 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h3 class="text-xl font-semibold text-slate-800">Sản phẩm</h3>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-slate-500">Sắp xếp theo:</span>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                    <span>
                                        @if(request('sort') === 'created_at|desc') Mới nhất @elseif(request('sort') === 'price|asc') Giá thấp đến cao @elseif(request('sort') === 'price|desc') Giá cao đến thấp @elseif(request('sort') === 'name|asc') Tên (A-Z) @elseif(request('sort') === 'name|desc') Tên (Z-A) @else Sắp xếp @endif
                                    </span>
                                    <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['sort' => 'created_at|desc']) }}">Mới nhất</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['sort' => 'price|asc']) }}">Giá thấp đến cao</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['sort' => 'price|desc']) }}">Giá cao đến thấp</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['sort' => 'name|asc']) }}">Tên (A-Z)</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['sort' => 'name|desc']) }}">Tên (Z-A)</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                @include('user.components.list-product', ['products' => $products])
                <div class="mt-4">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFilter() {
            const sidebar = document.getElementById('filter-sidebar');
            const overlay = document.getElementById('filter-overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
            
            // chặn cuộn trang khi mở thanh lọc trên mobile
            if (!overlay.classList.contains('hidden')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
    </script>
@endsection