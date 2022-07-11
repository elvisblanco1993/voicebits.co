<div>
    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-2xl font-bold">You are all set!</div>
        <div class="mt-2 text-base font-normal max-w-xl mx-auto">We will start importing your podcast now and will let you know once is ready. It may take about 24 hours before you can see all your episodes listed.</div>
        <div class="mt-4">
            <img src="{{ $podcast->cover }}" alt="{{ $podcast->name }}" class="w-44 h-44 mx-auto object-center object-cover">
            <p class="mt-2 text-base font-semibold text-black">{{ $podcast->name }}</p>
        </div>
        <div class="mt-4 flex justify-center">
            <a href="{{ route('shows') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
            >Go to dashboard</a>
        </div>
    </div>
</div>
