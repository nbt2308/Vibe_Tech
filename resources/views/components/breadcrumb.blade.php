@props([
    'title',
    'slug'
])
<div class="bg-white hidden md:block mb-5">
    <div class="container mx-auto px-4">  
            <ul class="flex items-center justify-start space-x-4 py-4">
                    <li class="text-blue-500 font-medium text-base cursor-pointer">
                        <a href="{{ route('home') }}">Trang chủ</a>
                </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-slate-500 w-3 -rotate-90" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                                clip-rule="evenodd" data-original="#000000"></path>
                        </svg>
                    </li>
                    <li class="text-slate-500 font-medium text-base cursor-pointer">
                    {{ $title }}
                </li>
        </ul>
    </div>
</div>