@props(['action', 'placeholder' => 'Tìm kiếm...', 'value' => ''])
<form action="{{ $action }}" method="GET" id="search-form" class="relative">
    @foreach(request()->except('search', 'page') as $key => $val)
        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
    @endforeach

    <div class="relative group">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <input type="text" 
               name="search" 
               value="{{ $value }}"
               placeholder="{{ $placeholder }}"
               oninput="debounceSubmit()"
               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out"
               autocomplete="off">
    </div>
</form>
<script>
    let searchTimer;
    function debounceSubmit() {
        clearTimeout(searchTimer);
        // Đợi 500ms sau khi ngừng gõ mới tự động submit form
        searchTimer = setTimeout(() => {
            document.getElementById('search-form').submit();
        }, 500);
    }
</script>