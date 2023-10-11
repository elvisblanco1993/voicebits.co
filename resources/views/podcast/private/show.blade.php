<x-guest-layout>
    <div class="max-w-3xl mx-auto py-12 lg:py-24 px-4 sm:px-6 lg:px-8 text-center">
        @if ($subscriber->podcast->cover)
            <img src="{{ asset($subscriber->podcast->cover) }}" alt="{{ $subscriber->podcast->name }}" class="w-16 h-16 md:w-24 md:h-24 mx-auto rounded-md aspect-square">
        @endif
        <h1 class="mt-3 text-2xl font-extrabold text-slate-700">{{ $subscriber->podcast->name }}</h1>
        <p class="mt-1 text-sm text-slate-700">by <span class="font-bold">{{ $subscriber->podcast->author }}</span></p>

        <div class="mt-6 px-4 py-8 bg-white shadow rounded-lg">
            <div class="prose prose-blue">
                {{Illuminate\Mail\Markdown::parse($subscriber->podcast->description)}}
            </div>

            <div class="mt-6 max-w-xs mx-auto">
                <a href="itpc://" class="mt-4 block px-4 py-3 rounded-md font-medium bg-[#FB5BC5]/10 text-[#FB5BC5] hover:bg-[#FB5BC5] hover:text-white transition-all">iTunes</a>
                <a href="podcast://" class="mt-4 block px-4 py-3 rounded-md font-medium bg-[#9933CC]/10 text-[#9933CC] hover:bg-[#9933CC] hover:text-white transition-all">Apple Podcasts</a>
                <a href="pktc://" class="mt-4 block px-4 py-3 rounded-md font-medium bg-[#F43E37]/10 text-[#F43E37] hover:bg-[#F43E37] hover:text-white transition-all">Pocket Casts</a>
                <a href="podcastaddict://" class="mt-4 block px-4 py-3 rounded-md font-medium bg-[#F4842D]/10 text-[#F4842D] hover:bg-[#F4842D] hover:text-white transition-all">Podcast Addict</a>
                <a href="overcast://x-callback-url/add?url={{ route('private.podcast.feed', ['url' => $subscriber->token]) }}" class="mt-4 block px-4 py-3 rounded-md font-medium bg-[#FC7E0F]/10 text-[#FC7E0F] hover:bg-[#FC7E0F] hover:text-white transition-all">Overcast</a>
            </div>

            <div class="mt-6">

            </div>
        </div>
    </div>
</x-guest-layout>
