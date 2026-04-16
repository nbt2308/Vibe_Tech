<x-my-modal name="create-template-modal" maxWidth="xl">

    <x-slot name="title">
        Thêm thuộc tính mới
    </x-slot>

    <x-slot name="content">
        <form class="space-y-6" action="{{ route('admin.templates.store') }}" method="POST" id="templateForm"
            enctype="multipart/form-data">
            @csrf
            <div>
                <label class="text-slate-900 text-sm mb-2 block">Tên hiển thị</label>
                <input placeholder='(Ví dụ: Màu sắc, Kích thước, ...)' name="display_name" required id="display_name"
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg"
                    ></input>
            </div>
            <div>
                <label class="text-slate-900 text-sm mb-2 block">Mã kỹ thuật (Key)</label>
                <input type="text" name="name" disabled id="name"
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg" />
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
            Hủy bỏ
        </button>
        <button onclick="document.getElementById('templateForm').submit()" type="button"
            class="px-4 py-2 bg-blue-600 rounded-md font-semibold text-xs text-white uppercase ml-2">
            Lưu danh mục
        </button>
    </x-slot>

</x-my-modal>

<script>
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

    document.getElementById('display_name').addEventListener('keyup', function () {
        let title = this.value;
        document.getElementById('name').value = convertToKey(title);
    });
</script>

