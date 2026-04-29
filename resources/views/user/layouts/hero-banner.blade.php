<div class="container mx-auto">
    <div class="text-center mb-8">
        <div class="flex items-center justify-center gap-2">
            <span class="text-2xl font-bold">Sản phẩm mới</span>
        </div>
    </div>
    <div class="relative group/swiper px-4 md:px-0">
        <div class="swiper productSwiper !pb-12 !pt-4">
            <div class="swiper-wrapper">
                @foreach($list_products as $product)
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white flex flex-col h-full rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">

                            <!-- Hình ảnh -->
                            <div class="relative overflow-hidden aspect-[4/5]">
                                <a href="{{ route('products.show', $product->slug) }}" class="block w-full h-full">
                                    <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                                        class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-700 ease-out" />
                                </a>


                                <div class="absolute top-3 left-3">
                                    <span
                                        class="bg-blue-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-lg uppercase tracking-wider">
                                        New
                                    </span>
                                </div>

                                <!-- nút yêu thích -->
                                <div
                                    class="absolute top-3 -right-12 group-hover:right-3 transition-all duration-300 flex flex-col gap-2">
                                    <!-- kiểm tra xem ID sản phẩm có nằm trong mảng wishlistIds không -->
                                    @php
                                        $isWishlisted = in_array($product->id, $wishlistIds ?? []);
                                    @endphp

                                    <form action="{{ route('wishlist.store', $product->id) }}" method="post">
                                        @csrf
                                        <button type="submit" title="{{ $isWishlisted ? 'Bỏ yêu thích' : 'Yêu thích' }}"
                                            class="w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center transition-all duration-300 transform active:scale-95 {{ $isWishlisted ? 'text-red-500' : 'text-slate-400 hover:text-red-500' }}">

                                            
                                            <i class="{{ $isWishlisted ? 'fa-solid fa-heart' : 'fa-regular fa-heart' }} text-lg"></i>

                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- card -->
                            <div class="p-5 flex flex-col flex-grow bg-white">
                                <a href="{{ route('products.show', $product->slug) }}" class="block flex-grow">
                                    <h3
                                        class="text-sm font-semibold text-slate-800 line-clamp-2 min-h-[40px] group-hover:text-blue-600 transition-colors">
                                        {{ $product->name }}
                                    </h3>


                                    <div class="mt-3 flex items-center justify-between">
                                        <span class="text-lg font-bold text-slate-900">
                                            {{ $product->sale_price > 0 ? number_format($product->sale_price) : number_format($product->price) }}đ
                                        </span>
                                        <div class="flex items-center gap-1 text-orange-400 text-[10px]">
                                            <i class="fa-solid fa-star"></i>
                                            <span class="text-slate-400 font-medium">{{ $product->averageRating }}</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- thêm vào giỏ -->
                                <div
                                    class="mt-4 pt-4 border-t border-slate-50 opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                                    <form action="{{ route('cart.store', $product->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit"
                                            class="w-full mt-4 bg-slate-50 group-hover:bg-blue-600 text-slate-600 group-hover:text-white py-2 rounded-lg text-sm font-bold transition-all duration-300 flex items-center justify-center gap-2">
                                            <i class="fa-solid fa-cart-shopping text-xs"></i>
                                            Thêm giỏ hàng
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>



        </div>


        <div
            class="swiper-button-next product-next !w-12 !h-12 !bg-red/90 backdrop-blur-sm !rounded-full !shadow-xl !text-blue-600 after:!text-base after:!font-bold transition-all -right-6 opacity-0 group-hover/swiper:opacity-100 group-hover/swiper:right-2 border border-slate-100">
            <i class="fa-solid fa-chevron-right"></i>
        </div>
        <div
            class="swiper-button-prev product-prev !w-12 !h-12 !bg-red/90 backdrop-blur-sm !rounded-full !shadow-xl !text-blue-600 after:!text-base after:!font-bold transition-all -left-6 opacity-0 group-hover/swiper:opacity-100 group-hover/swiper:left-2 border border-slate-100">
            <i class="fa-solid fa-chevron-left"></i>
        </div>
    </div>
</div>