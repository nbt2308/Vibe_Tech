@extends('user.layouts.app')

@section('title', 'Kết quả tìm kiếm cho "' . request('search') . '"')

@section('content')
    <div class="container mx-auto px-4 mb-5">
        <h3 class="text-2xl font-bold text-slate-800 my-6">Có {{ $products->count() }} kết quả tìm kiếm cho "{{ request('search') }}"</h3>
        @include('user.components.list-product', ['products' => $products])
    </div>
@endsection