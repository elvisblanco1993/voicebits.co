<div class="sticky top-0 z-50 bg-white text-slate-600 bg-opacity-80 backdrop-blur">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-24">
            <div class="h-full flex items-center justify-between">
                {{-- Logo --}}
                <div class="flex items-center gap-8">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <x-application-logo />
                    </a>
                </div>

                <div class="hidden md:flex items-center gap-x-6">
                    <a href="{{ route('home') }}?#features" class="inline-block text-slate-700 hover:text-violet-600">Features</a>
                    <a href="{{ route('pricing') }}" class="inline-block text-slate-700 hover:text-violet-600">Pricing</a>
                    <a href="{{ route('blog.index') }}" class="inline-block text-slate-700 hover:text-violet-600">The Blog</a>
                </div>

                {{-- Login links --}}
                <div class="hidden md:flex items-center justify-center gap-6">
                    <a href="{{ route('login') }}" class="inline-block text-slate-700 hover:text-violet-600">Login</a>
                    <a href="{{ route('register') }}" class="primary-btn">Start free trial</a>
                </div>

                {{-- Dropdown menu --}}
                <div class="md:hidden relative" x-data="{burger : false}" x-cloak>
                    <button class="bg-white text-slate-600 rounded-md flex items-center justify-center p-2" x-on:click="burger = ! burger">
                        <svg x-show="!burger" x-transition:enter xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg x-show="burger" x-transition:enter xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="mt-2 absolute right-0 w-56 z-50 bg-white text-slate-600 text-sm rounded-md" x-show="burger" x-transition @click.outside="burger = false">
                        <a href="{{ route('login') }}" class="block px-4 my-2.5 hover:text-violet-500">Sign In</a>
                        <a href="{{ route('register') }}" class="block px-4 my-2.5 hover:text-violet-500">Free Trial</a>
                        <div class="my-6"></div>
                        <a href="{{ route('home') }}#features" class="block px-4 my-2.5 hover:text-violet-500">Features</a>
                        <a href="{{ route('pricing') }}" class="block px-4 my-2.5 hover:text-violet-500">Pricing</a>
                        <a href="{{ route('blog.index') }}" class="block px-4 my-2.5 hover:text-violet-500">The Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
