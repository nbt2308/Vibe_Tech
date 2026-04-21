<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4 sm:gap-6">
    @forelse ($products as $product)
        <div
            class="group bg-white rounded-xl border border-slate-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300 flex flex-col h-full relative overflow-hidden">

            <div class="relative aspect-square bg-slate-50 overflow-hidden pt-4">
                <a href="{{ route('products.show', $product->slug) }}" class="block h-full w-full">
                    <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                        class="w-full h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-500 p-4" />
                </a>

                <div class="absolute top-3 left-3 flex flex-col gap-1">
                    <span class="bg-blue-600 text-white text-[10px] font-bold px-2 py-0.5 rounded shadow-sm">Trả góp
                        0%</span>
                </div>

                <div class="absolute top-3 -right-12 group-hover:right-3 transition-all duration-300 flex flex-col gap-2">
                    {{-- Kiểm tra xem ID sản phẩm có nằm trong mảng wishlistIds không --}}
                    @php
                        $isWishlisted = in_array($product->id, $wishlistIds ?? []);
                    @endphp
                
                    <form action="{{ route('wishlist.store', $product->id) }}" method="post">
                        @csrf
                        <button type="submit" title="{{ $isWishlisted ? 'Bỏ yêu thích' : 'Yêu thích' }}"
                            class="w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center transition-all duration-300 transform active:scale-95 {{ $isWishlisted ? 'text-red-500' : 'text-slate-400 hover:text-red-500' }}">

                            {{-- Nếu đã thích: fa-solid (tim đặc), chưa thích: fa-regular (tim rỗng) --}}
                            <i class="{{ $isWishlisted ? 'fa-solid fa-heart' : 'fa-regular fa-heart' }} text-lg"></i>

                        </button>
                    </form>
                </div>
            </div>

            <div class="p-4 flex flex-col flex-grow">
                <div class="mb-auto">
                    <span
                        class="text-[10px] font-bold text-blue-500 uppercase tracking-wider">{{ $product->brand->name }}</span>

                    <a href="{{ route('products.show', $product->slug) }}" class="block mt-1">
                        <h3
                            class="text-sm font-bold text-slate-800 line-clamp-2 min-h-[40px] group-hover:text-blue-600 transition-colors">
                            {{ $product->name }}
                        </h3>
                    </a>
                </div>

                <div class="mt-4">
                    <div class="flex flex-col">
                        @if($product->sale_price > 0)
                            <div class="flex items-center justify-between gap-2 mt-1">
                                <span class="text-xs text-slate-400 line-through">{{ $product->formatted_price }}</span>
                                <span
                                    class="bg-red-600 px-2 py-1 text-xs font-medium text-white rounded">-{{ $product->formatted_sale_percent }}</span>
                            </div>
                            <span class="text-lg font-black text-blue-600 leading-none">
                                {{ $product->formatted_sale_price }}
                            </span>

                        @else
                            <span class="text-lg font-black text-blue-600 leading-none">
                                {{ $product->formatted_price }}
                            </span>
                        @endif
                    </div>
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
    @empty
        <div class="col-span-full text-center py-12">
            <p class="text-slate-500 text-xl">Không tìm thấy sản phẩm nào phù hợp.</p>
        </div>
    @endforelse
</div>