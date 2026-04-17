<x-my-modal name="show-customer-modal-{{ $customer->id }}" maxWidth="lg">

    <x-slot name="title">
        Thông tin khách hàng
    </x-slot>

    <x-slot name="content">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <div class="col-span-1 md:col-span-1 space-y-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tên khách hàng</label>
                    <input id="name" type="text" placeholder="Nhập tên người dùng..." name="name"
                        value="{{ $customer->name }}" readonly disabled
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                </div>


                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email </label>
                        <input type="email" placeholder="Không thể sửa thông tin này tại đây" name="email" id="email"
                            disabled value="{{ $customer->email }}" readonly
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                        <input id="phone" type="text" placeholder="Nhập số điện thoại..." name="phone"
                            value="{{ $customer->phone }}" readonly disabled
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái</label>
                        <input type="text" name="status" id="status" disabled value="{{ $customer->status == 1 ? 'Hoạt động' : 'Tạm khoá' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="col-span-1 md:col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                <textarea rows="5" name="address" id="address" readonly disabled
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $customer->address }}</textarea>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase hover:bg-gray-100">
            Đóng
        </button>
    </x-slot>

</x-my-modal>