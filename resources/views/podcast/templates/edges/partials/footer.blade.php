<footer class="mt-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="py-10 border-t-2 border-b border-slate-200">
        @include('podcast.templates.edges.partials.social')

        @if ($podcast->copyright)
            <p class="mt-6 text-slate-600">&copy; {{ $podcast->copyright }}</p>
        @endif
    </div>

    {{-- Watermark --}}
    <div class="my-6 text-xs text-center">
        <a href="https://voicebits.co" target="_voicebits" class="text-slate-600 hover:text-slate-800 font-medium transition-colors">Broadcast by Voicebits</a>
    </div>
    {{-- Watermark | End --}}
</footer>
