@props(['items' => []])

<div class="bg-white hidden md:block border-b border-gray-100 shadow-lg">
    <div class="container mx-auto px-4">  
        <ul class="flex items-center justify-start space-x-4 py-4">
            <li class="text-blue-500 font-medium text-base">
                <a href="{{ route('home') }}" class="">Trang chủ</a>
            </li>

            @foreach($items as $item)
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-slate-500 w-3 -rotate-90" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z" clip-rule="evenodd"></path>
                    </svg>
                </li>
                <li class="font-medium text-base {{ $loop->last ? 'text-slate-400 cursor-default' : 'text-slate-600' }}">
                    @if(!$loop->last && isset($item['url']))
                        <a href="{{ $item['url'] }}" class="hover:text-blue-500">{{ $item['label'] }}</a>
                    @else
                        {{ $item['label'] }}
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>