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
    <!-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> -->
    <!-- ckeditor5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/48.0.0/ckeditor5.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/48.0.0/ckeditor5.css" />
    <link rel="stylesheet"
        href="https://cdn.ckeditor.com/ckeditor5-premium-features/48.0.0/ckeditor5-premium-features.css" />

    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- filepond -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet" />

    <!-- alpinejs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans h-screen flex ">

    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-[60] hidden md:hidden" onclick="toggleSidebar()"></div>
    <div id="sidebar-slide"
        class="fixed md:static inset-y-0 left-0 z-[70] md:z-auto w-[280px] md:w-auto transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out h-full md:h-auto overflow-y-auto md:overflow-visible bg-gray-50 md:bg-transparent shadow-2xl md:shadow-none">
        @include('admin.layouts.sidebar')
    </div>

    <main class="flex-1 flex flex-col h-screen overflow-y-auto w-full">
        @include('admin.layouts.header')
        <div class="flex-1">
            @yield('content')
        </div>
        @include('admin.layouts.footer')
    </main>
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
                html: errorMessages // Dùng html thay vì title để hiển thị dạng danh sách
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
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar-slide');
            const overlay = document.getElementById('sidebar-overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
            
            // chặn cuộn trang khi mở thanh sidebar trên mobile
            if (!overlay.classList.contains('hidden')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFilePoster);
    </script>
</body>


</html>