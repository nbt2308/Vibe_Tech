@extends('user.layouts.app')

@section('title', 'Danh sách yêu thích')

@section('content')
    <div class="container mx-auto">
        <div class="flex items-center justify-between gap-3 md:gap-4">
            <h1 class="text-2xl font-bold text-gray-800">Danh sách yêu thích</h1>
        </div>
        <div class="mt-5">
            @include('user.components.list-product', ['products' => $products])
        </div>
    </div>
@endsection