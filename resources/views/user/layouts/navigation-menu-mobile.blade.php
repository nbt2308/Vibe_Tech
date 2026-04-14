<div class="flex-1 overflow-y-auto py-2">
    <p class="px-4 py-2 text-xs font-bold text-gray-400 uppercase tracking-wider">Danh mục sản phẩm</p>
    <ul class="text-gray-700">
        <li><a href="/"
                class="block px-4 py-3 border-b border-gray-100 hover:bg-blue-50 hover:text-blue-600 font-medium"> Trang chủ</a></li>
        @foreach ($categories as $category)
            <li><a href="{{ route('categories.show', $category->slug) }}"
                    class="block px-4 py-3 border-b border-gray-100 hover:bg-blue-50 hover:text-blue-600 font-medium"> {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>