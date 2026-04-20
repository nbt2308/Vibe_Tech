<x-my-modal name="show-order-modal-{{ $order->id }}" maxWidth="5xl">

    <x-slot name="title">
        <div class="flex items-center gap-3">
            <div>
                <span class="text-lg font-bold text-gray-900">Đơn hàng #{{ $order->order_code }}</span>
                <p class="text-xs text-gray-400 font-normal">Ngày đặt: {{ $order->formatted_created_at }}</p>
            </div>
        </div>
    </x-slot>

    <x-slot name="content">
        @php
            $isCancelled = $order->status === 'cancelled';
            if ($isCancelled) {
                $steps[] = ['key' => 'cancelled', 'label' => 'Đã hủy', 'icon' => 'fa-solid fa-ban'];
            }
        @endphp

        <div class="space-y-5">

            {{-- ===== Trạng thái hiện tại===== --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-6 transition-shadow duration-200 hover:shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl flex items-center justify-center bg-indigo-50 text-indigo-600">
                            <i class="fa-solid fa-route"></i>
                        </div>
                        <h3 class="text-base font-bold text-gray-900">Trạng thái đơn hàng</h3>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $order->status_badge }}">
                        {!! $order->status_icon !!} {{ $order->formatted_status }}
                    </span>
                </div>
            </div>

            {{-- Đơn hàng bị huỷ--}}
            @if ($isCancelled)
                <div
                    class="bg-gradient-to-br from-red-50 to-rose-50 border border-red-200 rounded-2xl p-5 relative overflow-hidden">
                    <div class="flex items-start gap-3 pl-3">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-bold text-red-700 mb-2">Đơn hàng đã bị huỷ</h4>
                            <div class="space-y-2">
                                <div class="flex items-start gap-2">
                                    <span
                                        class="text-xs font-semibold text-red-500 uppercase whitespace-nowrap mt-0.5 w-20 shrink-0">Lý
                                        do:</span>
                                    <span
                                        class="text-sm text-red-800 font-medium">{{ $order->reason_cancel ?? 'Không có lý do' }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-xs font-semibold text-red-500 uppercase whitespace-nowrap w-20 shrink-0">Huỷ
                                        bởi:</span>
                                    <div class="flex items-center gap-1.5">
                                        @if ($order->updated_by_user_type == 1)
                                            <span
                                                class="inline-flex items-center gap-1 px-2 py-0.5 bg-red-100 text-red-700 rounded-full text-xs font-bold">
                                                <i class="fa-solid fa-shield-halved text-[10px]"></i> Admin
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1 px-2 py-0.5 bg-orange-100 text-orange-700 rounded-full text-xs font-bold">
                                                <i class="fa-solid fa-user text-[10px]"></i> Khách hàng
                                            </span>
                                        @endif
                                        <span class="text-sm text-red-800 font-medium">
                                            {{ $order->updatedByUser ? $order->updatedByUser->name : 'Không xác định' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-xs font-semibold text-red-500 uppercase whitespace-nowrap w-20 shrink-0">Thời
                                        gian:</span>
                                    <span class="text-sm text-red-800 font-medium">{{ $order->formatted_updated_at }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- ===== CUSTOMER INFO ===== --}}
            <div
                class="bg-white border border-gray-200 rounded-2xl p-5 transition-shadow duration-200 hover:shadow-[0_4px_16px_rgba(0,0,0,0.04)]">
                <div class="flex items-center gap-2.5 mb-4 pb-3 border-b border-gray-100">
                    <div
                        class="w-8 h-8 rounded-[10px] flex items-center justify-center text-[13px] shrink-0 bg-emerald-100 text-emerald-600">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <h3 class="text-[15px] font-bold text-gray-800">Thông tin khách hàng</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1">
                        <span class="text-[11px] font-semibold uppercase tracking-[0.04em] text-gray-400">Tên khách
                            hàng</span>
                        <span
                            class="text-sm font-medium text-gray-800 px-3 py-2 bg-gray-50 rounded-lg border border-gray-100 flex items-center">
                            <i class="fa-regular fa-user text-gray-400 mr-2 text-xs"></i>
                            {{ $order->customer_name }}
                        </span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[11px] font-semibold uppercase tracking-[0.04em] text-gray-400">Email</span>
                        <span
                            class="text-sm font-medium text-gray-800 px-3 py-2 bg-gray-50 rounded-lg border border-gray-100 flex items-center">
                            <i class="fa-regular fa-envelope text-gray-400 mr-2 text-xs"></i>
                            {{ $order->customer_email }}
                        </span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[11px] font-semibold uppercase tracking-[0.04em] text-gray-400">Số điện
                            thoại</span>
                        <span
                            class="text-sm font-medium text-gray-800 px-3 py-2 bg-gray-50 rounded-lg border border-gray-100 flex items-center">
                            <i class="fa-solid fa-phone text-gray-400 mr-2 text-xs"></i>
                            {{ $order->customer_phone }}
                        </span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[11px] font-semibold uppercase tracking-[0.04em] text-gray-400">Địa chỉ</span>
                        <span
                            class="text-sm font-medium text-gray-800 px-3 py-2 bg-gray-50 rounded-lg border border-gray-100 flex items-center">
                            <i class="fa-solid fa-location-dot text-gray-400 mr-2 text-xs"></i>
                            {{ $order->customer_address }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div class="flex flex-col gap-1">
                        <span class="text-[11px] font-semibold uppercase tracking-[0.04em] text-gray-400">Phương thức
                            thanh toán</span>
                        <span
                            class="text-sm font-medium text-gray-800 px-3 py-2 bg-gray-50 rounded-lg border border-gray-100 flex items-center">
                            <i class="fa-solid fa-money-bill-wave text-gray-400 mr-2 text-xs"></i>
                            @if ($order->payment_method === 'cod')
                                Thanh toán khi nhận hàng (COD)
                            @else
                                {{ $order->payment_method }}
                            @endif
                        </span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[11px] font-semibold uppercase tracking-[0.04em] text-gray-400">Ghi chú</span>
                        <span
                            class="text-sm font-medium text-gray-800 px-3 py-2 bg-gray-50 rounded-lg border border-gray-100 min-h-[40px] flex items-center">
                            <i class="fa-regular fa-comment-dots text-gray-400 mr-2 text-xs"></i>
                            {{ $order->note ?? 'Không có ghi chú' }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- ===== PRODUCTS ===== --}}
            <div
                class="bg-white border border-gray-200 rounded-2xl transition-shadow duration-200 hover:shadow-[0_4px_16px_rgba(0,0,0,0.04)] overflow-hidden">
                <div class="flex items-center gap-2.5 px-5 pt-5 pb-3">
                    <div
                        class="w-8 h-8 rounded-[10px] flex items-center justify-center text-[13px] shrink-0 bg-violet-100 text-violet-600">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <h3 class="text-[15px] font-bold text-gray-800">Sản phẩm đã đặt</h3>
                    <span class="ml-auto text-xs font-semibold text-gray-400 bg-gray-100 px-2.5 py-1 rounded-full">
                        {{ $order->orderDetails->count() }} sản phẩm
                    </span>
                </div>

                <div class="p-4 pt-0">
                    <div class="overflow-x-auto border border-gray-300 rounded-xl">
                        <table class="w-full text-left border-separate border-spacing-0">
                            <thead>
                                <tr>
                                    <th
                                        class="py-3 px-4 text-[11px] font-bold uppercase tracking-[0.05em] text-gray-500 bg-gray-50 border-b-2 border-gray-200 rounded-tl-xl">
                                        Sản phẩm</th>
                                    <th
                                        class="py-3 px-4 text-[11px] font-bold uppercase tracking-[0.05em] text-gray-500 bg-gray-50 border-b-2 border-gray-200">
                                        Số lượng</th>
                                    <th
                                        class="py-3 px-4 text-[11px] font-bold uppercase tracking-[0.05em] text-gray-500 bg-gray-50 border-b-2 border-gray-200">
                                        Giá bán</th>
                                    <th
                                        class="py-3 px-4 text-[11px] font-bold uppercase tracking-[0.05em] text-gray-500 bg-gray-50 border-b-2 border-gray-200 rounded-tr-xl">
                                        Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->orderDetails as $orderDetail)
                                    <tr class="transition-colors duration-150 hover:bg-gray-50">
                                        <td class="py-3.5 px-4 border-b border-gray-100 align-middle">
                                            <div class="flex items-center gap-3">
                                                <img src="{{ asset('storage/' . $orderDetail->product->thumbnail) }}"
                                                    class="w-12 h-12 rounded-lg object-cover border border-gray-100 shrink-0 shadow-sm"
                                                    onerror="this.src='{{ asset('images/no-image.png') }}'">
                                                <div class="max-w-[200px] md:max-w-xs overflow-hidden">
                                                    <p class="font-bold text-gray-900 truncate"
                                                        title="{{ $orderDetail->product->name }}">
                                                        {{ $orderDetail->product->name }}
                                                    </p>
                                                    <p class="text-[11px] text-gray-400 truncate italic">
                                                        {{ $orderDetail->product->sku }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4 border-b border-gray-100 align-middle">
                                            <span class="text-[13px] text-slate-600 font-medium">
                                                {{ $orderDetail->quantity }}
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-4 border-b border-gray-100 align-middle">
                                            <span class="text-[13px] text-slate-600 font-medium">
                                                {{ $orderDetail->formatted_unit_price }}
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-4 border-b border-gray-100 align-middle">
                                            <span class="text-[13px] text-slate-600 font-medium">
                                                {{ $orderDetail->formatted_total_price }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-20 text-center">
                                            <div class="flex flex-col items-center justify-center text-gray-400">
                                                <i class="fa-solid fa-box-open text-5xl mb-4 opacity-20"></i>
                                                <p class="italic">Không tìm thấy sản phẩm nào phù hợp.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div
                class="bg-white p-4 rounded-2xl border border-gray-200 shadow-sm space-y-3 hover:shadow-[0_4px_16px_rgba(0,0,0,0.04)] transition-shadow duration-200">
                <div class="flex justify-between text-gray-500 text-sm">
                    <span>Tạm tính:</span>
                    <span id="subtotal-display"
                        class="font-semibold text-gray-800">{{ $order->formatted_sub_total }}</span>
                </div>
                <div class="flex justify-between items-center text-gray-500 text-sm">
                    <span>Phí ship:</span>
                    <span id="shipping_fee-display"
                        class="font-semibold text-gray-800">{{ $order->formatted_shipping_fee }}</span>
                </div>
                <div class="pt-3 border-t border-dashed border-gray-200 flex justify-between items-end">
                    <span class="font-bold text-gray-800">TỔNG CỘNG</span>
                    <span id="total-display"
                        class="text-2xl font-black text-red-600 tracking-tight">{{ $order->formatted_total_amount }}</span>
                </div>
            </div>

        </div>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 rounded-xl font-semibold text-xs text-gray-600 uppercase tracking-wider shadow-sm hover:bg-gray-50 hover:border-gray-300 transition-all duration-200">
            <i class="fa-solid fa-xmark text-sm"></i>
            Đóng
        </button>
    </x-slot>

</x-my-modal>