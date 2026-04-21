@extends('user.layouts.app')

@section('title', $product->name)

@section('content')

    <div class="">
        <div class="p-4 lg:max-w-7xl max-w-4xl mx-auto">
            <div
                class="bg-white grid items-start grid-cols-1 lg:grid-cols-5 gap-12 shadow-[0_2px_10px_-3px_rgba(169,170,172,0.8)] p-6 rounded-xl">
                <div class="lg:col-span-3 w-full lg:sticky top-0 text-center">

                    <div class="p-6 md:p-10 border-r border-gray-50 relative">
                        <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100 mb-4 border border-gray-100">
                            <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover" id="main-img" />
                        </div>
                        <div class="absolute top-2 -right-5 group-hover:right-3 transition-all duration-300 flex flex-col gap-2">
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

                    <div class="mt-4 flex flex-wrap justify-center gap-4 mx-auto">
                        @forelse ($product->productImages as $product_image)
                            <div
                                class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded-lg p-2 shadow-md cursor-pointer">
                                <img src="{{ asset('storage/' . $product_image->image_path) }}" alt="{{ $product->name }}"
                                    class="thumb w-full h-full object-contain" onclick="changeImage(this)" />
                            </div>
                        @empty
                            <div
                                class="w-20 h-16 sm:w-24 sm:h-20 flex items-center justify-center rounded-lg p-2 shadow-md cursor-pointer">
                                <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover" />
                            </div>
                        @endforelse
                    </div>
                </div>
                
                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-semibold text-slate-900">{{ $product->name }}</h2>
                    <p class="text-sm text-slate-500 mt-2"><span class="font-bold">Mã sản phẩm:</span> {{ $product->sku }}
                    </p>
                    <div class="flex items-center space-x-1 mt-2">
                        <p class="text-sm text-slate-500 mt-1"><span class="font-bold">Thương hiệu:</span>
                            {{ $product->brand->name }}</p>
                        <p class="text-sm text-slate-500 mt-1">|</p>
                        <p class="text-sm text-slate-500 mt-1"><span class="font-bold">Tình trạng:</span>
                            {{ $product->formatted_status }}</p>
                    </div>
                    <div class="flex items-center space-x-0.5 text-yellow-500 mt-3">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= floor($product->averageRating))
                                <i class="fas fa-star"></i>
                            @elseif ($i == ceil($product->averageRating) && ($product->averageRating - floor($product->averageRating) >= 0.5))
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star text-gray-300"></i>
                            @endif
                        @endfor
                        <span class="ml-3 text-blue-600 font-bold">({{ $comments->count() }} đánh giá)</span>
                        
                    </div>
                    <hr class="border border-gray-200 my-4">
                    <div class="flex flex-wrap gap-4">
                        <div class="mb-8 ">
                            @if($product->sale_price > 0)
                                <span class="text-xl lg:text-3xl font-black text-blue-600 leading-none">
                                    {{ $product->formatted_sale_price }}
                                </span>
                                <div class="flex items-center gap-2 mt-1">
                                    <span
                                        class="text-md lg:text-lg text-slate-400 line-through">{{ $product->formatted_price }}</span>
                                    <span class="text-md lg:text-md font-bold text-red-500 rounded-lg bg-red-100 px-2 py-1">
                                        -{{ $product->formatted_sale_percent }}
                                    </span>
                                </div>
                            @else
                                <span class="text-xl lg:text-3xl font-black text-blue-600 leading-none">
                                    {{ $product->formatted_price }}
                                </span>
                            @endif
                        </div>
                    </div>

                    
                        <form action="{{ route('cart.store', $product->id) }}" method="POST">
                    @csrf
                        <div class="flex items-center gap-4 mt-6">
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <button class="px-3 py-2 hover:bg-gray-100 transition-colors" onclick="changeQuantity(-1)" type="button">
                                    <i class="fas fa-minus text-gray-600"></i>
                                </button>
                                <input type="text" id="quantity" value="1" name="quantity" 
                                onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                onchange="checkQuantity()"
                                oninput="checkLimit(this)"
                                class="w-16 text-center border-none outline-none font-medium text-lg">
                                <button class="px-3 py-2 hover:bg-gray-100 transition-colors" onclick="changeQuantity(1)" type="button">
                                    <i class="fas fa-plus text-gray-600"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex gap-4 mt-4 max-w-md">
                            
                            <button type="submit"
                                class="w-full px-4 py-2.5 cursor-pointer outline-none 
                                border border-blue-600 bg-transparent hover:bg-blue-600 text-blue-600 hover:text-white text-sm font-medium rounded-lg transition-all duration-500 active:scale-105">
                                <i class="fas fa-cart-plus mr-2"></i>Thêm vào giỏ hàng
                            </button>
                            
                        </div>
                     </form>
                </div>
               
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="bg-white lg:col-span-2 mt-12 shadow-md p-6 rounded-2xl h-fit">
                    <h3 class="text-2xl font-bold text-slate-900">Mô tả chi tiết</h3>
                    <div class="description-wrapper relative mt-4">
                        <div id="desc-content" class="overflow-hidden max-h-[250px] transition-all duration-500">
                            {!! $product->description !!}
                        </div>
                        <div class="text-center mt-2">
                            <button id="btn-toggle" class="text-white font-bold px-4 py-2 bg-blue-600 rounded-full">Xem
                                thêm</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white mt-12 shadow-md p-6 rounded-2xl h-fit">
                    <h3 class="text-2xl font-bold text-slate-900">Thông số kỹ thuật</h3>
                    <table class="w-full mt-4">
                        @if($product->attributes && is_array($product->attributes))
                            @foreach($product->attributes as $key => $value)
                                <tr class="flex py-3 border-b border-gray-50 last:border-0 hover:bg-gray-50 transition px-2">
                                    <td class="font-semibold w-[30%]">{{ $attributeLabels[$key] }}</td>
                                    <td class="w-[70%]">{{ $value }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center">Đang cập nhật...</td>
                            </tr>
                        @endif
                    </table>
                </div>

            </div>

            <div class="bg-white mt-12 shadow-md p-6 rounded-2xl">
                <div class="p-6">
                    <div class="max-w-6xl mx-auto">
                        <div>
                            <h3 class="text-2xl font-bold text-slate-900 !leading-tight">Bình luận và đánh giá</h3>
                        </div>

                        <div class="flex lg:items-center sm:justify-between max-lg:flex-col gap-x-6 gap-y-8 mt-8">
                            <div class="w-full lg:text-center flex flex-col items-center p-8 bg-white rounded-2xl shadow-lg">
                                 
                                <h3 class="text-slate-900 text-xl font-semibold text-center">Tổng số lượt đánh giá</h3>
                                <h3 class="text-blue-600 text-xl mt-3 font-semibold">{{ $comments->total() }}</h3>
                            </div>
                            <div class="w-full lg:text-center flex flex-col items-center p-8 bg-white rounded-2xl shadow-lg">
                                <h3 class="text-slate-900 text-xl font-semibold text-center">Đánh giá trung bình</h3>
                                <div class="flex items-center lg:justify-center space-x-0.5 text-yellow-500 mt-3">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($product->averageRating))
                                            <i class="fas fa-star"></i>
                                        @elseif ($i == ceil($product->averageRating) && ($product->averageRating - floor($product->averageRating) >= 0.5))
                                            <i class="fas fa-star-half-alt"></i>
                                        @else
                                            <i class="far fa-star text-gray-300"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="mt-2 text-blue-600 font-bold">{{ $product->averageRating }} / 5</span>
                            </div>
                        </div>
                        <div class="mt-12">

                            <form class="bg-white sm:p-8 p-4 rounded-2xl shadow-xl"
                                action="{{ route('comment.store', $product->id) }}" method="POST">
                                @csrf
                                <h3 class="text-slate-900 text-xl font-semibold mb-6">Để lại ý kiến của bạn</h3>
                                <div class="flex justify-center ">
                                    <div
                                        class="flex flex-col items-center p-8 bg-white rounded-2xl shadow-lg w-full sm:w-80">
                                        <div class="flex flex-row-reverse gap-1">
                                            <input type="radio" id="star5" name="comment_rating" value="5"
                                                class="hidden peer" />
                                            <label for="star5"
                                                class="text-2xl sm:text-4xl cursor-pointer text-gray-300 peer-hover:text-amber-400 peer-checked:text-amber-400 transition-colors">★</label>

                                            <input type="radio" id="star4" name="comment_rating" value="4"
                                                class="hidden peer" />
                                            <label for="star4"
                                                class="text-2xl sm:text-4xl cursor-pointer text-gray-300 peer-hover:text-amber-400 peer-checked:text-amber-400 peer-checked:peer-hover:text-amber-400 peer-hover:next-all:text-amber-400 transition-colors">★</label>

                                            <input type="radio" id="star3" name="comment_rating" value="3"
                                                class="hidden peer" />
                                            <label for="star3"
                                                class="text-2xl sm:text-4xl cursor-pointer text-gray-300 peer-hover:text-amber-400 peer-checked:text-amber-400 transition-colors">★</label>

                                            <input type="radio" id="star2" name="comment_rating" value="2"
                                                class="hidden peer" />
                                            <label for="star2"
                                                class="text-2xl sm:text-4xl cursor-pointer text-gray-300 peer-hover:text-amber-400 peer-checked:text-amber-400 transition-colors">★</label>

                                            <input type="radio" id="star1" name="comment_rating" value="1"
                                                class="hidden peer" />
                                            <label for="star1"
                                                class="text-2xl sm:text-4xl cursor-pointer text-gray-300 peer-hover:text-amber-400 peer-checked:text-amber-400 transition-colors">★</label>
                                        </div>

                                        <p id="rating-display" class="mt-4 font-medium text-center text-gray-500">Chạm để
                                            đánh giá</p>
                                    </div>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-6 mt-6">
                                    <div class="col-span-full">
                                        <label class="mb-2 text-sm text-slate-900 font-medium block">Đánh giá của
                                            bạn</label>
                                        <div>
                                            <textarea placeholder="Viết cảm nhận của bạn về sản phẩm" rows="4"
                                                name="comment_content"
                                                class="px-4 py-3 pr-8 bg-white w-full text-sm border border-gray-300 focus:border-blue-500 outline-0 transition-all rounded-md"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="mt-8 px-6 py-3 text-[15px] font-medium bg-blue-700 hover:bg-blue-600 text-white rounded-md transition-all cursor-pointer">
                                    Gửi đánh giá
                                </button>
                            </form>

                            @forelse($comments as $comment)
                                <div class="space-y-8 mt-12">
                                    <div class="sm:p-8 p-6 bg-gray-100 rounded-xl">
                                        <div class="flex items-start flex-col justify-center sm:flex-row sm:justify-between sm:flex-wrap gap-4">
                                            <div class="flex items-center gap-4">
                                                <div class="shrink-0 py-2 px-3 bg-blue-100 rounded-2xl">
                                                    <i class="fa-regular fa-user text-xl text-blue-600"></i>
                                                </div>
                                                <div>
                                                    <p class="text-[15px] text-slate-900 font-semibold">
                                                        {{ $comment->user->name }}</p>
                                                </div>
                                            </div>
                                            <div class="w-full sm:w-auto text-center sm:text-start">
                                                @if($comment->user_id == Auth::id())
                                                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-slate-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="flex items-center mt-2">
                                                <div class="flex items-center space-x-0.5">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fas fa-star text-sm {{ $i <= $comment->comment_rating ? 'text-amber-400' : 'text-gray-300' }}"></i>
                                                    @endfor
                                                </div>
                                                
                                                <p class="text-slate-400 text-xs ml-3 font-medium">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                            <div class="mt-4">
                                                <p class="text-slate-600 text-[15px] leading-relaxed">
                                                    {{ $comment->comment_content }}</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @empty
                                <div class="space-y-8 mt-12">
                                    <p class="text-center text-slate-600 text-[15px] leading-relaxed">Hiện tại sản phẩm chưa có đánh giá nào, bạn hãy trở thành người đầu tiên đánh giá cho sản phẩm này nhé</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="mt-12">
                            {{ $comments->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function changeImage(element) {
        var newSrc = element.src;


        document.getElementById('main-img').src = newSrc;


        let thumbnails = document.querySelectorAll('.thumb');
        thumbnails.forEach(img => img.classList.remove('border-blue-500'));
        thumbnails.forEach(img => img.classList.add('border-transparent'));

        element.classList.add('border-blue-500');
        element.classList.remove('border-transparent');
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const content = document.getElementById('desc-content');
        const btn = document.getElementById('btn-toggle');


        if (content.scrollHeight <= 250) {
            btn.style.display = 'none';
        }

        btn.addEventListener('click', function () {
            if (content.style.maxHeight === '250px' || content.style.maxHeight === '') {
                content.style.maxHeight = content.scrollHeight + 'px';
                btn.innerText = 'Thu gọn';

            } else {
                content.style.maxHeight = '250px';
                btn.innerText = 'Xem thêm';
            }
        });
    });
</script>

<script>
    function changeQuantity(sl) {
        let result = document.getElementById('quantity');
        let quantity = result.value;
        if (!isNaN(quantity)) {
            quantity = parseInt(quantity) + sl;
            if (quantity < 1) quantity = 1;
            result.value = quantity;
        }
    }
    function checkQuantity(){
        let result = document.getElementById('quantity');
        let quantity = result.value;
        if (quantity < 1) quantity = 1;
        result.value = quantity;
        
    }
    function checkLimit(input){
        if (input.value > 999) {
            input.value = 999;
        }
        if (input.value.length > 1 && input.value[0] === '0') {
            input.value = input.value.slice(1);
        }
    }
</script>