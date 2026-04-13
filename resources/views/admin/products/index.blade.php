@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Danh sách sản phẩm')
@section('placeholder-searchbar', 'Tìm kiếm sản phẩm...')
@section('content')

    <main class="flex-1 flex flex-col mb-10 h-full">
        <div class="flex-1 overflow-auto p-6 flex-col">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

                <div
                    class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex justify-center flex-col min-h-[160px] hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="text-sm font-semibold text-slate-500 tracking-tight">Tổng sản phẩm</span>
                            <div class="text-3xl font-bold text-slate-800 tracking-tight">{{ $products->total() }}</div>
                        </div>
                        <div class="bg-blue-50 p-2.5 rounded-xl shadow-sm text-blue-600">
                            <i class="fa-solid fa-box-open"></i>
                        </div>
                    </div>

                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-center min-h-[160px] hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="text-sm font-semibold text-slate-500 tracking-tight">Đang kinh doanh</span>
                            <div class="text-3xl font-bold text-slate-800 tracking-tight">{{ $product_status_true }}</div>
                        </div>
                        <div class="bg-emerald-50 p-2.5 rounded-xl shadow-sm text-emerald-600">
                            <i class="fa-regular fa-circle-check"></i>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-center min-h-[160px] hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="text-sm font-semibold text-slate-500 tracking-tight">Sắp hết hàng</span>
                            <div class="text-3xl font-bold text-slate-800 tracking-tight">{{ $product_stock_less_10 }}</div>
                        </div>
                        <div class="bg-orange-50 p-2.5 rounded-xl shadow-sm text-orange-600">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-center min-h-[160px] hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="text-sm font-semibold text-slate-500 tracking-tight">Ngừng kinh doanh</span>
                            <div class="text-3xl font-bold text-slate-800 tracking-tight">{{ $product_status_false }}</div>
                        </div>
                        <div class="bg-indigo-50 p-2.5 rounded-xl shadow-sm text-indigo-600">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Danh sách sản phẩm</h2>
            </div>
            <!-- Thanh tìm kiếm -->
            <div class="flex justify-between">
                <div class="flex gap-5 items-center">
                    <div>
                        <p class="text-sm text-gray-700">Tìm kiếm</p>
                        <x-searchbar action="{{ route('products') }}" placeholder="Nhập tên sản phẩm..."
                            value="{{ request('search') }}" />
                    </div>

                    <div>
                        <p class="text-sm text-gray-700">Danh mục</p>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold 
                                            text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Danh mục
                                    <i class="ml-2 fas fa-chevron-down text-xs"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['category_id' => null]) }}">
                                    Tất cả danh mục
                                </x-dropdown-link>
                                @foreach($category as $cat)
                                    <x-dropdown-link href="{{ request()->fullUrlWithQuery(['category_id' => $cat->id]) }}">
                                        {{ $cat->name }}
                                    </x-dropdown-link>
                                @endforeach
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <div>
                        <p class="text-sm text-gray-700">Trạng thái</p>
                        <x-dropdown align="right" width="48">

                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold 
                                            text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    @if(request('status') === '1')
                                        Trạng thái: Đang bán
                                    @elseif(request('status') === '0')
                                        Trạng thái: Ngừng bán
                                    @else
                                        Tất cả trạng thái
                                    @endif

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('products') }}"
                                    class="{{ request()->has('status') ? '' : 'bg-gray-100 font-bold' }}">
                                    Tất cả
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => '1']) }}"
                                    class="{{ request('status') === '1' ? 'bg-gray-100 font-bold' : '' }}">
                                    Còn hàng
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => '0']) }}"
                                    class="{{ request('status') === '0' ? 'bg-gray-100 font-bold' : '' }}">
                                    Hết hàng
                                </x-dropdown-link>
                            </x-slot>

                        </x-dropdown>
                    </div>


                </div>
                @include('admin.products.create', ['categories' => $category, 'brands' => $brand])
                <button x-data @click="$dispatch('open-modal', 'create-product-modal');"
                    class="my-2 flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-blue-200 active:scale-95">
                    <i class="fas fa-plus mr-1"></i>
                    Thêm sản phẩm
                </button>

            </div>
            <!-- Bảng danh sách sản phẩm -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mt-6">
                <div class="bg-white rounded-xl  overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="bg-gray-800 border-b border-gray-200 text-sm text-white uppercase tracking-wider">
                                    <th class="py-3 px-4 font-medium w-16">ID</th>
                                    <th class="py-3 px-4 font-medium">Sản phẩm</th>
                                    <th class="py-3 px-4 font-medium">Slug</th>
                                    <th class="py-3 px-4 font-medium">Danh mục</th>
                                    <th class="py-3 px-4 font-medium">Thương hiệu</th>
                                    <th class="py-3 px-4 font-medium">Giá bán (VNĐ)</th>
                                    <th class="py-3 px-4 font-medium">Kho hàng</th>
                                    <th class="py-3 px-4 font-medium">Trạng thái</th>
                                    <th class="py-3 px-4 font-medium text-right">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                @if ($products->count() == 0)
                                    <tr>
                                        <td colspan="8" class="py-3 px-4 text-center text-gray-500">Không có sản phẩm nào</td>
                                    </tr>
                                @else
                                    @foreach ($products as $product)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="py-3 px-4 text-gray-500">{{$product->id  }}</td>
                                            <td class="py-3 px-4">
                                                <div class="flex items-center gap-3">
                                                    <!-- Thumbnail nhỏ trong bảng -->
                                                    <div
                                                        class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center overflow-hidden border border-gray-200 shrink-0">
                                                        <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="Ảnh sản phẩm"
                                                            class="w-full h-full object-cover">
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-900 text-md line-clamp-1">
                                                            {{$product->name  }}
                                                        </p>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span
                                                    class="px-2 py-1 bg-gray-100 rounded text-md whitespace-nowrap font-bold">{{$product->slug }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span
                                                    class="px-2 py-1 bg-gray-100 rounded text-md whitespace-nowrap">{{$product->category->name  }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span
                                                    class="px-2 py-1 bg-gray-100 rounded text-md whitespace-nowrap">{{$product->brand->name  }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4 text-md font-bold text-red-500 whitespace-nowrap">
                                                <span>{{ number_format($product->price, 0, ',', '.') }} đ</span>
                                            </td>
                                            <td class="py-3 px-4 text-md font-semibold text-gray-500 whitespace-nowrap">
                                                <span>{{ $product->stock_quantity}}</span>
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap">

                                                @if($product->status == 1)
                                                    <span
                                                        class="inline-flex items-center gap-1.5 px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">
                                                        Còn hàng
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center gap-1.5 px-2 py-1 rounded text-xs font-medium bg-red-100 text-red-700">
                                                        Hết hàng
                                                    </span>
                                                @endif
                                                </span>
                                            </td>
                                            <td class="py-3 px-4 text-right space-x-3 whitespace-nowrap">
                                                <button x-data
                                                    @click="$dispatch('open-modal', 'edit-product-modal-{{ $product->id }}');"
                                                    class="text-blue-600 hover:bg-blue-50 rounded-lg transition-colors p-2"
                                                    title="Sửa">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button x-data
                                                    @click="$dispatch('open-modal', 'delete-product-modal-{{ $product->id }}');"
                                                    class="text-red-600 hover:bg-red-50 rounded-lg transition-colors p-2"
                                                    title="Xóa">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>

                    </div>

                    <div class="my-6 mx-6">
                        {{ $products->links() }}
                    </div>

                    <!-- Modals Edit & Delete -->
                    @if($products->count() > 0)
                        @foreach ($products as $product)
                            @include('admin.products.edit', ['product' => $product, 'categories' => $category, 'brands' => $brand])
                            @include('admin.products.delete', ['product' => $product])
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </main>
@endsection