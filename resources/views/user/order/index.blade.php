@extends('user.layouts.app')

@section('title', 'Lịch sử đơn hàng')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Đơn hàng của bạn</h2>
        </div>

        <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:items-end md:gap-4 mb-6">
            <div class="grid grid-cols-3 gap-3 md:flex md:gap-4">
                <div class="w-full md:w-48">
                    <p class="text-sm text-gray-700 mb-1 font-medium">Trạng thái</p>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                <span>
                                    @if(request('status') === 'pending') Chờ xác nhận
                                    @elseif(request('status') === 'confirmed') Đã xác nhận
                                    @elseif(request('status') === 'shipping') Đang giao hàng
                                    @elseif(request('status') === 'completed') Đã hoàn thành
                                    @elseif(request('status') === 'cancelled') Đã hủy
                                    @else Trạng thái
                                    @endif
                                </span>
                                <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => null]) }}">Tất
                                cả</x-dropdown-link>
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => 'pending']) }}">Chờ xác
                                nhận</x-dropdown-link>
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => 'confirmed']) }}">Đã xác
                                nhận</x-dropdown-link>
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => 'shipping']) }}">Đang giao
                                hàng</x-dropdown-link>
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => 'completed']) }}">Đã hoàn
                                thành</x-dropdown-link>
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['status' => 'cancelled']) }}">Đã
                                hủy</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="w-full md:w-32">
                    <p class="text-sm text-gray-700 mb-1 font-medium">Hiển thị</p>
                    <x-dropdown align="center" width="32">
                        <x-slot name="trigger">
                            <button
                                class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                <span class="truncate">{{ request('per_page') }} đơn hàng</span>
                                <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 5]) }}">5 đơn
                                hàng</x-dropdown-link>
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 10]) }}">10 đơn
                                hàng</x-dropdown-link>
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 20]) }}">20 đơn
                                hàng</x-dropdown-link>
                            <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}">50 đơn
                                hàng</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1000px]">
                    <thead>
                        <tr class="bg-gray-800 text-sm text-white uppercase tracking-wider">
                            <th class="py-4 px-4 font-medium w-16 text-center">Mã đơn</th>
                            <th class="py-4 px-4 font-medium">Ngày đặt</th>
                            <th class="py-4 px-4 font-medium">Tổng tiền</th>
                            <th class="py-4 px-4 font-medium">Trạng thái</th>
                            <th class="py-4 px-4 font-medium text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                        @forelse ($orders as $order)
                            <tr class="hover:bg-gray-50/80 transition">
                                <td class="py-4 px-4 text-black font-semibold text-center">#{{ $order->order_code }}</td>
                                <td class="py-4 px-4 font-bold text-slate-900 whitespace-nowrap">
                                    {{ $order->formatted_created_at }}
                                </td>
                                <td class="py-4 px-4">
                                    <span class="px-2.5 py-1 text-md text-slate-600 font-medium">
                                        {{ $order->formatted_total_amount }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $order->status_badge }}">
                                        {!! $order->status_icon !!}
                                        {{ $order->formatted_status }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center space-x-1 whitespace-nowrap">
                                    <button x-data @click="$dispatch('open-modal', 'show-order-modal-{{ $order->id }}');"
                                        class="text-blue-600 hover:bg-blue-50 rounded-lg p-2 transition-colors"
                                        title="Xem chi tiết đơn hàng">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @if($order->status !== 'completed' && $order->status !== 'cancelled')
                                        <button x-data @click="$dispatch('open-modal', 'cancel-order-modal-{{ $order->id }}');"
                                            class="text-red-600 hover:bg-red-50 rounded-lg p-2 transition-colors"
                                            title="Hủy đơn hàng">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-20 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <i class="fa-solid fa-cart-shopping text-5xl mb-4 opacity-20"></i>
                                        <p class="italic">Không tìm thấy đơn hàng nào phù hợp.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Phân trang --}}
            <div class="p-4">
                {{ $orders->onEachSide(1)->links() }}
            </div>
            @foreach ($orders as $order)
                @include('user.order.show', ['order' => $order])
                @include('user.order.cancel', ['order' => $order])
            @endforeach
        </div>
    </div>
@endsection