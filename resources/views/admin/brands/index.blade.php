@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Thương hiệu')
@section('placeholder-searchbar', 'Tìm kiếm thương hiệu...')
@section('content')
    <main class="flex-1 flex flex-col overscroll-auto h-dvh">
        <div class="flex-1 overflow-auto p-6 flex-col">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Thương hiệu</h2>

            </div>
            <!-- Thanh tìm kiếm và nút thêm -->
            <div class="flex justify-between">
                <x-searchbar action="{{ route('brands') }}" placeholder="Nhập tên thương hiệu..." value="{{ request('search') }}" />
                @include('admin.brands.create')
                <button id="openModal"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>Thêm thương hiệu
                </button>
            </div>


            <!-- Bảng danh sách thương hiệu -->
            <div class="bg-white rounded-lg shadow-md mt-6">
                <div class="bg-white rounded-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="bg-gray-50 border-b border-gray-200 text-sm text-gray-500 uppercase tracking-wider">
                                    <th class="py-3 px-4 font-medium w-16">ID</th>
                                    <th class="py-3 px-4 font-medium">Tên thương hiệu</th>
                                    <th class="py-3 px-4 font-medium">Mô tả</th>
                                    <th class="py-3 px-4 font-medium text-right">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                @if ($brands->count() == 0)
                                    <tr>
                                        <td colspan="5" class="py-3 px-4 text-center text-gray-500">Không có thương hiệu nào
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($brands as $brand)
                                        <!-- Sản phẩm 1 -->
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="py-3 px-4 text-gray-500">{{ $brand->id }}</td>
                                            <td class="py-3 px-4">
                                                <div class="flex items-center gap-3">
                                                    <p class="font-semibold text-gray-900 line-clamp-1">{{ $brand->name }}</p>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 py-1  text-md whitespace-nowrap">{{ $brand->description }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-right space-x-3 whitespace-nowrap">
                                                <button type="button" onclick="openEditModal({{ $brand->id }})"
                                                    class="text-blue-600 hover:text-blue-800 transition" title="Sửa">
                                                    <i class="fas fa-edit"></i></button>
                                                <button onclick="openDeleteModal({{ $brand->id }})"
                                                    class="text-red-600 hover:text-red-800 transition" title="Xóa">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @include('admin.brands.edit', ['brand' => $brand])
                                        @include('admin.brands.delete', ['brand' => $brand])
                                    @endforeach
                                @endif

                            </tbody>
                        </table>

                    </div>
                    <div class="my-6 mx-6">
                        {{ $brands->links() }}
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