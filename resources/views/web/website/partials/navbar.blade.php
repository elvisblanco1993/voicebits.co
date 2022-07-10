<div class="sticky top-0 bg-white text-slate-600 overflow-hidden backdrop-opacity-90 backdrop-blur-sm">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-20">
            <div class="h-full flex items-center justify-between">
                {{-- Logo --}}
                <div class="flex items-center gap-8">
                    <a href="">
                        <img src="{{ asset('logo-mark.svg') }}" alt="" class="block h-9 w-auto">
                    </a>

                    <div class="hidden md:flex items-center gap-x-6 text-sm">
                        <a href="" class="inline-block rounded-lg py-1 px-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900">Features</a>
                        <a href="" class="inline-block rounded-lg py-1 px-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900">Pricing</a>
                        <a href="" class="inline-block rounded-lg py-1 px-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900">About Us</a>
                        <a href="" class="inline-block rounded-lg py-1 px-2 text-slate-700 hover:bg-slate-100 hover:text-slate-900">Blog</a>
                    </div>
                </div>

                {{-- Login links --}}
                <div class="hidden md:flex items-center justify-center gap-6">
                    <a href="{{ route('login') }}" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900">Login</a>
                    <a href="{{ route('register') }}" class="primary-btn">Start free trial</a>
                </div>
            </div>
        </div>
    </div>
</div>
