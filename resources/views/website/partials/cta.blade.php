<div class="my-20 block max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-slate-800">
    <div class="rounded-xl bg-cover bg-center overflow-hidden" style="background-image: url({{asset('voicebits2022.webp')}})">
        <div class="sm:text-center bg-white/60 backdrop-saturate backdrop-blur rounded-xl px-4 sm:px-6 lg:px-8 py-12">
            <h2 class="text-3xl lg:text-4xl font-extrabold">{{__("Ready to take your podcast to the next level?")}}</h2>
            <p class="mt-6 text-xl max-w-5xl mx-auto">{{ __("Sign up for our free 14-day trial and experience the full range of our powerful podcast hosting tools.") }}</p>
            <div class="mt-6">
                <a href="{{ route('register') }}"
                    role="button"
                    class="text-center font-medium text-sm w-full px-5 py-3 rounded-full bg-indigo-500 hover:bg-indigo-600 text-white transition-all"
                >{{ __("Try Voicebits Free for 14 Days") }}</a>
            </div>
        </div>
    </div>
</div>
