<div>
    {{-- Podcast Menu --}}
    @livewire('submenu')

    {{-- Statistics --}}
    @if ($podcast->cover && $podcast->url && $podcast->episodes->count() > 0)
        <div class="py-6">
            @livewire('analytics.total-plays')
            <div class="py-6">
                <div class="pb-2">
                    @livewire('analytics.date-picker')
                </div>
                @livewire('analytics.overview')
            </div>
            <div class="py-6">
                @livewire('analytics.regions')
            </div>
            <div class="py-6">
                @livewire('analytics.player-breakdown')
            </div>
            <div class="mt-4">
                @livewire('analytics.episodes-breakdown')
            </div>
        </div>
    @else
        @include('livewire.show.checklist')
    @endif
</div>
