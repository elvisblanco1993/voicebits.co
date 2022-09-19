<div class="sticky top-0 bg-gray-50/90 dark:bg-gray-900/90 text-slate-600 dark:text-white overflow-hidden backdrop-opacity-90 backdrop-blur">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-20">
            <div class="h-full flex items-center justify-between">
                {{-- Logo --}}
                <div class="flex items-center gap-8">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="{{ asset('logo-mark.svg') }}" alt="" class="block h-8 w-auto">
                        <span class="text-2xl font-semibold text-slate-800 dark:text-white">voicebits</span>
                        <span class="text-xs font-semibold tracking-wider text-slate-500 px-1 border-2 rounded-md border-slate-500">BETA</span>
                    </a>

                    <div class="hidden md:flex items-center gap-x-6 text-sm">
                        <a href="{{ route('home') }}?#features" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white">Features</a>
                        <a href="{{ route('pricing') }}" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white">Pricing</a>
                        <a href="{{ route('blog.index') }}" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white">Articles</a>
                    </div>
                </div>

                {{-- Login links --}}
                <div class="md:hidden">
                    <a href="{{ route('login') }}" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white">Login</a>
                </div>
                <div class="hidden md:flex items-center justify-center gap-6">
                    <a href="{{ route('login') }}" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white">Login</a>
                    <a href="{{ route('register') }}" class="primary-btn">Start free trial</a>
                </div>
            </div>
        </div>
    </div>
</div>
