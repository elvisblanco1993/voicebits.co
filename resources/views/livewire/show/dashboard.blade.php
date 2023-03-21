<div>
    {{-- Podcast Menu --}}
    @livewire('submenu')

    {{-- Distribution Checklist --}}
    @if (!$podcast->cover || !$podcast->url || $podcast->episodes->count() === 0)
        @include('layouts.podcast-dist-checklist')
    @endif

    {{-- Statistics --}}
    @if ($podcast->episodes->count() > 0)
        <div class="my-12 grid grid-cols-2 gap-8">
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
