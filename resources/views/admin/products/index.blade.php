@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Danh sách sản phẩm')
@section('placeholder-searchbar', 'Tìm kiếm sản phẩm...')

@section('content')
    <div class="flex-1 flex flex-col">
        <div class="p-4 md:p-6">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-6 mb-8">
    
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-50 text-blue-600 mr-4">
                                <i class="fa-solid fa-box-open fa-lg"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Tổng sản phẩm</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $products->total() }}</dd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-emerald-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-emerald-50 text-emerald-600 mr-4">
                                <i class="fa-regular fa-circle-check fa-lg"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Đang kinh doanh</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $product_status_true }}</dd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-orange-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-orange-50 text-orange-600 mr-4">
                                <i class="fa-solid fa-circle-exclamation fa-lg"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Sắp hết hàng (< 10)</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $product_stock_less_10 }}</dd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-slate-400 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-slate-100 text-slate-600 mr-4">
                                <i class="fa-solid fa-circle-xmark fa-lg"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Ngừng kinh doanh</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $product_status_false }}</dd>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800">Danh sách sản phẩm</h2>
                <div class="w-full lg:w-auto">
                    @include('admin.products.create', ['categories' => $category, 'brands' => $brand])
                    <button x-data @click="$dispatch('open-modal', 'create-product-modal');" class="w-full flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-blue-200 active:scale-95">
                        <i class="fas fa-plus mr-1"></i>
                        Thêm sản phẩm mới
                    </button>
                </div>
            </div>

            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:items-end md:gap-4 mb-6">
                <div class="flex-1 min-w-[150px]">
                    <p class="text-sm text-gray-700 mb-1 font-medium">Tìm kiếm</p>
                    <x-searchbar action="{{ route('products') }}" placeholder="Nhập tên sản phẩm hoặc sku..." value="{{ request('search') }}" />
                </div>

                <div class="grid grid-cols-3 gap-3 md:flex md:gap-4">
                    <div class="w-full md:w-48">
                        <p class="text-sm text-gray-700 mb-1 font-medium">Danh mục</p>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                    <span class="truncate">{{ $category->firstWhere('id', request('category_id'))?->name ?? 'Danh mục' }}</span>
                                    <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['category_id' => null]) }}">Tất cả danh mục</x-dropdown-link>
                                @foreach($category as $cat)
                                    <x-dropdown-link href="{{ request()->fullUrlWithQuery(['category_id' => $cat->id]) }}">{{ $cat->name }}</x-dropdown-link>
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <div class="w-full md:w-48">
                        <p class="text-sm text-gray-700 mb-1 font-medium">Trạng thái</p>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                    <span>
                                        @if(request('status') === '1') Đang bán @elseif(request('status') === '0') Ngừng bán @else Trạng thái @endif
                                    </span>
                                    <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => null]) }}">Tất cả</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => '1']) }}">Đang bán</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => '0']) }}">Ngừng bán</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <div class="w-full md:w-32">
                        <p class="text-sm text-gray-700 mb-1 font-medium">Hiển thị</p>
                        <x-dropdown align="center" width="32">
                            <x-slot name="trigger">
                                <button class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                    <span class="truncate">{{ request('per_page') }} sản phẩm</span>
                                    <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 5]) }}">5 sản phẩm</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 10]) }}">10 sản phẩm</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 20]) }}">20 sản phẩm</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}">50 sản phẩm</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[1000px]">
                        <thead>
                            <tr class="bg-gray-800 text-sm text-white uppercase tracking-wider">
                                <th class="py-4 px-4 font-medium w-16 text-center">ID</th>
                                <th class="py-4 px-4 font-medium">Sản phẩm</th>
                                <th class="py-4 px-4 font-medium">Danh mục</th>
                                <th class="py-4 px-4 font-medium">Thương hiệu</th>
                                <th class="py-4 px-4 font-medium">Giá bán</th>
                                <th class="py-4 px-4 font-medium ">Kho</th>
                                <th class="py-4 px-4 font-medium ">Trạng thái</th>
                                <th class="py-4 px-4 font-medium text-right">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                            @forelse ($products as $product)
                                <tr class="hover:bg-gray-50/80 transition">
                                    <td class="py-4 px-4 text-gray-400 text-center">#{{ $product->id }}</td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ asset('storage/' . $product->thumbnail) }}" class="w-12 h-12 rounded-lg object-cover border border-gray-100 shrink-0 shadow-sm" onerror="this.src='{{ asset('images/no-image.png') }}'">
                                            <div class="max-w-[200px] md:max-w-xs overflow-hidden">
                                                <p class="font-bold text-gray-900 truncate" title="{{ $product->name }}">{{ $product->name }}</p>
                                                <p class="text-[11px] text-gray-400 truncate italic">{{ $product->sku }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="px-2.5 py-1 bg-slate-100 rounded-md text-xs text-slate-600 font-medium">
                                            {{ $product->category?->name ?? 'Không xác định' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="px-2.5 py-1 bg-slate-100 rounded-md text-xs text-slate-600 font-medium">
                                            {{ $product->brand?->name ?? 'Không xác định' }}
                                        </span>
                                    </td>

                                    <td class="py-4 px-4 font-bold text-red-500 whitespace-nowrap">
                                        @if($product->formatted_sale_price> 0)
                                            <div class="flex flex-col">
                                                <span class="text-sm font-bold text-red-600">
                                                    {{ $product->formatted_sale_price }}
                                                </span>
                                                <span class="text-xs text-gray-400 line-through">
                                                    {{ $product->formatted_price }}
                                                </span>
                                                <span class="text-[10px] font-medium text-green-600 bg-green-100 px-1 rounded w-fit mt-1">
                                                    Giảm {{ $product->formatted_sale_percent }}
                                                </span>
                                            </div>
                                        @else
                                            <span class="text-sm font-semibold text-gray-900">
                                                {{ $product->formatted_price }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 font-semibold text-gray-500">
                                        @if($product->stock_quantity < 10)
                                            <span class="text-sm font-bold text-red-600">
                                                {{ $product->stock_quantity }} (sắp hết)
                                            </span>
                                        @else
                                            <span class="text-sm font-semibold text-gray-900">
                                                {{ $product->stock_quantity }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4">
                                        @if($product->status === 1)
                                                <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700 uppercase">{{ $product->formatted_status }}</span>
                                            @else
                                                <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-red-100 text-red-700 uppercase">{{ $product->formatted_status }}</span>
                                            @endif
                                    </td>
                                    <td class="py-4 px-4 text-right space-x-1 whitespace-nowrap">
                                        <button x-data @click="$dispatch('open-modal', 'edit-product-modal-{{ $product->id }}');" class="text-blue-600 hover:bg-blue-50 rounded-lg p-2 transition-colors" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button x-data @click="$dispatch('open-modal', 'delete-product-modal-{{ $product->id }}');" class="text-red-600 hover:bg-red-50 rounded-lg p-2 transition-colors" title="Xóa sản phẩm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-20 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <i class="fa-solid fa-box-open text-5xl mb-4 opacity-20"></i>
                                            <p class="italic">Không tìm thấy sản phẩm nào phù hợp.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Phân trang --}}
                <div class="p-4">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>

            @foreach ($products as $product)
                @include('admin.products.edit', ['product' => $product, 'categories' => $category, 'brands' => $brand])
                @include('admin.products.delete', ['product' => $product])
            @endforeach

        </div>
    </div>
@endsection