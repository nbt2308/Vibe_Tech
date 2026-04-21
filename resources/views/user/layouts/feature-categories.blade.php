<!-- Featured Categories -->
<section class="container mx-auto mb-12">
    <h2 class="text-center text-2xl font-bold mb-6 border-b pb-2">Danh Mục Nổi Bật</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @forelse($featured_categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}"
                class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition duration-300 group border border-gray-100 flex flex-col items-center">
                <div class="w-24 h-24 mb-4 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="{{ $category->name }}"
                        class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">{{ $category->name }}
                </h3>
            </a>
        @empty
            <a href="#"
                class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition duration-300 group border border-gray-100 flex flex-col items-center">
                <div class="w-24 h-24 mb-4 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('assets/image/categories/unnamed.png') }}" alt="Không có dữ liệu"
                        class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">Không có dữ liệu</h3>
            </a>
        @endforelse
    </div>
</section>