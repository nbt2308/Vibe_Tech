<x-my-modal name="create-user-modal" maxWidth="4xl">

    <x-slot name="title">
        Thêm người dùng mới
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('admin.users.store') }}" method="post" id="userForm"
            class="grid grid-cols-1 md:grid-cols-1 gap-8" enctype="multipart/form-data">
            @csrf
            <div class="col-span-1 md:col-span-1 space-y-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tên người dùng <span
                            class="text-red-500">*</span></label>
                    <input id="name" type="text" placeholder="Nhập tên người dùng..." name="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                </div>


                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email <span
                                class="text-red-500">*</span></label>
                        <input type="email" placeholder="Nhập email..." name="email" id="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu <span
                                class="text-red-500">*</span></label>
                        <input type="password" placeholder="Nhập mật khẩu..." name="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại <span
                                class="text-red-500">*</span></label>
                        <input id="phone" type="text" placeholder="Nhập số điện thoại..." name="phone" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái <span
                                class="text-red-500">*</span></label>
                        <select name="status" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                            <option value="1">Hoạt động</option>
                            <option value="0">Tạm khoá</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-span-1 md:col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                <textarea rows="5" name="address" id="address"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
            Hủy bỏ
        </button>
        <button type="submit" form="userForm"
            class="px-4 py-2 bg-blue-600 rounded-md font-semibold text-xs text-white uppercase ml-2">
            Lưu người dùng
        </button>
    </x-slot>

</x-my-modal>