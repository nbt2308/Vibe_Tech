@extends('user.layouts.app')

@section('title', 'Trang chủ - Vibe Tech')

@section('content')
    <!-- Hero Banner Carousel -->
    @include('user.layouts.hero-banner')
    
    <!-- Featured Categories -->
    @include('user.layouts.feature-categories')

    <!-- Product List -->
    @include('user.products.index')
@endsection