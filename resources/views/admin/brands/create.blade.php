
<x-my-modal name="create-brand-modal" maxWidth="xl">

    <x-slot name="title">
        Thêm thương hiệu mới
    </x-slot>

    <x-slot name="content">
        <form class="space-y-6" action="{{ route('admin.brands.store') }}" method="POST" id="brandForm"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label class="text-slate-900 text-sm mb-2 block">Tên Thương hiệu</label>
                <input type="text" placeholder="(Ví dụ: Razer, Logitech, Corsair,...)" name="name" required
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg" />
            </div>

            <div>
                <label class="text-slate-900 text-sm mb-2 block">Mô tả</label>
                <textarea placeholder='(Ví dụ: Thương hiệu chuyên về gaming, Thương hiệu chuyên về văn phòng,...)'
                    name="description" required
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg"
                    rows="3"></textarea>
            </div>
            <div>
                <label class="text-slate-900 text-sm mb-2 block">Trạng thái</label>
                <select name="status" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <div>
                <div class="form-group mb-3">
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Chọn
                        ảnh đại diện của thương hiệu<span class="text-red-500">*</span></label>
                    <input type="file" class="filepond-logo" name="logo"
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
        <button onclick="document.getElementById('brandForm').submit()" type="button"
            class="px-4 py-2 bg-blue-600 rounded-md font-semibold text-xs text-white uppercase ml-2">
            Lưu thương hiệu
        </button>
    </x-slot>

</x-my-modal>

<script>
    window.addEventListener('open-modal', function (event) {
        if (event.detail === 'create-brand-modal') {
            setTimeout(() => {
                const inputThumbnail = document.querySelector('.filepond-logo');
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