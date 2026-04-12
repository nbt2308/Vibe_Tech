@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Danh sách sản phẩm')
@section('placeholder-searchbar', 'Tìm kiếm sản phẩm...')
@section('content')

    <main class="flex-1 flex flex-col overscroll-auto h-dvh">
        <div class="flex-1 overflow-auto p-6 flex-col">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Danh sách sản phẩm</h2>
            </div>
            <!-- Thanh tìm kiếm -->
            <div class="flex justify-between">
                <x-searchbar action="{{ route('products') }}" placeholder="Nhập tên sản phẩm..."
                    value="{{ request('search') }}" />
                @include('admin.products.create', ['categories' => $category, 'brands' => $brand])
                <button id="openModal"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>Thêm sản phẩm
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
                                                        <img  src="{{ asset('storage/' . $product->thumbnail) }}" alt="Ảnh sản phẩm" class="w-full h-full object-cover">
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
                                            <td class="py-3 px-4 text-md text-red-500 whitespace-nowrap">
                                                <span>{{ number_format($product->price, 0, '.', ',') }}</span>
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap">
                                                <span
                                                    class="inline-flex items-center gap-1.5 px-2 py-1 rounded text-xs font-medium bg-green-100 text-green-700">
                                                    @if($product->status == 1)
                                                        Còn hàng ({{ $product->stock_quantity }})
                                                    @else
                                                        Hết hàng
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="py-3 px-4 text-right space-x-3 whitespace-nowrap">
                                                <button onclick="openModal('edit')"
                                                    class="text-blue-600 hover:text-blue-800 transition" title="Sửa"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="text-red-600 hover:text-red-800 transition" title="Xóa"
                                                    onclick="confirmDelete()"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>


                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Mở modal thêm mới -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let modal = document.getElementById('modal');
            let openModalBtn = document.getElementById('openModal');
            let closeModalBtns = [document.getElementById('closeIcon'), document.getElementById('closeButton')];

            function showModal() {
                modal.classList.remove('hidden');
            }

            function hideModal() {
                modal.classList.add('hidden');
            }

            openModalBtn.addEventListener('click', showModal);

            closeModalBtns.forEach(btn => btn.addEventListener('click', hideModal));

            // Close modal when clicking outside the modal content
            modal.addEventListener('click', (event) => {
                if (event.target === modal.firstElementChild) {
                    hideModal();
                }
            });
        });
    </script>
    </script>
    <!-- Mở modal edit -->
    <script>
        function openEditModal(id) {
            document.getElementById('modal-edit-' + id).classList.remove('hidden');
        }

        function closeEditModal(id) {
            document.getElementById('modal-edit-' + id).classList.add('hidden');
        }

        function openDeleteModal(id) {
            document.getElementById('modal-delete-' + id).classList.remove('hidden');
        }

        function closeDeleteModal(id) {
            document.getElementById('modal-delete-' + id).classList.add('hidden');
        }

    </script>
@endsection