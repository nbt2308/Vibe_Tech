@extends('user.layouts.app')

@section('title', $category->name)

@section('content')

    @include('user.layouts.hero-banner')
    <h2 class="text-center text-2xl font-bold mb-6 pb-2">{{ $category->name }}</h2>
    <div class="container mx-auto my-6">
        <div class="flex">
            @include('user.components.filter-bar')
            <div class="flex-1 mx-4">
                @include('user.components.list-product', ['products' => $products])
                <div class="mt-4">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection