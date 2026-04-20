@extends('user.layouts.app')

@section('title', 'Thanh toán')

@section('content')

    <main class="container mx-auto px-4 py-8">
        <h1 class="sr-only">Thanh toán</h1>
        <div class="flex flex-col h-full md:flex-row gap-6">
            <!-- sidebar -->
            <section class="md:h-screen md:sticky md:top-0 md:min-w-[370px] lg:min-w-[420px]">
                <div class="relative h-fit">
                    <div class="px-6 py-8 md:overflow-auto md:h-fit  bg-white shadow-md rounded-2xl">
                        <!-- Product List -->
                        <ul class="space-y-6">
                            @forelse ($items as $item)
                                <li class="flex items-start gap-4">
                                    <div class="w-24 h-24 flex p-3 shrink-0 bg-white rounded-md">
                                        <img src='{{ asset('storage/' . $item->product->thumbnail) }}'
                                            class="w-full object-contain" alt="black sweater" />
                                    </div>
                                <div class="w-full">
                                    <h3 class="text-sm text-slate-900 font-semibold">{{ $item->product->name }}</h3>
                                    <ul class="text-sm text-slate-500 font-medium space-y-2 mt-2">
                                        <li class="flex flex-wrap gap-4">Số lượng <span class="ml-auto">x {{ $item->quantity }}</span></li>
                                        <li class="flex flex-wrap gap-4">Tổng tiền <span
                                                class="ml-auto text-slate-900 font-semibold row-total">{{ number_format(($item->product->sale_price > 0 ? $item->product->sale_price : $item->product->price) * $item->quantity, 0, ',', '.') }}đ</span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @empty
                                <li class="text-center text-slate-500">Không có sản phẩm trong giỏ hàng</li>
                            @endforelse
                        </ul>

                        <hr class="border-slate-300 my-6" />

                        

                        <div>
                            <ul class="text-slate-500 font-medium space-y-4">
                                <li class="flex flex-wrap gap-4 text-sm">Tạm tính <span
                                        class="ml-auto text-slate-900 font-semibold sub-total">0đ</span>
                                </li>
                                <li class="flex flex-wrap gap-4 text-sm">Phí ship <span
                                        class="ml-auto text-slate-900 font-semibold shipping-fee">0đ</span>
                                </li>
                                <hr class="border-slate-300" />
                                <li class="flex flex-wrap gap-4 text-sm font-semibold text-slate-900">
                                    Tổng tiền <span class="ml-auto total-price">0đ</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!--  form Thông tin mua hàng -->
            <section class="w-full h-max rounded-md py-8 px-8 xl:px-12 bg-white shadow-md rounded-2xl" >
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    <fieldset>
                        <legend class="text-xl text-slate-900 font-semibold mb-6">Thông tin mua hàng <span class="text-xs text-red-500 italic">(Bạn có thể thay đổi họ tên, số điện thoại, địa chỉ giao hàng nếu muốn)</span>
                        </legend>
                        <div class="grid lg:grid-cols-2 gap-6">
                            <div class="col-span-2 lg:col-span-1">
                                <label for="name" class="mb-2 text-slate-900 font-medium text-sm inline-block">
                                    Họ và tên
                                </label>
                                <input type="text" id="name" name="customer_name" placeholder="Nguyễn Văn A" required value="{{ Auth::user()->name }}"
                                    class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <label for="phone" class="mb-2 text-slate-900 font-medium text-sm inline-block">
                                    Số điện thoại
                                </label>
                                <input type="text" id="phone" name="customer_phone" placeholder="0123...." required value="{{ Auth::user()->phone }}"
                                    class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <label for="email"
                                    class="mb-2 text-slate-900 font-medium text-sm inline-block">Email</label>
                                <input type="email" id="email" name="customer_email" placeholder="example@gmail.com" readonly value="{{ Auth::user()->email }}"
                                    class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                            </div>
                            <div class="col-span-2 lg:col-span-1">
                                <label for="address" class="mb-2 text-slate-900 font-medium text-sm inline-block">Địa chỉ </label>
                                <input type="text" id="address" name="customer_address" placeholder="Địa chỉ" required value="{{ old('address', auth()->user()->address) }}"
                                    class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" />
                            </div>
                            <div class="col col-span-2">
                                <label for="note" class="mb-2 text-slate-900 font-medium text-sm inline-block">Ghi chú</label>
                                <textarea id="note" name="note" placeholder="Nhập ghi chú nếu có"
                                    class="px-3 py-2.5 text-sm text-slate-900 rounded-md bg-white w-full outline-1 -outline-offset-1 outline-slate-300 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600" 
                                    rows="4"></textarea>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Payment methods -->
                    <fieldset class="mt-5">
                        <legend class="text-xl text-slate-900 font-semibold mb-6">Phương thức thanh toán</legend>
                        <input type="radio" name="payment_method" id="payment_method" required value="cod">
                        <label for="payment_method">Thanh toán khi nhận hàng (COD)</label>
                    </fieldset>
                    

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full px-3.5 py-2 text-white text-sm font-semibold rounded-md cursor-pointer bg-blue-600 hover:bg-blue-700 border border-blue-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                            Đặt hàng
                        </button>
                    </div>

                </form>
            </section>
        </div>
    </main>
@endsection

<script>
    window.document.addEventListener('DOMContentLoaded', function () {
        calculateSubTotal();

    });
    function calculateSubTotal() {
        let subtotal = 0;
        const rows = document.querySelectorAll('.row-total');
        let shippingFee = document.querySelector('.shipping-fee');
        rows.forEach(row => {
            let val = parseInt(row.innerText.replace(/\D/g, ''));

            subtotal += val;
        });
        let subtotalElement = document.querySelector('.sub-total');
        if (subtotalElement) {
            subtotalElement.innerText = new Intl.NumberFormat('vi-VN').format(subtotal) + 'đ';
        }
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
        let totalElement = document.querySelector('.total-price');
        if (totalElement) {
            let total = subtotal + shippingVal;
            totalElement.innerText = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
        }
    }
</script>
