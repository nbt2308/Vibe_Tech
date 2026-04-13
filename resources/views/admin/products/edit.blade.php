<x-my-modal name="edit-product-modal-{{ $product->id }}" maxWidth="4xl">
    <x-slot name="title">
        Cập nhật sản phẩm
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('admin.products.update', $product->id) }}" method="post"
            id="productForm-{{ $product->id }}" class="grid grid-cols-1 md:grid-cols-3 gap-8"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="col-span-1 md:col-span-2 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tên sản phẩm <span
                            class="text-red-500">*</span></label>
                    <input type="text" placeholder="Nhập tên sản phẩm..." name="name" required
                        value="{{ $product->name }}"
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
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
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
                            value="{{ $product->price }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Số lượng kho</label>
                        <input type="number" placeholder="0" name="stock_quantity" required min="0"
                            value="{{ $product->stock_quantity }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>


            <div class="col-span-1 space-y-4">
                <div class="form-group mb-3">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Chọn
                        ảnh đại diện:<span class="text-red-500">*</span></label>
                    <input type="file" class="filepond-thumbnail-{{ $product->id }}" name="thumbnail"
                        id="filepond-thumbnail-{{ $product->id }}" accept="image/png, image/jpeg, image/jpg">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                    <select name="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Hiển thị (Đang bán)
                        </option>
                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Ẩn (Tạm ngưng)
                        </option>
                    </select>
                </div>
            </div>


            <div class="col-span-1 md:col-span-3 border-t border-gray-100 pt-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả chi tiết & Thông số
                    <span class="text-red-500">*</span></label>
                <p class="text-xs text-gray-500 mb-2">Nhập bài viết giới thiệu và các thông số kỹ thuật
                    (Switch, Kích thước, Kết nối...).</p>
                <textarea rows="5" name="description" required id="description-edit-{{ $product->id }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $product->description }}</textarea>
            </div>


            <div class="col-span-1 md:col-span-3 border-t border-gray-100 pt-6">
                <div class="form-group mb-3">
                    <label for="gallery_images" class="block text-sm font-medium text-gray-700 mb-1">Chọn
                        ảnh chi tiết (Có thể kéo thả nhiều ảnh):</label>
                    <input type="file" class="filepond-gallery-{{ $product->id }}" name="gallery[]"
                        id="filepond-gallery-{{ $product->id }}" multiple accept="image/png, image/jpeg, image/jpg">
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
            Hủy bỏ
        </button>
        <button onclick="document.getElementById('productForm-{{ $product->id }}').submit()" type="button"
            class="ml-3 px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
            Cập nhật
        </button>
    </x-slot>
</x-my-modal>

<script>
    (function () {
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
            Image,
            ImageInsert,
            ImageToolbar,
            Table
        } = CKEDITOR;

        const editorElement = document.querySelector('#description-edit-{{ $product->id }}');
        if (editorElement) {
            ClassicEditor
                .create(editorElement, {
                    licenseKey: '{{ env('CKEDITOR_LICENSE_KEY', '') }}',
                    plugins: [Essentials, Bold, Italic, Font, Paragraph, Image, ImageInsert, ImageToolbar, Table],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                        'insertImage', 'insertTable'
                    ],
                })
                .then()
                .catch();
        }
    })();
</script>

<script>
    window.addEventListener('open-modal', function (event) {
        if (event.detail === 'edit-product-modal-{{ $product->id }}') {
            setTimeout(() => {
                const loadData = {
                    load: (source, load, error, progress, abort, headers) => {
                        fetch(source)
                            .then(response => {
                                if (!response.ok) throw new Error('Network response was not ok');
                                return response.blob();
                            })
                            .then(blob => load(blob))
                            .catch(err => {
                                console.error('FilePond load error:', err);
                                error('Không thể tải ảnh');
                            });
                    }
                };

                // Thumbnail
                const inputThumb = document.querySelector('.filepond-thumbnail-{{ $product->id }}');
                if (inputThumb && !FilePond.find(inputThumb)) {
                    const existingThumbnail = [];
                    @if($product->thumbnail)
                        existingThumbnail.push({
                            source: '{{ asset("storage/" . $product->thumbnail) }}',
                            options: { type: 'local' }
                        });
                    @endif

                    FilePond.create(inputThumb, {
                        labelIdle: 'Kéo thả hoặc <span class="filepond--label-action">Chọn ảnh</span>',
                        storeAsFile: true,
                        files: existingThumbnail,
                        server: loadData,
                        allowImagePreview: true,
                        imagePreviewHeight: 170,
                    });
                }

                // Gallery
                const inputGallery = document.querySelector('.filepond-gallery-{{ $product->id }}');
                if (inputGallery && !FilePond.find(inputGallery)) {
                    const existingGallery = [];
                    @foreach($product->productImages as $image)
                        @if($image->image_path)
                            existingGallery.push({
                                source: '{{ asset("storage/" . $image->image_path) }}',
                                options: { type: 'local' }
                            });
                        @endif
                    @endforeach

                    FilePond.create(inputGallery, {
                        labelIdle: 'Kéo thả hoặc <span class="filepond--label-action">Chọn ảnh chi tiết</span>',
                        storeAsFile: true,
                        allowMultiple: true,
                        files: existingGallery,
                        server: loadData,
                        allowImagePreview: true,
                        imagePreviewHeight: 170,
                    });
                }
            }, 100);
        }
    });
</script>