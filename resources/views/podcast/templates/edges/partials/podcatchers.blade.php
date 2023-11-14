<div class="mt-2 space-y-3">
    @forelse (config('voicebits.podcatchers') as $item => $podcatcher)
        <div class="block">
            <a href="#" target="_{{ $item }}" class="inline-flex items-center gap-3 px-4 py-2.5 space-y-2 border text-sm rounded-md shadow-sm hover:shadow-lg transition-all">
                {!! $podcatcher['icon'] !!}
                {{ $podcatcher['name'] }}
            </a>
        </div>
    @empty
    @endforelse
</div>
