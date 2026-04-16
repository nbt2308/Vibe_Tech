@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Thuộc tính')
@section('placeholder-searchbar', 'Nhập tên thuộc tính...')
@section('content')
    <div class="flex-1 flex flex-col">
        <div class="flex-1 overflow-auto p-6 flex-col">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Thuộc tính</h2>

            </div>
            <!-- Thanh tìm kiếm và nút thêm -->
            <div class="flex justify-between">
                <div class="flex gap-5">
                    <div>
                        <p class="text-sm text-gray-700 font-semibold">Tìm kiếm</p>
                        <x-searchbar action="{{ route('templates') }}" placeholder="Nhập tên thuộc tính..."
                            value="{{ request('search') }}" />
                    </div>
                    <div class="w-full md:w-32">
                        <p class="text-sm text-gray-700 mb-1 font-medium">Hiển thị</p>
                        <x-dropdown align="center" width="32">
                            <x-slot name="trigger">
                                <button
                                    class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                    <span class="truncate">{{ request('per_page') }} Thuộc tính</span>
                                    <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 5]) }}">5 thuộc
                                    tính</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 10]) }}">10 thuộc
                                    tính</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 20]) }}">20 thuộc
                                    tính</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}">50 thuộc
                                    tính</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                @include('admin.templates.create')
                <button x-data @click="$dispatch('open-modal', 'create-template-modal');"
                    class="my-2 flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all shadow-lg shadow-blue-200 active:scale-95">
                    <i class="fas fa-plus"></i>
                    Thêm thuộc tính
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
                                    <th class="py-3 px-4 font-medium">Tên hiển thị</th>
                                    <th class="py-3 px-4 font-medium">Tên thuộc tính (Key)</th>
                                    <th class="py-3 px-4 font-medium text-right">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                @forelse($attributeTemplates as $attributeTemplate)
                                    <!-- Sản phẩm 1 -->
                                    <tr class="hover:bg-gray-50 transition ">
                                        <td class="py-3 px-4 text-gray-500">#{{ $attributeTemplate->id }}</td>

                                        <td class="py-3 px-4 max-w-[200px] md:max-w-xs overflow-hidden">
                                            <span class="line-clamp-1"
                                                title="{{ $attributeTemplate->display_name }}">{{ $attributeTemplate->display_name }}</span>
                                        </td>
                                        <td class="py-3 px-4">
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    <p class="font-semibold text-gray-900 line-clamp-1"
                                                        title="{{ $attributeTemplate->name }}">{{ $attributeTemplate->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 text-right space-x-3 whitespace-nowrap">
                                            <button x-data type="button"
                                                @click="$dispatch('open-modal', 'edit-template-modal-{{ $attributeTemplate->id }}');"
                                                class="text-blue-600 hover:bg-blue-50 rounded-lg transition-colors p-2"
                                                title="Sửa">
                                                <i class="fas fa-edit"></i></button>
                                            <button x-data
                                                @click="$dispatch('open-modal', 'delete-template-modal-{{ $attributeTemplate->id }}');"
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
                                                <p class="italic">Không tìm thấy thuộc tính nào phù hợp.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                    <div class="p-4">
                        {{ $attributeTemplates->onEachSide(1)->links() }}
                    </div>

                    @if($attributeTemplates->count() > 0)
                        @foreach ($attributeTemplates as $attributeTemplate)
                            @include('admin.templates.edit', ['template' => $attributeTemplate])
                            @include('admin.templates.delete', ['template' => $attributeTemplate])
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection