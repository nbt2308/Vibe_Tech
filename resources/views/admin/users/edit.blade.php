<x-my-modal name="edit-user-modal-{{ $user->id }}" maxWidth="4xl">

    <x-slot name="title">
        Cập nhật người dùng
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('admin.users.update', $user->id) }}" method="post" id="userForm-{{ $user->id }}"
            class="grid grid-cols-1 md:grid-cols-1 gap-8" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="col-span-1 md:col-span-1 space-y-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tên người dùng <span
                            class="text-red-500">*</span></label>
                    <input id="name" type="text" placeholder="Nhập tên người dùng..." name="name" required
                    value="{{ $user->name }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                </div>


                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email </label>
                        <input type="email" placeholder="Không thể sửa thông tin này tại đây" name="email" id="email" 
                            disabled
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu </label>
                        <input type="password" placeholder="Không thể sửa thông tin này tại đây" name="password" disabled
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại <span
                                class="text-red-500">*</span></label>
                        <input id="phone" type="text" placeholder="Nhập số điện thoại..." name="phone" required
                        value="{{ $user->phone }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Trạng thái <span
                                class="text-red-500">*</span></label>
                        <select name="status" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Tạm khoá</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-span-1 md:col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                <textarea rows="5" name="address" id="address"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $user->address }}</textarea>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
            Hủy bỏ
        </button>
        <button type="submit" form="userForm-{{ $user->id }}"
            class="px-4 py-2 bg-blue-600 rounded-md font-semibold text-xs text-white uppercase ml-2">
            Lưu người dùng
        </button>
    </x-slot>

</x-my-modal>