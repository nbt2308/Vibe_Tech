@extends('admin.layouts.app')
@section('title', 'Trang quản trị - Vibe Tech')
@section('breadcrumb', 'Bình luận')
@section('placeholder-searchbar', 'Tìm kiếm bình luận...')

@section('content')
    <div class="flex-1 flex flex-col">
        <div class="p-4 md:p-6">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6 mb-8">
    
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-50 text-blue-600 mr-4">
                                <i class="fa-regular fa-comment"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Tổng bình luận</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $comment_count }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-emerald-500 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-emerald-50 text-emerald-600 mr-4">
                                <i class="fa-regular fa-circle-check fa-lg"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Đang hiển thị</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $comment_status_true }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border-l-4 border-slate-400 hover:shadow-md transition-all duration-300">
                    <div class="p-5 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-slate-100 text-slate-600 mr-4">
                                <i class="fa-solid fa-circle-xmark fa-lg"></i>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-slate-500 tracking-tight">Đã ẩn</dt>
                                <dd class="text-2xl font-bold text-slate-800 tracking-tight">{{ $comment_status_false }}</dd>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-6">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800">Bình luận</h2>
            </div>

            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:items-end md:gap-4 mb-6">
                <div class="flex-1 min-w-[150px]">
                    <p class="text-sm text-gray-700 mb-1 font-medium">Tìm kiếm</p>
                    <x-searchbar action="{{ route('comments') }}" placeholder="Nhập bình luận..." value="{{ request('search') }}" />
                </div>

                <div class="grid grid-cols-1 gap-3 md:flex md:gap-4">

                    <div class="w-full md:w-48">
                        <p class="text-sm text-gray-700 mb-1 font-medium">Trạng thái</p>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                    <span>
                                        @if(request('comment_status') === '1') Đang hiển thị @elseif(request('comment_status') === '0') Đã ẩn @else Trạng thái @endif
                                    </span>
                                    <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['comment_status' => null]) }}">Tất cả</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['comment_status' => '1']) }}">Đang hiển thị</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['comment_status' => '0']) }}">Đã ẩn</x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <div class="w-full md:w-48">
                        <p class="text-sm text-gray-700 mb-1 font-medium">Hiển thị</p>
                        <x-dropdown align="center" width="48">
                            <x-slot name="trigger">
                                <button class="w-full inline-flex items-center justify-between px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none transition duration-150">
                                    <span class="truncate">{{ request('per_page') }} bình luận</span>
                                    <i class="ml-2 fas fa-chevron-down text-[10px]"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 5]) }}">5 bình luận</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 10]) }}">10 bình luận</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 20]) }}">20 bình luận</x-dropdown-link>
                                <x-dropdown-link href="{{ request()->fullUrlWithQuery(['per_page' => 50]) }}">50 bình luận</x-dropdown-link>
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
                                <th class="py-4 px-4 font-medium w-16 text-center">ID</th>
                                <th class="py-4 px-4 font-medium">Người dùng</th>
                                <th class="py-4 px-4 font-medium">Bình luận</th>
                                <th class="py-4 px-4 font-medium text-center">Đánh giá</th>
                                <th class="py-4 px-4 font-medium text-center">Trạng thái</th>
                                <th class="py-4 px-4 font-medium">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                            @forelse ($comments as $comment)
                                <tr class="hover:bg-gray-50/80 transition">
                                    <td class="py-4 px-4 text-gray-400 text-center">#{{ $comment->id }}</td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="max-w-[200px] md:max-w-xs overflow-hidden">
                                                <p class="font-semibold text-gray-900 truncate" title="{{ $comment->user->name }}">{{ $comment->user->name }}</p>
                                                <p class="text-[12px] text-gray-400 truncate" title="{{ $comment->user->id }}">#{{ $comment->user->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="max-w-[200px] md:max-w-xs overflow-hidden">
                                                <p class="text-blue-500 truncate font-semibold" title="{{ $comment->product->name }}"><i class="fa-solid fa-box mr-1 text-blue-500 text-[11px]"></i> {{ $comment->product->name }}</p>
                                                <p class="text-gray-500 truncate italic text-lg" title="{{ $comment->comment_content }}">"{{ $comment->comment_content }}"</p>
                                                <p class="text-gray-500 truncate italic" title="{{ $comment->created_at->diffForHumans() }}"><i class="fa-solid fa-clock mr-1 text-gray-500 text-[11px]"></i> {{ $comment->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 font-bold whitespace-nowrap">
                                        <div class="flex flex-col space-y-0.5 items-center">
                                            <div class="flex items-center space-x-0.5">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star text-sm {{ $i <= $comment->comment_rating ? 'text-amber-400' : 'text-gray-300' }}"></i>
                                                @endfor
                                            </div>
                                            <span class="text-blue-600 font-bold">{{ $comment->comment_rating }} / 5</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        @if($comment->comment_status === 1)
                                                <span class="px-2 py-1 rounded-full text-[11px] font-bold bg-green-100 text-green-700 uppercase">{{ $comment->formatted_status }}</span>
                                            @else
                                                <span class="px-2 py-1 rounded-full text-[11px] font-bold bg-red-100 text-red-700 uppercase">{{ $comment->formatted_status }}</span>
                                            @endif
                                    </td>
                                    <td class="py-4 px-4 space-x-1  whitespace-nowrap">
                                        <div class="flex items-center space-x-1">
                                        @if($comment->comment_status === 1)
                                        <form action="{{ route('admin.comments.changeStatus', $comment->id) }}" method="get">
                                        <button  class="text-yellow-600 hover:bg-yellow-50 rounded-lg p-2 transition-colors" title="Ẩn bình luận">
                                            <i class="fa-regular fa-circle-xmark"></i>
                                        </button>
                                        </form>
                                        @else
                                        <form action="{{ route('admin.comments.changeStatus', $comment->id) }}" method="get">
                                        <button  class="text-green-600 hover:bg-green-50 rounded-lg p-2 transition-colors" title="Hiện bình luận">
                                            <i class="fa-regular fa-circle-check"></i>
                                        </button>
                                        </form>
                                        @endif
                                        <button x-data @click="$dispatch('open-modal', 'delete-comment-modal-{{ $comment->id }}');" class="text-red-600 hover:bg-red-50 rounded-lg p-2 transition-colors" title="Xóa bình luận">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-20 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <i class="fa-solid fa-box-open text-5xl mb-4 opacity-20"></i>
                                            <p class="italic">Không tìm thấy bình luận nào phù hợp.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Phân trang --}}
                <div class="p-4">
                    {{ $comments->onEachSide(1)->links() }}
                </div>
            </div>

            @foreach ($comments as $comment)
                @include('admin.comments.delete', ['comment' => $comment])
            @endforeach

        </div>
    </div>
@endsection