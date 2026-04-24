@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Tổng quan')
@section('content')
    <main class="flex-1 flex flex-col overscroll-auto">
        <div class="flex-1 overflow-auto p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tổng quan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-6 mb-8">
    
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-50 text-blue-600 mr-4">
                                <i class="fa-solid fa-dollar-sign fa-lg"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Tổng doanh thu</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ number_format($total_revenue, 0, ',', '.') }} ₫</dd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-emerald-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-emerald-50 text-emerald-600 mr-4">
                                <i class="fa-solid fa-box-open"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Đơn hàng mới</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $recentOrders->count() }}</dd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-purple-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-50 text-purple-600 mr-4">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Khách hàng mới</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $recentCustomers->count() }}</dd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-orange-400 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-orange-100 text-orange-600 mr-4">
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Sản phẩm cần nhập</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $product_stock_less_10 }}</dd>
                            </div>
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
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Doanh thu theo doanh mục</h3>
                    <div class="space-y-4 h-64">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<!-- biểu đồ doanh thu theo tháng -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dataRevenue = {!! json_encode(array_values($monthlyRevenue)) !!};
        const dataLabels = ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'];

        new Chart(document.getElementById('revenueChart'), {
            type: 'line',
            data: {
                labels: dataLabels,
                datasets: [{
                    label: 'Doanh thu',
                    data: dataRevenue,
                    borderColor: 'blue',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>
<!-- biểu đồ doanh thu theo doanh mục -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('categoryChart').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut', // Dạng bánh vòng (hiện đại hơn)
            data: {
                labels: {!! json_encode($labels) !!}, 
                datasets: [{
                    data: {!! json_encode($values) !!}, 
                    backgroundColor: [
                        '#3b82f6', 
                        '#10b981',
                        '#f59e0b', 
                        '#ef4444', 
                        '#8b5cf6'  
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom', // Hiển thị chú thích
                    },
                    tooltip: {
                        callbacks: {
                            // Định dạng tiền tệ khi di chuột vào
                            label: function (context) {
                                let value = context.raw;
                                return ' ' + value.toLocaleString('vi-VN') + ' ₫';
                            }
                        }
                    }
                }
            }
        });
    });
</script>