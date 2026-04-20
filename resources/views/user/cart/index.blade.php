@extends('user.layouts.app')

@section('title', 'Giỏ hàng')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="lg:max-w-full max-lg:max-w-2xl mx-auto">
            <div class="grid lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white p-6 rounded-xl ">
                    <h3 class="text-xl font-bold text-slate-900">Giỏ hàng của bạn</h3>
                    <hr class="border-gray-300 mt-4 mb-8" />

                    <div class="sm:space-y-6 space-y-8">
                        @forelse($items as $item)
                            @php
                                $price = $item->product->sale_price > 0 ? $item->product->sale_price : $item->product->price;
                            @endphp

                            <div
                                class="group grid grid-cols-12 items-center p-5 gap-4 border border-slate-100 rounded-2xl shadow-sm bg-white mb-4 hover:shadow-md transition-all">
                                {{-- Thông tin sản phẩm --}}
                                <div class="col-span-12 sm:col-span-6 flex items-center gap-4">
                                    <div class="w-20 h-20 shrink-0 bg-slate-50 p-2 rounded-xl border">
                                        <img src="{{ asset('storage/' . $item->product->thumbnail) }}"
                                            class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500" />
                                    </div>
                                    <div>
                                        <!-- lưu vào data-price để js hiểu là số chứ không phải string -->
                                        <a href="{{ route('products.show', $item->product->slug) }}"
                                            class="text-base font-bold text-slate-800">{{ $item->product->name }}</a>
                                        <p class="text-xs text-slate-400 font-medium">
                                            Đơn giá: <span class="item-price"
                                                data-price="{{ $price }}">{{ number_format($price, 0, ',', '.') }}đ</span>
                                        </p>
                                        <a href="{{ route('cart.delete', $item->id) }}"
                                            class="text-xs font-bold text-rose-500 hover:text-rose-600 transition-colors mt-1 w-fit flex items-center gap-1">

                                            <i class="fas fa-trash-alt"></i> Xóa

                                        </a>
                                    </div>
                                </div>


                                <div class="col-span-6 sm:col-span-3 flex justify-center">
                                    <form action="{{ route('cart.changeQuantity', $item->id) }}" method="post"
                                        class="flex items-center bg-slate-50 border rounded-xl p-1">
                                        @csrf
                                        @method('put')
                                        <button type="submit" name="action" value="decrease"
                                            class="w-8 h-8 flex items-center justify-center bg-white border rounded-lg hover:bg-rose-50">-</button>

                                        <input type="text" id="item-quantity" value="{{ $item->quantity }}" name="quantity"
                                            onblur="submitFormWithoutAction(this)"
                                            onkeypress=" if(event.keycode==13) {event.preventDefault(); submitFormWithoutAction(this)}"
                                            oninput="checkLimit(this)"
                                            class="item-quantity w-12 text-center bg-transparent border-none font-bold text-slate-700 text-sm">
                                        <button type="submit" name="action" value="increase"
                                            class="w-8 h-8 flex items-center justify-center bg-white border rounded-lg hover:bg-emerald-50">+</button>
                                    </form>
                                </div>


                                <div class="col-span-6 sm:col-span-3 text-right">
                                    <p class="text-xs text-slate-400 font-bold uppercase mb-1">Thành tiền</p>
                                    <h4 class="text-lg font-black text-indigo-600 row-total">
                                        {{ number_format($price * $item->quantity, 0, ',', '.') }}đ
                                    </h4>
                                </div>
                            </div>
                        @empty
                            <span class="text-center text-slate-500 flex flex-col">
                                <i class="fas fa-shopping-cart text-4xl"></i>
                                Không có sản phẩm nào trong giỏ hàng của bạn
                            </span>
                        @endforelse
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 md:sticky top-0 h-full">
                    <h3 class="text-xl font-bold text-slate-900">Chi tiết đơn hàng</h3>
                    <hr class="border-gray-300 mt-4 mb-8" />
                    <ul class="text-slate-500 font-medium mt-8 space-y-4">

                        <li class="flex flex-wrap gap-4 text-sm">Phí ship<span
                                class="ml-auto text-slate-900 font-semibold shipping-fee"></span></li>
                        <li class="flex flex-wrap gap-4 text-sm text-slate-900">Tạm tính
                            <span class="ml-auto font-semibold" id="sub-total">0đ</span>
                        </li>
                    </ul>
                    <div class="mt-8 space-y-3 flex flex-col">
                        @if ($items->count() > 0)
                            <a href="{{ route('payment') }}"
                                class="text-sm px-4 py-2.5 w-full flex items-center justify-center font-medium tracking-wide bg-blue-600 hover:bg-blue-700 text-white rounded-md cursor-pointer transition-all duration-500 active:scale-105">Tiến
                                hành thanh toán</a>
                        @endif
                        <a href="{{ route('home') }}"
                            class="text-sm px-4 py-2.5 w-full flex items-center justify-center font-medium tracking-wide bg-transparent text-slate-900 border border-gray-300 rounded-md cursor-pointer transition-all duration-500 active:scale-105">
                            <i class="fas fa-arrow-left mr-2"></i> Tiếp tục mua hàng
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
<script>
    window.document.addEventListener('DOMContentLoaded', function () {
        calculateAllRowTotals();

        calculateGrandTotal();

    });
    //tính thành tiền từng món
    function calculateAllRowTotals() {
        // lặp qua tất cả các sản phẩm
        const rows = document.querySelectorAll('.group');

        rows.forEach(row => {
            const priceElement = row.querySelector('.item-price');
            const quantityElement = row.querySelector('.item-quantity');
            const totalElement = row.querySelector('.row-total');

            if (priceElement && quantityElement && totalElement) {
                const price = parseInt(priceElement.getAttribute('data-price'));
                const quantity = parseInt(quantityElement.value);

                const total = price * quantity;

                // hiển thị lại thành tiền cho dòng đó
                totalElement.innerText = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
            }
        });
    }
    // tính tổng tiền tạm tính
    function calculateGrandTotal() {
        let subtotal = 0;
        const rows = document.querySelectorAll('.row-total');
        let shippingFee = document.querySelector('.shipping-fee');
        rows.forEach(row => {
            let val = parseInt(row.innerText.replace(/\D/g, ''));

            subtotal += val;
        });
        let shippingVal = 0;
        if (rows.length > 0) {
            if (subtotal > 500000) {
                shippingFee.innerText = "Miễn phí";
                shippingFee.classList.add('text-green-500');
                shippingVal = 0;
            } else {
                shippingFee.innerText = new Intl.NumberFormat('vi-VN').format(30000) + 'đ';
                shippingVal = 30000;
            }
        }
        else {
            shippingFee.innerText = 0 + "đ";
            shippingVal = 0;
        }
        let totalElement = document.querySelector('#sub-total');
        if (totalElement) {
            let total = subtotal + shippingVal;
            totalElement.innerText = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
        }
    }

    function checkQuantity() {
        let result = document.getElementById('item-quantity');
        let quantity = result.value;
        if (quantity < 1) quantity = 1;
        result.value = quantity;

    }
    function checkLimit(input) {
        if (input.value > 999) {
            input.value = 999;
        }
        if (input.value.length > 1 && input.value[0] === '0') {
            input.value = input.value.slice(1);
        }
    }

    function submitFormWithoutAction(input) {
        //tìm ba nó là form
        const form = input.closest('form');
        // tìm tất cả các button có tên là 'action' và disable chúng trước khi submit
        form.querySelectorAll('button[name="action"]').forEach(btn => btn.disabled = true);
        form.submit();
    }
</script>