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
    <script src="https://cdn.ckeditor.com/ckeditor5/48.0.0/ckeditor5.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/48.0.0/ckeditor5.css" />
    <link rel="stylesheet"
        href="https://cdn.ckeditor.com/ckeditor5-premium-features/48.0.0/ckeditor5-premium-features.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans h-screen flex ">


    @include('admin.layouts.sidebar')


    <main class="flex-1 flex flex-col ">
        @include('admin.layouts.header')
        <section class="overflow-auto h-full">
            @yield('content')
        </section>
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

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFilePoster);
    </script>
</body>


</html>