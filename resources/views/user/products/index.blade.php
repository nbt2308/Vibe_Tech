@forelse($featured_categories as $category)
    <div class="bg-white my-8 py-4 px-4 mx-auto container rounded-xl">
        <div class="flex items-end justify-between mb-8 border-b-2 border-slate-100 pb-4">
            <div class="flex items-center gap-3">
                <div class="w-2 h-8 bg-blue-600 rounded-full"></div>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-800 tracking-tight uppercase">{{ $category->name }}
                </h2>
            </div>
            <a href="{{ route('categories.show', $category->slug) }}"
                class="group text-blue-600 hover:text-blue-700 font-bold text-sm flex items-center gap-1 transition-all">
                Xem tất cả
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </a>
        </div>

        @include('user.components.list-product', ['products' => $category->products])
    </div>
@empty
    <div class="bg-white py-10 px-4 mx-auto container">
        <p class="text-center text-gray-500">Không có sản phẩm</p>
    </div>
@endforelse