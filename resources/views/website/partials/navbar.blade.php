<header class="sticky top-0 z-50 w-full bg-white/90 dark:bg-slate-900/90 backdrop-blur h-16 md:h-20 border-b border-b-slate-100 dark:border-b-slate-900"
    x-data="{burger : false}" x-cloak
>
    <div class="h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="h-full flex items-center justify-between font-semibold">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <x-application-logo />
            </a>

            <div class="hidden md:flex items-center gap-x-6">
                <a href="{{ route('about') }}" class="inline-block text-slate-800 dark:text-white hover:text-slate-600 dark:hover:text-slate-400 transition-all">About Us</a>
                <a href="{{ route('pricing') }}" class="inline-block text-slate-800 dark:text-white hover:text-slate-600 dark:hover:text-slate-400 transition-all">Pricing</a>
                <a href="{{ route('blog.index') }}" class="inline-block text-slate-800 dark:text-white hover:text-slate-600 dark:hover:text-slate-400 transition-all">The Blog</a>
            </div>

            <div class="hidden md:flex items-center justify-center gap-6">
                <a href="{{ route('login') }}" class="inline-block text-slate-800 dark:text-white hover:text-slate-600 dark:hover:text-slate-400 transition-all">Login</a>
                <a href="{{ route('register') }}" class="px-5 py-2 rounded-md border-2 border-slate-800 dark:border-white text-slate-800 dark:text-white hover:bg-slate-800 dark:hover:bg-white hover:text-teal-300 dark:hover:text-slate-900 transition-all">Start free trial</a>
            </div>

            <button class="md:hidden bg-slate-200 dark:bg-slate-800 text-slate-800 dark:text-slate-400 rounded-md flex items-center justify-center p-2" x-on:click="burger = ! burger">
                <svg x-show="!burger" x-transition:enter xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg x-show="burger" x-transition:enter xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>
    </div>

    {{-- Mobile Menu --}}
    <div class="md:hidden z-50 w-full bg-white/90 dark:bg-slate-900/90 backdrop-blur text-slate-800 dark:text-white font-semibold min-h-screen px-4 py-6" x-show="burger" @click.outside="burger = false">
        <ul>
            <li>
                <a href="{{ route('about') }}" class="block w-full mt-1.5 py-3 px-5 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-800 transition-all">About Voicebits</a>
            </li>
            <li>
                <a href="{{ route('pricing') }}" class="block w-full mt-1.5 py-3 px-5 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-800 transition-all">Pricing</a>
            </li>
            <li>
                <a href="{{ route('blog.index') }}" class="block w-full mt-1.5 py-3 px-5 rounded-lg hover:bg-slate-200 dark:hover:bg-slate-800 transition-all">The blog</a>
            </li>
        </ul>
        <div class="mt-4 border-t"></div>
        <ul class="mt-4">
            <li>
                <a href="{{ route('login') }}" class="block w-full mt-2 py-3 px-5 text-center rounded-lg hover:bg-slate-200 dark:hover:bg-slate-800 transition-all">Sign in</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="block w-full mt-2 py-3 px-5 rounded-lg border-2 border-slate-800 dark:border-white text-center text-slate-800 dark:text-white hover:bg-slate-800 dark:hover:bg-white hover:text-teal-300 dark:hover:text-slate-900 transition-all">Start Free Trial</a>
            </li>
        </ul>
    </div>
</header>
