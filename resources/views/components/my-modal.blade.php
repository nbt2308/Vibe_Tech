@props(['name', 'maxWidth' => '4xl'])

<div x-data="{ show: false, name: '{{ $name }}' }"
     x-show="show"
     @open-modal.window="if ($event.detail === name) show = true"
     @close-modal.window="if ($event.detail === name) show = false"
     @keydown.escape.window="show = false"
     style="display: none;"
     class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6 sm:px-0">

    <div x-show="show" class="fixed inset-0 transform transition-all" @click="show = false">
        <div class="absolute inset-0 bg-gray-800 opacity-50"></div>
    </div>

    <div x-show="show" class="bg-white rounded-xl shadow-xl transform transition-all sm:w-full sm:max-w-{{ $maxWidth }} z-10 flex flex-col max-h-[90vh]">
        
        @if(isset($title))
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-bold text-blue-600">{{ $title }}</h3>
                <button @click="show = false" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        @endif

        <div class="px-6 py-2 overflow-y-auto flex-1">
            {{ $content }}
        </div>

        @if(isset($footer))
            <div class="px-6 py-4 bg-gray-50 flex justify-end gap-3 border-t border-gray-100 rounded-b-xl">
                {{ $footer }}
            </div>
        @endif

    </div>
</div>