<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
        @include('layouts.podcast-menu')

        {{-- Distribution Checklist --}}
        @if (!$podcast->cover || !$podcast->url || $podcast->episodes->count() === 0)
            @include('layouts.podcast-dist-checklist')
        @endif

        {{-- Statistics --}}
        @if ($podcast->episodes->count() > 0)
            <div class="mt-10 grid grid-cols-2 gap-8">
                <div class="col-span-2 sm:col-span-1">
                    @livewire('show.statistics.total-plays', ['podcast' => $podcast->id])
                </div>
                <div class="col-span-2 sm:col-span-1">
                    @livewire('show.statistics.estimated-audience-size', ['podcast' => $podcast->id])
                </div>
                <div class="col-span-2 sm:col-span-1">
                    @livewire('show.statistics.plays-at-show-launch', ['podcast' => $podcast->id])
                </div>
                <div class="col-span-2 sm:col-span-1">
                    @livewire('show.statistics.total-plays-by-region', ['podcast' => $podcast->id])
                </div>
            </div>
        @endif
    </div>
</div>
