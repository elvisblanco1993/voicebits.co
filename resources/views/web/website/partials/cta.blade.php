<div class="my-20 block max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-black dark:text-white">
    <div class="rounded-xl bg-cover bg-center overflow-hidden" style="background-image: url({{asset('voicebits2022.webp')}})">
        <div class="text-center bg-white/80 dark:bg-black/80 backdrop-blur-sm rounded-xl px-4 sm:px-6 lg:px-8 py-12">
            <h2 class="text-3xl lg:text-4xl font-extrabold">{{__("Ready to take your podcast to the next level?")}}</h2>
            <p class="mt-6 max-w-5xl mx-auto dark:text-gray-300">{{ __("Sign up for our free 14-day trial and experience the full range of our powerful podcast hosting tools. With no commitment and no credit card required, there's no reason not to try us out. From effortless hosting to seamless distribution, you'll quickly see why our platform is the best choice for podcasters like you. So what are you waiting for? Start your free trial today and take your podcast to the masses!") }}</p>
            <div class="mt-6">
                <a href="{{ route('register') }}"
                    role="button"
                    class="primary-btn"
                >{{ __("Try Us Free for 14 Days") }}</a>
            </div>
        </div>
    </div>
</div>
