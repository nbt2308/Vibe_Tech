<!-- Navigation Menu -->
<div class="bg-gray-800 hidden md:block mb-5">
    <div class="container mx-auto px-4">
        <ul class="flex space-x-8 text-sm font-medium text-white">

            <li>
                <a href="/" 
                   class="block py-3 border-b-2 transition {{ request()->is('/') ? 'border-blue-400 text-blue-400' : 'border-transparent text-white hover:text-blue-400 hover:border-blue-400' }}">
                    <i class="fas fa-home mr-2"></i>Trang chủ
                </a>
            </li>
<!-- load chỗ này -->
            <li>
                <a href="#"
                   class="block py-3 border-b-2 transition {{ request()->is('ban-phim-co') ? 'border-blue-400 text-blue-400' : 'border-transparent text-white hover:text-blue-400 hover:border-blue-400' }}">
                    Bàn phím cơ
                </a>
            </li>

        </ul>
    </div>
</div>