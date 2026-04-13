
<x-my-modal name="create-brand-modal" maxWidth="xl">

    <x-slot name="title">
        Thêm thương hiệu mới
    </x-slot>

    <x-slot name="content">
        <form class="space-y-6 mt-8" action="{{ route('admin.brands.store') }}" method="POST" id="brandForm"
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