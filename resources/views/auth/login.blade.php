<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            {{-- Logo Section --}}
            <a href="/" class="inline-flex items-center gap-3 group">
                <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200 group-hover:rotate-12 transition-transform duration-300">
                    <i class="fas fa-microchip text-white text-2xl"></i>
                </div>
                <span class="text-3xl font-extrabold tracking-tight text-slate-900">Vibe <span class="text-blue-600">Tech</span></span>
            </a>
            <h2 class="mt-6 text-xl font-semibold text-slate-600">Chào mừng bạn quay trở lại!</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white/80 backdrop-blur-md py-8 px-6 shadow-2xl shadow-blue-100/50 border border-white sm:rounded-2xl sm:px-10">
                
                <x-validation-errors class="mb-4" />

                @session('status')
                    <div class="mb-4 p-3 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm">
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <x-label for="email" value="{{ __('Email Address') }}" class="text-slate-700 font-medium" />
                        <div class="mt-1 relative">
                            
                            <x-input id="email" class="block w-full pl-10 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm transition-all" 
                                type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                    </div>

                    
                    <div>
                        <div class="flex items-center justify-between">
                            <x-label for="password" value="{{ __('Password') }}" class="text-slate-700 font-medium" />
                            @if (Route::has('password.request'))
                                <a class="text-sm font-semibold text-blue-600 hover:text-blue-500" href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                            @endif
                        </div>
                        <div class="mt-1 relative">
                            <x-input id="password" class="block w-full pl-10 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm transition-all" 
                                type="password" name="password" required autocomplete="current-password" />
                        </div>
                    </div>

                   
                    <div class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500" />
                        <span class="ms-2 text-sm text-slate-600">{{ __('Ghi nhớ đăng nhập') }}</span>
                    </div>

                    
                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all active:scale-[0.98]">
                            {{ __('Đăng nhập ngay') }}
                        </button>
                    </div>
                </form>

                <div class="mt-8 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-slate-500">Hoặc</span>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-slate-600">
                        Chưa có tài khoản? 
                        <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-500 transition-colors">
                            Đăng ký miễn phí
                        </a>
                    </p>
                </div>
            </div>

            {{-- Back to home --}}
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                    <i class="fas fa-arrow-left text-xs"></i>
                    Quay lại trang chủ
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>