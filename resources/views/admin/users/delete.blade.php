<x-my-modal name="delete-user-modal-{{ $user->id }}" maxWidth="lg">
    <x-slot name="title">
        Xoá người dùng
    </x-slot>

    <x-slot name="content">
        <div class="text-center p-4">
            <div class="mb-4 text-red-500 text-6xl">
                <i class="fas fa-exclamation-circle font-bold"></i>
            </div>
            <p class="text-gray-700 text-lg mb-2">Bạn có chắc chắn muốn xóa người dùng này?</p>
            <p class="text-gray-900 font-bold text-xl mb-4">"{{ $user->name }}"</p>
            <p class="text-sm text-gray-500">Hành động này không thể hoàn tác. Mọi dữ liệu liên quan đến người dùng sẽ bị xóa vĩnh viễn.</p>
        </div>

        <form action="{{ route('admin.users.destroy', $user->id) }}" method="get" id="deleteForm-{{ $user->id }}">
            @csrf
            @method('DELETE')
        </form>
    </x-slot>

    <x-slot name="footer">
        <button @click="show = false" type="button"
            class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
            Hủy bỏ
        </button>
        <button type="submit" form="deleteForm-{{ $user->id }}"
            class="ml-3 px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition">
            Xác nhận xóa
        </button>
    </x-slot>
</x-my-modal>
