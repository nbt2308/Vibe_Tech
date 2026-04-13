<x-my-modal name="edit-brand-modal-{{ $brand->id }}" maxWidth="xl">
    <x-slot name="title">
        Cập nhật thương hiệu
    </x-slot>

    <x-slot name="content">
        <form class="space-y-6 mt-8" action="{{ route('admin.brands.update', $brand->id) }}" method="POST" id="brandForm-{{ $brand->id }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $brand->id }}">
            <div>
                <label class="text-slate-900 text-sm mb-2 block">Tên Thương Hiệu</label>
                <input type="text" placeholder="(Ví dụ: Razer, Logitech, Corsair,...)" name="name" required
                    value="{{  $brand->name }}"
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg" />
            </div>

            <div>
                <label class="text-slate-900 text-sm mb-2 block">Mô tả</label>
                <!-- Fix tag textarea HTML value -->
                <textarea placeholder='(Ví dụ: Thương hiệu chuyên về gaming, Thương hiệu chuyên về văn phòng,...)'
                    name="description" required
                    class="px-4 py-3 bg-gray-100 w-full text-slate-900 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg"
                    rows="3">{{  $brand->description }}</textarea>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
            Hủy bỏ
        </button>
        <button onclick="document.getElementById('brandForm-{{ $brand->id }}').submit()" type="button"
            class="ml-3 px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
            Cập nhật
        </button>
    </x-slot>
</x-my-modal>