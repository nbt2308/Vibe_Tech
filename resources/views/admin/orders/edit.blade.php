<x-my-modal name="edit-order-modal-{{ $order->id }}" maxWidth="4xl">

    <x-slot name="title">
        Cập nhật đơn hàng - #{{ $order->order_code }}
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('admin.orders.update', $order->id) }}" method="post" id="orderForm-{{ $order->id }}"
            class="grid grid-cols-1 md:grid-cols-1 gap-8" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $order->id }}">
            <div class="col-span-1 md:col-span-1 space-y-4 border border-gray-200 rounded-xl p-4">
                <div class="flex items-center gap-2">
                    <div class="py-1.5 px-2 bg-emerald-100 text-emerald-600 rounded-xl">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <span class="text-lg font-bold">Thông tin khách hàng</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tên khách hàng</label>
                        <input id="customer_name" type="text" placeholder="" name="customer_name" readonly
                            value="{{ $order->customer_name }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" placeholder="" name="customer_email" id="customer_email"
                            value="{{ $order->customer_email }}" readonly
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                        <input type="text" placeholder="" name="customer_phone" id="customer_phone"
                            value="{{ $order->customer_phone }}" readonly
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                        <input type="text" placeholder="" name="customer_address" id="customer_address"
                            value="{{ $order->customer_address }}" readonly
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phương thức thanh toán</label>
                        <input type="text" placeholder="" name="payment_method" id="payment_method"
                            value="{{ $order->payment_method }}" readonly
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú</label>
                        <input type="text" placeholder="" name="note" id="note" value="{{ $order->note ?? 'Không có ghi chú' }}" readonly
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-1 border border-gray-200 rounded-xl p-4">
                <div class="flex items-center gap-2">
                    <div class="py-1.5 px-2 bg-violet-100 text-violet-600 rounded-xl">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <span class="text-lg font-bold">Thông tin sản phẩm</span>
                </div>
                <div class="overflow-x-auto mt-3 border border-gray-300 rounded-lg">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-800 text-sm text-white uppercase tracking-wider">
                                <th class="py-4 px-4 font-medium">Sản phẩm</th>
                                <th class="py-4 px-4 font-medium">Số lượng</th>
                                <th class="py-4 px-4 font-medium">Giá bán</th>
                                <th class="py-4 px-4 font-medium ">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                            @forelse ($order->orderDetails as $orderDetail)
                                <tr class="hover:bg-gray-50/80 transition">
                                    <td class="py-4 px-4">
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
                                    <td class="py-4 px-4">
                                        <span class="px-2.5 py-1 text-slate-600 font-medium">
                                            {{ $orderDetail->quantity }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="px-2.5 py-1 text-slate-600 font-medium">
                                            {{ $orderDetail->formatted_unit_price }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 ">
                                        <span class="px-2.5 py-1 text-slate-600 font-medium">
                                            {{ $orderDetail->formatted_total_price }}
                                        </span>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-20 text-center">
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
            <div class="col-span-1 md:col-span-1 pt-6 p-6 bg-blue-50/50 
                        rounded-2xl border border-blue-100 space-y-4">
                    <div class="flex items-center gap-2">
                        
                            <div class="py-1.5 px-2 bg-indigo-100 text-indigo-600 rounded-xl">
                                <i class="fa-solid fa-route"></i>
                            </div>
                            <span class="text-indigo-600 text-lg font-semibold">Cập nhật trạng thái đơn hàng</span>
                        
                        
                            
                        
                    </div>
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                        @php
                            $status = $order->status;
                            $isLocked = in_array($status, ['completed', 'cancelled']);
                        @endphp
                        
                        <div>
                        <input type="radio" name="status" id="status-pending-{{ $order->id }}" value="pending"
                            {{ $status == 'pending' ? 'checked' : '' }}
                            {{ ($status !== 'pending' || $isLocked) ? 'disabled' : '' }}
                            onChange="handleStatusChange(this.value)" class="status-radio"
                            data-order-id="{{ $order->id }}">
                        <label for="status-pending-{{ $order->id }}" class="text-sm {{ $status !== 'pending' ? 'text-gray-400' : 'text-amber-700' }} font-medium">Đang xử lý</label>
                        </div>
                        <div>
                        <input type="radio" name="status" id="status-confirmed-{{ $order->id }}" value="confirmed"
                            {{ $status == 'confirmed' ? 'checked' : '' }}
                            {{ (!in_array($status, ['pending', 'confirmed']) || $isLocked) ? 'disabled' : '' }}
                            onChange="handleStatusChange(this.value)" class="status-radio"
                            data-order-id="{{ $order->id }}">
                        <label for="status-confirmed-{{ $order->id }}" class="text-sm {{ !in_array($status, ['pending', 'confirmed']) ? 'text-gray-400' : 'text-blue-700' }} font-medium">Xác nhận đơn</label>
                        </div>
                        <div>
                        <input type="radio" name="status" id="status-shipping-{{ $order->id }}" value="shipping"
                            {{ $status == 'shipping' ? 'checked' : '' }}
                            {{ (!in_array($status, ['confirmed', 'shipping']) || $isLocked) ? 'disabled' : '' }}
                            onChange="handleStatusChange(this.value)" class="status-radio"
                            data-order-id="{{ $order->id }}">
                        <label for="status-shipping-{{ $order->id }}" class="text-sm {{ !in_array($status, ['confirmed', 'shipping']) ? 'text-gray-400' : 'text-purple-700' }} font-medium">Đang giao hàng</label>
                        </div>
                        <div>
                        <input type="radio" name="status" id="status-completed-{{ $order->id }}" value="completed"
                            {{ $status == 'completed' ? 'checked' : '' }}
                            {{ ($status !== 'shipping' && $status !== 'completed') ? 'disabled' : '' }}
                            onChange="handleStatusChange(this.value)" class="status-radio"
                            data-order-id="{{ $order->id }}">
                        <label for="status-completed-{{ $order->id }}" class="text-sm {{ ($status !== 'shipping' && $status !== 'completed') ? 'text-gray-400' : 'text-emerald-700' }} font-medium">Đã hoàn thành</label>
                        </div>
                        <div>
                        <input type="radio" name="status" id="status-cancelled-{{ $order->id }}" value="cancelled"
                            {{ $status == 'cancelled' ? 'checked' : '' }}
                            {{ $isLocked ? 'disabled' : '' }}
                            onChange="handleStatusChange(this.value)" class="status-radio"
                            data-order-id="{{ $order->id }}">
                        <label for="status-cancelled-{{ $order->id }}" class="text-sm {{ $isLocked ? 'text-gray-400' : 'text-rose-700' }} font-medium">Đã hủy</label>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-1 {{ $order->status == 'cancelled' ? '' : 'hidden' }}" id="reasonCancelContainer-{{ $order->id }}">
                        <div class="bg-rose-50 p-4 rounded-2xl border border-rose-100 space-y-4">  
                            @if($order->status == 'cancelled')
                                
                                    <p class="text-sm font-medium text-red-700 mb-2">Người huỷ đơn: 
                                        <span class="font-medium">{{ $order->updatedByUser->name??'Không xác định' }}
                                            @if($order->updated_by_user_type == 1)
                                                (Admin)
                                            @else
                                                (User)
                                            @endif
                                        </span></p>
                                    <p class="text-sm font-medium text-red-700 mb-2">Thời gian huỷ đơn: <span class="font-medium">{{ $order->formatted_updated_at }}</span></p>
                            @endif
                                <label class="block text-sm font-medium text-red-700 mb-1">Lý do huỷ đơn 
                                    @if($order->status !== 'cancelled')
                                    <span
                                        class="text-xs text-red-400 italic">(Vui lòng ghi lý do huỷ đơn hàng)
                                    </span>
                                    @endif
                                </label>
                                
                                <textarea rows="3" name="reason_cancel" id="reason_cancel-{{ $order->id }}"
                                {{ $order->status == 'cancelled' ? 'readonly' : '' }}
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-300">{{ $order->reason_cancel }}</textarea>
                        </div>
                    </div>  
                </div>
            <div class="bg-white p-4 rounded-2xl border border-gray-200 shadow-sm space-y-3">
                    <div class="flex justify-between text-gray-500 text-sm">
                        <span>Tạm tính:</span>
                        <span id="subtotal-display" class="font-semibold text-gray-800">{{ $order->formatted_sub_total }}</span>
                    </div>
                    <div class="flex justify-between items-center text-gray-500 text-sm">
                        <span>Phí ship:</span>
                        <span id="shipping_fee-display" class="font-semibold text-gray-800">
                            @if($order->shipping_fee == 0)
                                <span class="text-green-500">Miễn phí</span>
                            @else
                                {{ $order->formatted_shipping_fee }}
                            @endif
                        </span>
                    </div>
                    <div class="pt-3 border-t border-dashed flex justify-between items-end">
                        <span class="font-bold text-gray-800">TỔNG CỘNG</span>
                        <span id="total-display" class="text-2xl font-black text-red-600 tracking-tight">{{ $order->formatted_total_amount }}</span>
                    </div>
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase">
            Hủy bỏ
        </button>
        @if($order->status !== 'completed' && $order->status !== 'cancelled')
        <button type="submit" form="orderForm-{{ $order->id }}"
            class="px-4 py-2 bg-blue-600 rounded-md font-semibold text-xs text-white uppercase ml-2">
            Cập nhật
        </button>
        @endif
    </x-slot>

</x-my-modal>

<script>

    document.querySelectorAll('.status-radio').forEach((radio) => {
        radio.addEventListener('change', function () {
            const status = this.value;
            const orderId = this.getAttribute('data-order-id');
            if (status === 'cancelled') {
                document.getElementById('reasonCancelContainer-' + orderId).classList.remove('hidden');
                document.getElementById('reason_cancel-' + orderId).required = true;
                document.getElementById('reason_cancel-' + orderId).focus();
            } else {
                document.getElementById('reasonCancelContainer-' + orderId).classList.add('hidden');
                document.getElementById('reason_cancel-' + orderId).required = false;
            }
        });
    });
</script>