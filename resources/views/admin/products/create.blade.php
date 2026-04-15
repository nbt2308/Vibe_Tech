<x-my-modal name="create-product-modal" maxWidth="4xl">

    <x-slot name="title">
        Thêm sản phẩm mới
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('admin.products.store') }}" method="post" id="productForm"
            class="grid grid-cols-1 md:grid-cols-3 gap-8" enctype="multipart/form-data">
            @csrf
            <div class="col-span-1 md:col-span-2 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tên sản phẩm <span
                            class="text-red-500">*</span></label>
                    <input id="name" type="text" placeholder="Nhập tên sản phẩm..." name="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Đường dẫn slug </label>
                        <input type="text" placeholder="" name="slug" disabled id="slug"
                            class="w-full bg-gray-100 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sku <span
                                class="text-red-500">*</span></label>
                        <input type="text" placeholder="VD: CGM-RZ-001" name="sku" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
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
                        <label class="block text-sm font-medium text-gray-700 mb-1">Thương hiệu <span
                                class="text-red-500">*</span></label>

                        @if($brands->count() == 0)
                            <select name="" disabled
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                <option value="">Không có dữ liệu</option>
                            </select>
                        @else
                            <select name="brand_id" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                <option value="">Chọn hãng </option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>


            <div class="col-span-1 space-y-4">
                <div class="form-group mb-3">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Chọn
                        ảnh đại diện <span class="text-red-500">*</span></label>
                    <input type="file" class="filepond-thumbnail" name="thumbnail" required
                        accept="image/png, image/jpeg, image/jpg">
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                    <select name="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="1">Hiển thị (Đang bán)</option>
                        <option value="0">Ẩn (Tạm ngưng)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Số lượng kho <span
                            class="text-red-500">*</span></label>
                    <input type="number" placeholder="0" name="stock_quantity" required min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="col-span-1 md:col-span-3 pt-6 p-6 bg-blue-50/50 rounded-2xl border border-blue-100 space-y-4">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Giá bán (VNĐ) <span
                                class="text-red-500">*</span></label>
                        <input type="number" placeholder="VD: 1500000" name="price" required min="0" id="price"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Giá Giảm (VNĐ)</label>
                        <input type="number" placeholder="VD: 500000" name="sale_price" min="0" id="sale_price"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Giảm giá (%)</label>
                        <input type="text" placeholder="0%" id="discount_percent" disabled name="discount_percent"
                            class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="col-span-1 md:col-span-3 border-t border-gray-100 pt-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả chi tiết & Thông số
                    <span class="text-red-500">*</span></label>
                <p class="text-xs text-gray-500 mb-2">Nhập bài viết giới thiệu và các thông số kỹ thuật
                    (Switch, Kích thước, Kết nối...).</p>
                <textarea rows="5" name="description" required id="description-create"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>


            <div class="col-span-1 md:col-span-3 border-t border-gray-100 pt-6">
                <div class="form-group mb-3">
                    <label for="gallery_images" class="block text-sm font-medium text-gray-700 mb-1">Chọn
                        ảnh chi tiết (Có thể kéo thả nhiều ảnh):</label>
                    <input type="file" class="filepond-gallery" name="gallery[]" multiple
                        accept="image/png, image/jpeg, image/jpg">
                </div>
            </div>


        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
            Hủy bỏ
        </button>
        <button onclick="document.getElementById('productForm').submit()" type="button"
            class="px-4 py-2 bg-blue-600 rounded-md font-semibold text-xs text-white uppercase ml-2">
            Lưu sản phẩm
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

        const editorElement = document.querySelector('#description-create');
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
        if (event.detail === 'create-product-modal') {
            setTimeout(() => {
                const inputThumbnail = document.querySelector('.filepond-thumbnail');
                FilePond.create(inputThumbnail, {
                    labelIdle: 'Kéo thả ảnh vào đây hoặc <span class="filepond--label-action"> Chọn từ máy tính </span>',
                    storeAsFile: true,
                    allowImagePreview: true,
                    imagePreviewHeight: 170,
                });


                const inputGallery = document.querySelector('.filepond-gallery');
                FilePond.create(inputGallery, {
                    labelIdle: 'Kéo thả ảnh vào đây hoặc <span class="filepond--label-action"> Chọn từ máy tính </span>',
                    storeAsFile: true,
                    allowMultiple: true,
                    allowImagePreview: true,
                    imagePreviewHeight: 170,
                });

            }, 100);
        }
    });
</script>
<script>
    const convertToSlug = (str) => {
        str = str.toLowerCase();
        str = str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        str = str.replace(/[đĐ]/g, 'd');
        str = str.replace(/([^0-9a-z-\s])/g, '');
        str = str.replace(/(\s+)/g, '-');
        str = str.replace(/-+/g, '-');
        str = str.replace(/^-+|-+$/g, '');

        return str;
    };

    document.getElementById('name').addEventListener('keyup', function () {
        let title = this.value;
        document.getElementById('slug').value = convertToSlug(title);
    });

    //tính giảm giá
    const calculateDiscount = () => {
        const price = parseFloat(document.getElementById('price').value) || 0;
        const salePrice = parseFloat(document.getElementById('sale_price').value) || 0;
        const discountInput = document.getElementById('discount_percent');

        if (price > 0 && salePrice > 0 && salePrice < price) {
            const percent = Math.round(((price - salePrice) / price) * 100);
            discountInput.value ='-'+ percent + '%';
        } else {
            discountInput.value = '0%';
        }
    };

    document.getElementById('price').addEventListener('input', calculateDiscount);
    document.getElementById('sale_price').addEventListener('input', calculateDiscount);
</script>