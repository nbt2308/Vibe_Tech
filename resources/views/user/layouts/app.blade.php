<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<body class="min-h-screen flex flex-col">
    @include('user.layouts.header')

    <main class="flex-grow my-5">
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
            mobileMenu.classList.remove('invisible');
            
            requestAnimationFrame(() => {
                menuOverlay.classList.replace('opacity-0', 'opacity-100');
                menuContent.classList.replace('-translate-x-full', 'translate-x-0');
            });
            
            document.body.style.overflow = 'hidden';
        }

        // Hàm Đóng Menu
        function closeMenu() {
            menuOverlay.classList.replace('opacity-100', 'opacity-0');
            menuContent.classList.replace('translate-x-0', '-translate-x-full');
            
            setTimeout(() => {
                mobileMenu.classList.add('invisible');
            }, 300);
            
            document.body.style.overflow = '';
        }

        mobileMenuBtn.addEventListener('click', openMenu);
        closeMenuBtn.addEventListener('click', closeMenu);
        menuOverlay.addEventListener('click', closeMenu);
    </script> 
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        @if($errors->any())
            let errorMessages = `
                    <ul style="text-align: left; margin-left: 15px; font-size: 14px;">
                        @foreach($errors->all() as $error)
                            <li>-{{ $error }}</li>
                        @endforeach
                    </ul>
                `;

            Toast.fire({
                icon: 'error',
                title: 'Có lỗi xảy ra!',
                html: errorMessages //hiển thị dạng danh sách bằng html
            });
        @endif
        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            });
        @endif

        @if(session('error'))
            Toast.fire({
                icon: 'error',
                title: "{{ session('error') }}"
            });
        @endif
    </script>
</html>