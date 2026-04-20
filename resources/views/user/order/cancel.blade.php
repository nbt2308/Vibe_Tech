<x-my-modal name="cancel-order-modal-{{ $order->id }}" maxWidth="lg">

    <x-slot name="title">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center">
                <i class="fa-solid fa-triangle-exclamation text-red-500 text-sm"></i>
            </div>
            <div>
                <span class="text-lg font-bold text-gray-900">Huỷ đơn hàng</span>
                <p class="text-xs text-gray-400 font-normal">#{{ $order->order_code }}</p>
            </div>
        </div>
    </x-slot>

    <x-slot name="content">
        <form id="cancel-order-form-{{ $order->id }}" action="{{ route('order.cancel', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                {{-- Warning Banner --}}
                <div class="flex items-start gap-3 p-4 bg-amber-50 border border-amber-200 rounded-xl">
                    <i class="fa-solid fa-circle-info text-amber-500 mt-0.5"></i>
                    <div>
                        <p class="text-sm font-semibold text-amber-800">Bạn có chắc chắn muốn huỷ đơn hàng này?</p>
                        <p class="text-xs text-amber-600 mt-1">Hành động này không thể hoàn tác. Sản phẩm sẽ được hoàn lại kho.</p>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div class="p-3 bg-gray-50 rounded-xl border border-gray-100">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500">Mã đơn:</span>
                        <span class="font-bold text-gray-900">#{{ $order->order_code }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm mt-1">
                        <span class="text-gray-500">Tổng tiền:</span>
                        <span class="font-bold text-red-600">{{ $order->formatted_total_amount }}</span>
                    </div>
                </div>

                {{-- Cancel Reason --}}
                <div>
                    <label for="reason_cancel_{{ $order->id }}" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fa-regular fa-comment-dots text-gray-400 mr-1"></i>
                        Lý do huỷ đơn hàng <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        id="reason_cancel_{{ $order->id }}" 
                        name="reason_cancel" 
                        rows="3" 
                        required
                        placeholder="Vui lòng cho chúng tôi biết lý do bạn muốn huỷ đơn hàng..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-red-300 focus:border-red-400 transition-all resize-none placeholder:text-gray-300"
                    ></textarea>
                </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <div class="flex items-center gap-3">
            <button @click="show = false" type="button"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 rounded-xl font-semibold text-xs text-gray-600 uppercase tracking-wider shadow-sm hover:bg-gray-50 hover:border-gray-300 transition-all duration-200">
                Không, giữ đơn
            </button>
            <button type="submit" form="cancel-order-form-{{ $order->id }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-600 border border-red-600 rounded-xl font-semibold text-xs text-white uppercase tracking-wider shadow-sm hover:bg-red-700 transition-all duration-200">
                <i class="fa-solid fa-ban text-sm"></i>
                Xác nhận huỷ
            </button>
        </div>
    </x-slot>

</x-my-modal>
