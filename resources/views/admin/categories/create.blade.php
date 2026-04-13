<x-my-modal name="create-category-modal" maxWidth="xl">

    <x-slot name="title">
        Thêm danh mục mới
    </x-slot>

    <x-slot name="content">
        <form class="space-y-6 mt-8" action="{{ route('admin.categories.store') }}" method="POST" id="categoryForm"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label class="text-slate-900 text-sm mb-2 block">Tên Danh Mục</label>
                <input type="text" placeholder="Nhập tên danh mục..." name="name" required
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg" />
            </div>

            <div>
                <label class="text-slate-900 text-sm mb-2 block">Mô tả</label>
                <textarea placeholder='(Ví dụ: Bàn phím cơ, Chuột gaming, Màn hình,...)' name="description" required
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg"
                    rows="3"></textarea>
            </div>
            <div>
                <div class="form-group mb-3">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Chọn
                        ảnh đại diện:<span class="text-red-500">*</span></label>
                    <input type="file" class="filepond-thumbnail" name="thumbnail"
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
        <button onclick="document.getElementById('categoryForm').submit()" type="button"
            class="px-4 py-2 bg-blue-600 rounded-md font-semibold text-xs text-white uppercase ml-2">
            Lưu danh mục
        </button>
    </x-slot>

</x-my-modal>

<script>
    window.addEventListener('open-modal', function (event) {
        if (event.detail === 'create-category-modal') {
            setTimeout(() => {
                const inputThumbnail = document.querySelector('.filepond-thumbnail');
                FilePond.create(inputThumbnail, {
                    labelIdle: 'Kéo thả ảnh vào đây hoặc <span class="filepond--label-action"> Chọn từ máy tính </span>',
                    storeAsFile: true,
                    allowImagePreview: true,
                    imagePreviewHeight: 170,
                });
            }, 100);
        }
    });
</script>