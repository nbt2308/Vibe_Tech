@extends('user.layouts.app')

@section('title', $category->name)

@section('content')
    <h2 class="text-center text-2xl font-bold mb-6 pb-2">{{ $category->name }}</h2>
    <div class="container mx-auto my-6">
        <div class="flex">
            <!-- thanh lọc dọc -->
            @include('user.components.filter-bar')
            <div class="flex-1 mx-4">
                <div class="flex items-center justify-between mb-4 bg-white p-4 rounded-lg">
                    <!-- thanh lọc ngang -->
                    <h3 class="text-xl font-semibold text-slate-800">Sản phẩm</h3>
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
@endsection