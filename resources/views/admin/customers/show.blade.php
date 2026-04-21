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
                        <input type="text" name="status" id="status" disabled
                            value="{{ $customer->status == 1 ? 'Hoạt động' : 'Tạm khoá' }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div class="col-span-1 md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                    <textarea rows="5" name="address" id="address" readonly disabled
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $customer->address }}</textarea>
                </div>
            </div>


            <div class="col-span-1 md:col-span-1 flex flex-col sm:flex-row gap-6 w-full">
                <div
                    class="relative overflow-hidden bg-white border border-slate-100 p-6 rounded-2xl w-full shadow-sm hover:shadow-md transition-shadow group">
                    
                    <div
                        class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-50 rounded-full transition-transform group-hover:scale-110">
                    </div>

                    <div class="relative flex items-center gap-5">
                        
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-200">
                            <i class="fa-solid fa-bag-shopping text-xl"></i>
                        </div>

                        {{-- Info --}}
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-slate-500 uppercase tracking-wider">Đơn đã mua</span>
                            <div class="flex items-baseline gap-2">
                                <span class="text-2xl font-bold text-slate-900">{{ $customer->orders->count() }}</span>
                                <span class="text-xs text-slate-400 font-normal">đơn hàng</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="relative overflow-hidden bg-white border border-slate-100 p-6 rounded-2xl w-full shadow-sm hover:shadow-md transition-shadow group">
                    {{-- Background Pattern --}}
                    <div
                        class="absolute -right-4 -top-4 w-24 h-24 bg-red-50 rounded-full transition-transform group-hover:scale-110">
                    </div>

                    <div class="relative flex items-center gap-5">
                        {{-- Icon --}}
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-red-200">
                            <i class="fa-solid fa-ban text-xl"></i>
                        </div>

                        {{-- Info --}}
                        <div class="flex flex-col">
                            <span class="text-sm font-medium text-slate-500 uppercase tracking-wider">Đơn đã huỷ</span>
                            <div class="flex items-baseline gap-2">
                                <span
                                    class="text-2xl font-bold text-red-600">{{ $customer->orders->where('status', 'cancelled')->count() }}</span>
                                <span class="text-xs text-slate-400 font-normal">đơn hàng</span>
                            </div>
                        </div>
                    </div>
                </div>
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