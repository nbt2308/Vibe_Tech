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
</head>

<body class="bg-gray-50 text-gray-800 font-sans h-screen flex overflow-hidden">


    @include('admin.layouts.sidebar')


    <main class="flex-1 flex flex-col overflow-hidden">
        @include('admin.layouts.header')
        <section class="p-8">
            @yield('content')
        </section>

    </main>

</body>

</html>