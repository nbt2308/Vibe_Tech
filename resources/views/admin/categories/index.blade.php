@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Danh mục')
@section('placeholder-searchbar', 'Tìm kiếm danh mục...')
@section('content')
    <div class="flex-1 flex flex-col">
        <div class="flex-1 overflow-auto p-6 flex-col">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mb-8">
                <div class="bg-white overflow-hidden shadow rounded-xl border-l-4 border-indigo-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center">
                        <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                            <i class="fas fa-layer-group fa-lg"></i>
                        </div>
                        <div >
                            <dt class="text-sm font-medium text-gray-500 truncate">Tổng danh mục</dt>
                            <dd class="text-2xl font-bold text-gray-900">{{ $categories->total() }}</dd>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-xl border-l-4 border-green-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <i class="fas fa-check-circle fa-lg"></i>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 truncate">Đang hoạt động</dt>
                            <dd class="text-2xl font-bold text-gray-900">{{ $categories_status_true }}</dd>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <i class="fas fa-box fa-lg"></i>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 truncate">Sản phẩm liên kết</dt>
                            <dd class="text-2xl font-bold text-gray-900">{{ $categories_linked_products }}</dd>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-xl border-l-4 border-gray-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center">
                        <div class="p-3 rounded-full bg-gray-100 text-gray-600 mr-4">
                            <i class="fa-solid fa-circle-xmark fa-lg"></i>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 truncate">Danh mục không hoạt động</dt>
                            <dd class="text-2xl font-bold text-gray-900">{{ $categories_status_false }}</dd>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Danh mục</h2>

            </div>
            <!-- Thanh tìm kiếm và nút thêm -->
            <div class="flex justify-between">
                <div class="flex gap-5">
                    <div>
                        <p class="text-sm text-gray-700 font-semibold">Tìm kiếm</p>
                        <x-searchbar action="{{ route('categories') }}" placeholder="Nhập tên danh mục..."
                            value="{{ request('search') }}" />
                    </div>
                    <div class="w-full md:w-48">
                            <p class="text-sm text-gray-700 mb-1 font-medium">Trạng thái</p>
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                        <span>
                                            @if(request('status') === '1') Đang hoạt động @elseif(request('status') === '0') Ngừng hoạt động @else Trạng thái @endif
                                        </span>
                                        <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => null]) }}">Tất cả</x-dropdown-link>
                                    <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => '1']) }}">Đang hoạt động</x-dropdown-link>
                                    <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => '0']) }}">Ngừng hoạt động</x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                    </div>
                     <div class="w-full md:w-32">
                        <p class="text-sm text-gray-700 mb-1 font-medium">Hiển thị</p>
                        <x-dropdown align="center" width="32">
                            <x-slot name="trigger">
                                <button class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                    <span class="truncate">{{ request('per_page') }} Danh mục</span>
                                    <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 5]) }}">5 danh mục</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 10]) }}">10 danh mục</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 20]) }}">20 danh mục</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}">50 danh mục</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                @include('admin.categories.create')
                <button x-data @click="$dispatch('open-modal', 'create-category-modal');"
                    class="my-2 flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-blue-200 active:scale-95">
                    <i class="fas fa-plus"></i>
                    Thêm danh mục
                </button>
            </div>


            <!-- Bảng danh sách danh mục -->
            <div class="bg-white rounded-lg shadow-md mt-6 ">
                <div class="bg-white rounded-xl overflow-hidden">
                    <div class="overflow-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="bg-gray-800 border-b border-gray-200 text-sm text-white uppercase tracking-wider">
                                    <th class="py-3 px-4 font-medium w-16">ID</th>
                                    <th class="py-3 px-4 font-medium">Tên danh mục</th>
                                    <th class="py-3 px-4 font-medium">Mô tả</th>
                                    <th class="py-3 px-4 font-medium">Slug</th>
                                    <th class="py-3 px-4 font-medium">Số lượng sản phẩm</th>
                                    <th class="py-3 px-4 font-medium">Trạng thái</th>
                                    <th class="py-3 px-4 font-medium text-right">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                @forelse($categories as $category)
                                    <!-- Sản phẩm 1 -->
                                    <tr class="hover:bg-gray-50 transition ">
                                        <td class="py-3 px-4 text-gray-500">#{{ $category->id }}</td>
                                        <td class="py-3 px-4">
                                            <div class="flex items-center gap-3">
                                                <!-- Thumbnail nhỏ trong bảng -->
                                                <div
                                                    class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center overflow-hidden border border-gray-200 shrink-0">
                                                    <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="Ảnh sản phẩm"
                                                        class="w-full h-full object-cover">
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-gray-900 line-clamp-1" title="{{ $category->name }}">{{ $category->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 max-w-[200px] md:max-w-xs overflow-hidden">
                                            <span class="line-clamp-1" title="{{ $category->description }}">{{ $category->description }}</span>
                                        </td>
                                        <td class="py-3 px-4"><span
                                                class="px-2 py-1 bg-gray-100 rounded text-xs whitespace-nowrap">{{ $category->slug }}</span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 font-bold text-md whitespace-nowrap">{{ $category->products_count }}</span>
                                        </td>
                                        <td class="py-3 px-4">
                                            @if($category->status === 1)
                                                <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700 uppercase">{{ $category->formatted_status }}</span>
                                            @else
                                                <span class="px-2 py-1 rounded-full text-[10px] font-bold bg-red-100 text-red-700 uppercase">{{ $category->formatted_status }}</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 text-right space-x-3 whitespace-nowrap">
                                            <button x-data type="button"
                                                @click="$dispatch('open-modal', 'edit-category-modal-{{ $category->id }}');"
                                                class="text-blue-600 hover:bg-blue-50 rounded-lg transition-colors p-2"
                                                title="Sửa">
                                                <i class="fas fa-edit"></i></button>
                                            <button x-data
                                                @click="$dispatch('open-modal', 'delete-category-modal-{{ $category->id }}');"
                                                class="text-red-600 hover:bg-red-50 rounded-lg transition-colors p-2"
                                                title="Xóa">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-20 text-center">
                                            <div class="flex flex-col items-center justify-center text-gray-400">
                                                <i class="fa-solid fa-box-open text-5xl mb-4 opacity-20"></i>
                                                <p class="italic">Không tìm thấy danh mục nào phù hợp.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                    <div class="p-4">
                        {{ $categories->onEachSide(1)->links() }}
                    </div>

                    @if($categories->count() > 0)
                        @foreach ($categories as $category)
                            @include('admin.categories.edit', ['category' => $category])
                            @include('admin.categories.delete', ['category' => $category])
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection