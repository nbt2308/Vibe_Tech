<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>@yield('title', 'Vibe Tech')</title>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6', // Xanh dương
                        secondary: '#1e40af',
                        dark: '#1f2937',
                        light: '#f3f4f6'
                    }
                }
            }
        }
    </script>
    </head>
<body>
    @include('user.layouts.header')

    <main>
        @yield('content')
    </main>

    @include('user.layouts.footer')
</body>
<script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeMenuBtn = document.getElementById('closeMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuOverlay = document.getElementById('menuOverlay');
        const menuContent = document.getElementById('menuContent');

        // Hàm Mở Menu
        function openMenu() {
            // Xóa class invisible để hiển thị khối
            mobileMenu.classList.remove('invisible');
            
            // Ép trình duyệt render trước khi chạy hiệu ứng transition
            requestAnimationFrame(() => {
                // Làm đậm nền đen
                menuOverlay.classList.replace('opacity-0', 'opacity-100');
                // Kéo khung nội dung từ trái (-100%) vào giữa (0%)
                menuContent.classList.replace('-translate-x-full', 'translate-x-0');
            });
            
            // Ngăn người dùng cuộn trang web ở dưới khi đang mở menu
            document.body.style.overflow = 'hidden';
        }

        // Hàm Đóng Menu
        function closeMenu() {
            // Làm mờ nền đen
            menuOverlay.classList.replace('opacity-100', 'opacity-0');
            // Đẩy khung nội dung ra ngoài rìa trái
            menuContent.classList.replace('translate-x-0', '-translate-x-full');
            
            // Đợi hiệu ứng trượt kết thúc (300ms) rồi mới ẩn hẳn khối
            setTimeout(() => {
                mobileMenu.classList.add('invisible');
            }, 300);
            
            // Trả lại thanh cuộn cho trang web
            document.body.style.overflow = '';
        }

        // Gắn sự kiện click
        mobileMenuBtn.addEventListener('click', openMenu);
        closeMenuBtn.addEventListener('click', closeMenu);
        // Bấm ra nền đen mờ ngoài menu cũng sẽ đóng menu
        menuOverlay.addEventListener('click', closeMenu);
    </script> 
</html>