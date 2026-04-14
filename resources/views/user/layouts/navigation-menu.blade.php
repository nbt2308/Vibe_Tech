<!-- Navigation Menu -->
<div class="bg-gray-800 hidden md:block">
    <div class="container mx-auto px-4">
        <ul class="flex space-x-8 text-sm font-medium text-white">

            <li>
                <a href="/"
                    class="block py-3 border-b-2 transition {{ request()->is('/') ? 'border-blue-400 text-blue-400' : 'border-transparent text-white hover:text-blue-400 hover:border-blue-400' }}">
                    <i class="fas fa-home mr-2"></i>Trang chủ
                </a>
            </li>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category->slug) }}"
                        class="block py-3 border-b-2 transition {{ request()->routeIs('categories.show') && request()->route('slug') === $category->slug ? 'border-blue-400 text-blue-400' : 'border-transparent text-white hover:text-blue-400 hover:border-blue-400' }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>