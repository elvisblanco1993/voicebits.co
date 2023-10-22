<div class="my-20 block max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
    <div class="rounded-[25px] bg-cover bg-center overflow-hidden" style="background-image: url({{asset('voicebits2022.webp')}})">
        <div class="sm:text-center bg-slate-900/80 rounded-xl px-4 sm:px-6 lg:px-8 py-12">
            <h2 class="text-3xl lg:text-4xl font-extrabold">{{__("Ready to take your podcast to the next level?")}}</h2>
            <p class="mt-6 text-xl max-w-5xl mx-auto">{{ __("Sign up for our free 14-day trial and experience the full range of our powerful podcast hosting tools.") }}</p>
            <div class="mt-6">
                <a href="{{ route('register') }}"
                    role="button"
                    class="text-center font-semibold w-full px-5 py-3 rounded-full bg-teal-400 hover:bg-teal-500 text-slate-900 transition-all"
                >{{ __("Try Voicebits Free for 14 Days") }}</a>
            </div>
        </div>
    </div>
</div>
