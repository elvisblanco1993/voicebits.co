<div class="sticky top-0 z-50 bg-gray-50/90 dark:bg-gray-900/90 text-slate-600 dark:text-white backdrop-opacity-90 backdrop-blur">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-20">
            <div class="h-full flex items-center justify-between">
                
                <div class="flex items-center gap-8">
                    <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3">
                        <img src="<?php echo e(asset('logo-mark.svg')); ?>" alt="" class="block h-8 w-auto">
                        <span class="text-2xl font-semibold text-slate-800 dark:text-white">voicebits</span>
                        <sup class="text-xs font-light tracking-wider text-slate-400">beta</sup>
                    </a>
                </div>

                <div class="hidden md:flex items-center gap-x-6 text-sm">
                    <a href="<?php echo e(route('home')); ?>?#features" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white">Features</a>
                    <a href="<?php echo e(route('pricing')); ?>" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white">Pricing</a>
                    <a href="<?php echo e(route('blog.index')); ?>" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white">The Blog</a>
                </div>

                
                <div class="hidden md:flex items-center justify-center gap-6">
                    <a href="<?php echo e(route('login')); ?>" class="inline-block rounded-lg py-1 px-2 text-sm text-slate-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-800 hover:text-slate-900 dark:hover:text-white">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="primary-btn">Start free trial</a>
                </div>

                
                <div class="md:hidden relative" x-data="{burger : false}" x-cloak>
                    <button class="bg-white dark:bg-slate-800 hover:bg-slate-700 text-slate-600 dark:text-white rounded-md flex items-center justify-center p-2" x-on:click="burger = ! burger">
                        <svg x-show="!burger" x-transition:enter xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                        </svg>
                        <svg x-show="burger" x-transition:enter xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="mt-2 absolute right-0 w-56 z-50 bg-white dark:bg-slate-800 border dark:border-slate-600 text-slate-600 dark:text-white text-sm rounded-md" x-show="burger" x-transition @click.outside="burger = false">
                        <a href="<?php echo e(route('login')); ?>" class="block px-4 my-2.5 hover:text-sky-500">Sign In</a>
                        <a href="<?php echo e(route('register')); ?>" class="block px-4 my-2.5 hover:text-sky-500">Free Trial</a>
                        <div class="my-6"></div>
                        <a href="<?php echo e(route('home')); ?>#features" class="block px-4 my-2.5 hover:text-sky-500">Features</a>
                        <a href="<?php echo e(route('pricing')); ?>" class="block px-4 my-2.5 hover:text-sky-500">Pricing</a>
                        <a href="<?php echo e(route('blog.index')); ?>" class="block px-4 my-2.5 hover:text-sky-500">The Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/elvis/Projects/voicebits-2.0/resources/views/web/website/partials/navbar.blade.php ENDPATH**/ ?>