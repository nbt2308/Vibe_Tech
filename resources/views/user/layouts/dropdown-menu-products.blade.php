<li class="group max-lg:border-b max-lg:border-gray-300 max-lg:px-3 max-lg:py-3 relative">
    <!-- Tên danh mục -->
    <a href='/san-pham'
        class="{{ request()->is('san-pham*') ? 'text-blue-700 fill-blue-700' : 'text-slate-900 fill-black' }} hover:text-blue-700 hover:fill-blue-700 font-medium text-[15px] flex items-center">Tên danh mục<svg
            xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ml-1 inline-block" viewBox="0 0 24 24">
            <path
                d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                data-name="16" data-original="#000000" />
        </svg>
    </a>

    <ul
        class="absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[230px] group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-[400ms]">
        <!-- danh sách thương hiệu của sản phẩm -->
        <li class="border-b border-gray-300 py-3">
            <a href='javascript:void(0)'
                class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-normal text-[15px] flex items-center">
                
                thương hiệu
            </a>
        </li>
    </ul>

</li>