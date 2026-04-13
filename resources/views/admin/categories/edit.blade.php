
<x-my-modal name="edit-category-modal-{{ $category->id }}" maxWidth="xl">
    <x-slot name="title">
        Cập nhật danh mục
    </x-slot>

    <x-slot name="content">
        <form id="categoryForm-{{ $category->id }}" class="space-y-6 mt-8" action="{{ route('admin.categories.update', $category->id) }}" 
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div>
                <label class="text-slate-900 text-sm mb-2 block">Tên Danh Mục</label>
                <input type="text" placeholder="Nhập tên danh mục..." name="name" required
                    value="{{  $category->name }}"
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg" />
            </div>

            <div>
                <label class="text-slate-900 text-sm mb-2 block">Mô tả</label>
                <textarea placeholder='(Ví dụ: Bàn phím cơ, Chuột gaming, Màn hình,...)' name="description" required
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg"
                    rows="3">{{  $category->description }}</textarea>
            </div>
            <div>
                <div class="form-group mb-3">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Chọn
                        ảnh đại diện:<span class="text-red-500">*</span></label>
                    <input type="file" class="filepond-thumbnail-{{ $category->id }}" name="thumbnail"
                        accept="image/png, image/jpeg, image/jpg">
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
            Hủy bỏ
        </button>
        <button onclick="document.getElementById('categoryForm-{{ $category->id }}').submit()" type="button"
            class="ml-3 px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
            Cập nhật
        </button>
    </x-slot>
</x-my-modal>
<script>
    window.addEventListener('open-modal', function (event) {
        if (event.detail === 'edit-category-modal-{{ $category->id }}') {
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
                const inputThumb = document.querySelector('.filepond-thumbnail-{{ $category->id }}');
                if (inputThumb && !FilePond.find(inputThumb)) {
                    const existingThumbnail = [];
                    @if($category->thumbnail)
                        existingThumbnail.push({
                            source: '{{ asset("storage/" . $category->thumbnail) }}',
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

               
            }, 100);
        }
    });
</script>