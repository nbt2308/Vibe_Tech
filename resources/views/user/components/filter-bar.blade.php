<div class="bg-gray-50 w-full rounded-lg max-w-[280px] border-r border-gray-100 shrink-0 px-6 sm:px-8 py-6">
    <div class="flex items-center border-b border-gray-300 pb-2 mb-6">
        <h3 class="text-slate-900 text-lg font-semibold">Bộ lọc</h3>
        <button type="button" onclick="clearAllFilters()" class="text-sm text-red-500 font-semibold ml-auto cursor-pointer">Xóa tất cả</button>
    </div>

    <div class="filter-options space-y-6">
        <form action="{{ route('categories.show', $category->slug) }}" method="GET" id="filter-form">
            <div>
                <div class="header flex items-center gap-2 justify-between cursor-pointer">
                    <h4 class="text-slate-900 text-base font-semibold">Chọn mức giá</h4>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="arrow w-[14px] h-[14px] fill-slate-800 transition-all duration-300 -rotate-90"
                        viewBox="0 0 492.004 492.004">
                        <path
                            d="M382.678 226.804 163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z"
                            data-original="#000000" />
                    </svg>
                </div>
                <div class="collape-content overflow-hidden transition-all duration-300">
                    <div class="my-4">
                        <ul class="mt-6 space-y-4 mx-2">
                            <li class="flex items-center gap-3">
                                <input id="price-1tr" type="checkbox" name="price_range[]" value="0-1000000"
                                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" 
                                    {{ is_array(request('price_range')) && in_array('0-1000000', request('price_range')) ? 'checked' : '' }}/>
                                <label for="price-1tr" class="text-slate-600 font-medium text-sm cursor-pointer">Dưới 1
                                    triệu</label>
                            </li>
                            <li class="flex items-center gap-3">
                                <input id="price-3tr" type="checkbox" name="price_range[]" value="1000000-3000000"
                                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" 
                                    {{ is_array(request('price_range')) && in_array('1000000-3000000', request('price_range')) ? 'checked' : '' }}/>
                                <label for="price-3tr" class="text-slate-600 font-medium text-sm cursor-pointer">Từ
                                    1 - 3 triệu</label>
                            </li>
                            <li class="flex items-center gap-3">
                                <input id="price-5tr" type="checkbox" name="price_range[]" value="3000000-5000000"
                                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" 
                                    {{ is_array(request('price_range')) && in_array('3000000-5000000', request('price_range')) ? 'checked' : '' }}/>
                                <label for="price-5tr" class="text-slate-600 font-medium text-sm cursor-pointer">Từ
                                    3 - 5 triệu</label>
                            </li>
                            <li class="flex items-center gap-3">
                                <input id="price-10tr" type="checkbox" name="price_range[]" value="5000000-10000000"
                                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" 
                                    {{ is_array(request('price_range')) && in_array('5000000-10000000', request('price_range')) ? 'checked' : '' }}/>
                                <label for="price-10tr" class="text-slate-600 font-medium text-sm cursor-pointer">Từ
                                    5 - 10 triệu</label>
                            </li>
                            <li class="flex items-center gap-3">
                                <input id="price-10tr" type="checkbox" name="price_range[]" value="10000000-0"
                                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" 
                                    {{ is_array(request('price_range')) && in_array('10000000-0', request('price_range')) ? 'checked' : '' }}/>
                                <label for="price-10tr" class="text-slate-600 font-medium text-sm cursor-pointer">Trên
                                    10
                                    triệu</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <div class="header flex items-center gap-2 justify-between cursor-pointer mt-4">
                    <h4 class="text-slate-900 text-base font-semibold">Thương hiệu</h4>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="arrow w-[14px] h-[14px] fill-slate-800 transition-all duration-300 rotate-90"
                        viewBox="0 0 492.004 492.004">
                        <path
                            d="M382.678 226.804 163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z"
                            data-original="#000000" />
                    </svg>
                </div>
                <div class="collape-content overflow-hidden transition-all duration-300">
                    <div class="my-4 ">
                        <ul class="mt-6 space-y-4 mx-2">
                            @forelse($brands as $brand)
                                <li class="flex items-center gap-3">
                                    <input id="brand-{{ $brand->id }}" type="checkbox" name="brand_id[]"
                                        value="{{ $brand->id }}"
                                        class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                        {{ is_array(request('brand_id')) && in_array($brand->id, request('brand_id')) ? 'checked' : '' }} />
                                    <label for="brand-{{ $brand->id }}"
                                        class="text-slate-600 font-medium text-sm cursor-pointer">{{ $brand->name }}</label>
                                </li>
                            @empty
                                <li class="flex items-center gap-3">
                                    <input id="no-brand" type="checkbox"
                                        class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                                    <label for="no-brand" class="text-slate-600 font-medium text-sm cursor-pointer">Không có
                                        dữ liệu</label>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.querySelectorAll('.filter-options .header').forEach(header => {
        const content = header.parentElement.querySelector('.collape-content');
        // add height to expanded element
        if (!content.classList.contains('h-0')) {
            const fullHeight = `h-[${content.scrollHeight}px]`;
            content.classList.add(fullHeight);
        }

        header.addEventListener('click', () => {
            const arrow = header.querySelector('.arrow');
            if (content.classList.contains('h-0')) {
                // Expand
                const fullHeight = `h-[${content.scrollHeight}px]`;
                content.classList.add(fullHeight);
                content.classList.remove('h-0');
            } else {
                // Collapse
                const fullHeight = `h-[${content.scrollHeight}px]`;
                content.classList.remove(fullHeight);
                content.classList.add('h-0');
            }

            arrow.classList.toggle('-rotate-90');
            arrow.classList.toggle('rotate-90');
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filter-form');
    const inputs = filterForm.querySelectorAll('input');
    let searchTimer;
    
    inputs.forEach(input => {
        input.addEventListener('change', function() {
            filterForm.submit();
        });
    });
});
</script>
<script>
    function clearAllFilters() {
    window.location.href = window.location.pathname;
}
</script>
