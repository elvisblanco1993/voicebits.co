<div>
    <div class="py-12 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-4xl font-bold">You are all set!</div>
        <div class="mt-2 text-base font-normal">We will start importing your podcast now and will let you know once is ready. It may take up to 24 hours before you can see all your episodes listed.</div>
        <div class="mt-4 sm:flex items-center space-x-6">
            <img src="{{ $podcast->cover }}" alt="{{ $podcast->name }}" class="w-44 h-44 object-center object-cover">
            <div class="">
                <p class="mt-2 text-2xl font-semibold text-black">{{ $podcast->name }}</p>
                <p class="mt-2">Host: {{ $podcast->owner_name }}</p>
                <p class="mt-1">Email: {{ $podcast->owner_email }}</p>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('podcast.catalog') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
            >Go to dashboard</a>
        </div>
    </div>
</div>
