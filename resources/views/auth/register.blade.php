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
            <h2 class="mt-6 text-xl font-semibold text-slate-600">Tạo tài khoản mới</h2>
            <p class="mt-2 text-sm text-slate-500">Gia nhập cộng đồng công nghệ ngay hôm nay</p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-xl">
            <div class="bg-white/80 backdrop-blur-md py-8 px-6 shadow-2xl shadow-blue-100/50 border border-white sm:rounded-2xl sm:px-10">
                
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <div>
                            <x-label for="name" value="{{ __('Họ và tên') }}" class="text-slate-700 font-medium" />
                            <div class="mt-1 relative">
                                
                                <x-input id="name" class="block w-full pl-10 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" 
                                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nguyễn Văn A" />
                            </div>
                        </div>

                        
                        <div>
                            <x-label for="phone" value="{{ __('Số điện thoại') }}" class="text-slate-700 font-medium" />
                            <div class="mt-1 relative">
                                
                                <x-input id="phone" class="block w-full pl-10 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" 
                                    type="text" name="phone" :value="old('phone')" required placeholder="09..." />
                            </div>
                        </div>
                    </div>

                   
                    <div>
                        <x-label for="email" value="{{ __('Email Address') }}" class="text-slate-700 font-medium" />
                        <div class="mt-1 relative">
                            
                            <x-input id="email" class="block w-full pl-10 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" 
                                type="email" name="email" :value="old('email')" required placeholder="example@gmail.com" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <x-label for="password" value="{{ __('Mật khẩu') }}" class="text-slate-700 font-medium" />
                            <div class="mt-1 relative">
                                
                                <x-input id="password" class="block w-full pl-10 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" 
                                    type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                            </div>
                        </div>

                        
                        <div>
                            <x-label for="password_confirmation" value="{{ __('Xác nhận mật khẩu') }}" class="text-slate-700 font-medium" />
                            <div class="mt-1 relative">
                                
                                <x-input id="password_confirmation" class="block w-full pl-10 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm" 
                                    type="password" name="password_confirmation" required placeholder="••••••••" />
                            </div>
                        </div>
                    </div>

                    
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <label for="terms" class="flex items-start cursor-pointer">
                                <x-checkbox name="terms" id="terms" required class="mt-1 rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500" />
                                <div class="ms-3 text-sm text-slate-600 leading-relaxed">
                                    {!! __('Tôi đồng ý với :terms_of_service và :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-bold text-blue-600 hover:underline">'.__('Điều khoản dịch vụ').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-bold text-blue-600 hover:underline">'.__('Chính sách bảo mật').'</a>',
                                    ]) !!}
                                </div>
                            </label>
                        </div>
                    @endif

                    
                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all active:scale-[0.98]">
                            {{ __('Đăng ký ngay') }}
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-slate-600">
                        Đã có tài khoản? 
                        <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-500 transition-colors">
                            Đăng nhập tại đây
                        </a>
                    </p>
                </div>
            </div>

            {{-- Back to home --}}
            <div class="mt-8 text-center pb-12">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
                    <i class="fas fa-arrow-left text-xs"></i>
                    Quay lại trang chủ
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>