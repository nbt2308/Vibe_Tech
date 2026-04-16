<x-my-modal name="edit-template-modal-{{ $template->id }}" maxWidth="xl">

    <x-slot name="title">
        Cập nhật thuộc tính
    </x-slot>

    <x-slot name="content">
        <form class="space-y-6" action="{{ route('admin.templates.update', $template->id) }}" method="post" id="templateForm-{{ $template->id }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $template->id }}">
            <div>
                <label class="text-slate-900 text-sm mb-2 block">Tên hiển thị</label>
                <input placeholder='(Ví dụ: Màu sắc, Kích thước, ...)' name="display_name" required id="display_name-{{ $template->id }}" value="{{ $template->display_name }}"
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg"
                   />
            </div>
            <div>
                <label class="text-slate-900 text-sm mb-2 block">Mã kỹ thuật (Key)</label>
                <input type="text" name="name" disabled id="name-{{ $template->id }}" value="{{ $template->name }}"
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg">
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
            Hủy bỏ
        </button>
        <button onclick="document.getElementById('templateForm-{{ $template->id }}').submit()" type="button"
            class="px-4 py-2 bg-blue-600 rounded-md font-semibold text-xs text-white uppercase ml-2">
            Lưu thuộc tính
        </button>
    </x-slot>

</x-my-modal>

<script>
    (function () {
        // Hàm tính toán Slug
        const convertToKey = (str) => {
            str = str.toLowerCase();
            str = str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
            str = str.replace(/[đĐ]/g, 'd');
            str = str.replace(/([^0-9a-z-\s])/g, '');
            str = str.replace(/(\s+)/g, '-');
            str = str.replace(/-+/g, '-');
            str = str.replace(/^-+|-+$/g, '');
            return str;
        };
        

        setTimeout(() => {
            const nameInput = document.getElementById(`display_name-{{ $template->id }}`);
            const keyInput = document.getElementById(`name-{{ $template->id }}`);

            if (nameInput && keyInput) {
                nameInput.addEventListener('input', function () {
                    keyInput.value = convertToKey(this.value);
                });
            }
        }, 500);
    })();
</script>

