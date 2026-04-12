@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Danh mục')
@section('placeholder-searchbar', 'Tìm kiếm danh mục...')
@section('content')
    <main class="flex-1 flex flex-col overscroll-auto h-dvh">
        <div class="flex-1 overflow-auto p-6 flex-col">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Danh mục</h2>
               
            </div>
            <!-- Thanh tìm kiếm và nút thêm -->
             <div class="flex justify-between">
                <x-searchbar action="{{ route('categories') }}" placeholder="Nhập tên danh mục..." value="{{ request('search') }}" />
                 @include('admin.categories.create')
                <button id="openModal"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>Thêm danh mục
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
                                    <th class="py-3 px-4 font-medium">Slug</th>
                                    <th class="py-3 px-4 font-medium">Mô tả</th>
                                    <th class="py-3 px-4 font-medium text-right">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                @if ($categories->count() == 0)
                                    <tr>
                                        <td colspan="5" class="py-3 px-4 text-center text-gray-500">Không có danh mục nào</td>
                                    </tr>
                                @else
                                    @foreach ($categories as $category)
                                        <!-- Sản phẩm 1 -->
                                        <tr class="hover:bg-gray-50 transition ">
                                            <td class="py-3 px-4 text-gray-500">{{ $category->id }}</td>
                                            <td class="py-3 px-4">
                                                <div class="flex items-center gap-3">
                                                    <!-- Thumbnail nhỏ trong bảng -->
                                                    <div
                                                        class="w-12 h-12 rounded bg-gray-100 flex items-center justify-center overflow-hidden border border-gray-200 shrink-0">
                                                        <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="Ảnh sản phẩm"
                                                            class="w-full h-full object-cover">
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-900 line-clamp-1">{{ $category->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4"><span
                                                    class="px-2 py-1 bg-gray-100 rounded text-xs whitespace-nowrap">{{ $category->slug }}</span>
                                            </td>
                                            <td class="py-3 px-4"><span
                                                    class="px-2 py-1  text-md whitespace-nowrap">{{ $category->description }}</span>
                                            </td>
                                            <td class="py-3 px-4 text-right space-x-3 whitespace-nowrap">
                                                <button type="button" onclick="openEditModal({{ $category->id }})"
                                                    class="text-blue-600 hover:text-blue-800 transition" title="Sửa">
                                                    <i class="fas fa-edit"></i></button>
                                                <button onclick="openDeleteModal({{ $category->id }})"
                                                    class="text-red-600 hover:text-red-800 transition" title="Xóa">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @include('admin.categories.edit', ['category' => $category])
                                        @include('admin.categories.delete', ['category' => $category])
                                    @endforeach
                                @endif

                            </tbody>
                        </table>

                    </div>
                    <div class="my-6 mx-6" >
                        {{ $categories->links() }}
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