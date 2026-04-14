@extends('user.layouts.app')

@section('title', 'Trang chủ - Vibe Tech')

@section('content')
    <!-- Hero Banner Carousel -->
    <div class="my-5">
        @include('user.layouts.hero-banner')

        <!-- Featured Categories -->
        @include('user.layouts.feature-categories')

        <!-- Product List -->
        @include('user.products.index')
    </div>
@endsection