<div>
    <div id="modal" class="hidden">
        <div
            class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto">
            <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-8 relative">
                <div class="flex items-center">
                    <h3 class="text-blue-600 text-xl font-semibold flex-1">Thêm sản phẩm mới</h3>
                    <button id="closeIcon" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="p-6 overflow-y-auto">
                    <form action="{{ route('admin.products.store') }}" method="post" id="productForm"
                        class="grid grid-cols-1 md:grid-cols-3 gap-8" enctype="multipart/form-data">
                        @csrf
                        <div class="col-span-1 md:col-span-2 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tên sản phẩm <span
                                        class="text-red-500">*</span></label>
                                <input type="text" placeholder="Nhập tên sản phẩm..." name="name" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Danh mục <span
                                            class="text-red-500">*</span></label>
                                    @if($categories->count() == 0)
                                        <select name="" disabled
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                            <option value="">Không có dữ liệu</option>
                                        </select>
                                    @else
                                        <select name="category_id" required
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                            <option value="">Chọn danh mục</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Thương hiệu</label>

                                    @if($brands->count() == 0)
                                        <select name="" disabled
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                            <option value="">Không có dữ liệu</option>
                                        </select>
                                    @else
                                        <select name="brand_id" required
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                        <option value="">Chọn hãng</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Giá bán (VNĐ) <span
                                            class="text-red-500">*</span></label>
                                    <input type="number" placeholder="VD: 1500000" name="price" required min="0"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Số lượng kho</label>
                                    <input type="number" placeholder="0" name="stock_quantity" required min="0"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>


                        <div class="col-span-1 space-y-4">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Ảnh đại diện (Thumbnail)
                                    <span class="text-red-500">*</span></label>
                                <p class="text-[11px] text-gray-500 mb-2">Ảnh vuông, hiển thị ở danh sách sản phẩm.
                                </p>
                                <div
                                    class="relative w-full aspect-square border-2 border-dashed border-gray-300 rounded-xl overflow-hidden group hover:border-blue-500 transition bg-gray-50 flex items-center justify-center">
                                    <!-- Input ẩn -->
                                    <input type="file" id="thumbnailInput" accept="image/*" name="thumbnail" required
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                        onchange="previewThumbnail(event)">


                                    <div id="thumbnailPlaceholder"
                                        class="flex flex-col items-center justify-center pointer-events-none">
                                        <i
                                            class="fas fa-image text-4xl text-gray-300 mb-2 group-hover:text-blue-400 transition"></i>
                                        <span class="text-sm text-gray-500 font-medium group-hover:text-blue-500">Click
                                            để chọn</span>
                                    </div>


                                    <img id="thumbnailPreview" src=""
                                        class="absolute inset-0 w-full h-full object-cover hidden pointer-events-none">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                                <select name="status" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                    <option value="1">Hiển thị (Đang bán)</option>
                                    <option value="0">Ẩn (Tạm ngưng)</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-span-1 md:col-span-3 border-t border-gray-100 pt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả chi tiết & Thông số
                                <span class="text-red-500">*</span></label>
                            <p class="text-xs text-gray-500 mb-2">Nhập bài viết giới thiệu và các thông số kỹ thuật
                                (Switch, Kích thước, Kết nối...).</p>
                            <textarea rows="5" name="description" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>


                        <div class="col-span-1 md:col-span-3 border-t border-gray-100 pt-6">
                            <div class="flex justify-between items-end mb-2">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Ảnh chi tiết
                                        (Gallery)</label>
                                    <p class="text-xs text-gray-500">Người dùng có thể trượt xem các ảnh này trong
                                        trang
                                        chi tiết sản phẩm.</p>
                                </div>
                                <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded">Có
                                    thể
                                    chọn nhiều ảnh</span>
                            </div>


                            <div
                                class="w-full border-2 border-dashed border-gray-300 rounded-xl p-8 bg-gray-50 hover:bg-blue-50 hover:border-blue-400 transition relative flex flex-col items-center justify-center group cursor-pointer">
                                <input type="file" multiple accept="image/*" name="gallery[]" required
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                    id="galleryInput" onchange="previewGallery(event)">
                                <i
                                    class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3 group-hover:text-blue-500 transition"></i>
                                <p class="font-medium text-gray-700 group-hover:text-blue-600">Kéo thả ảnh vào đây
                                    hoặc
                                    Click để chọn</p>
                                <p class="text-xs text-gray-500 mt-1">Định dạng hỗ trợ: JPG, PNG, WEBP</p>
                            </div>


                            <div id="galleryPreviewContainer"
                                class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-8 gap-4 mt-4 hidden">
                                <!-- JS sẽ đổ ảnh vào đây -->
                            </div>
                        </div>

                        <div class="col-span-3 flex gap-4 !mt-8 justify-end">
                            <button id="closeButton" type="button"
                                class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition font-medium">Hủy
                                bỏ</button>
                            <button type="submit"
                                class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium shadow-sm flex items-center gap-2">
                                <i class="fas fa-save"></i> Lưu Sản Phẩm
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
<script>
    // JS: Hiển thị Preview Thumbnail (1 Ảnh)
    function previewThumbnail(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewImg = document.getElementById('thumbnailPreview');
                const placeholder = document.getElementById('thumbnailPlaceholder');

                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // JS: Hiển thị Preview Gallery (Nhiều Ảnh)
    function previewGallery(event) {
        const files = event.target.files;
        if (files.length > 0) {
            galleryPreviewContainer.classList.remove('hidden');

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Tạo khối div bọc tấm ảnh
                    const div = document.createElement('div');
                    div.className = 'relative group aspect-square rounded-lg border border-gray-200 overflow-hidden shadow-sm bg-white';

                    // Nội dung tấm ảnh và nút xóa
                    div.innerHTML = `
                            <img src="${e.target.result}" class="w-full h-full object-cover">
                            <button type="button" onclick="this.parentElement.remove()" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition shadow-md hover:bg-red-600">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        `;
                    galleryPreviewContainer.appendChild(div);
                }
                reader.readAsDataURL(file);
            });
        }
    }
</script>