@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Tổng quan')
@section('content')
    <main class="flex-1 flex flex-col overscroll-auto">
        <div class="flex-1 overflow-auto p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tổng quan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Tổng doanh thu</h3>
                            <p class="text-3xl font-bold text-gray-900">$12,345.67</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-dollar-sign text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Đơn hàng mới</h3>
                            <p class="text-3xl font-bold text-gray-900">452</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-shopping-cart text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Khách hàng mới</h3>
                            <p class="text-3xl font-bold text-gray-900">1,234</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-users text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Sản phẩm cần nhập</h3>
                            <p class="text-3xl font-bold text-gray-900">1,234</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-box text-red-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Doanh thu theo tháng</h3>
                    <div class="h-64">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Sản phẩm bán chạy</h3>
                    <div class="space-y-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection