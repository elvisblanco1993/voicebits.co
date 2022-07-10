<div class="flex items-center gap-2 px-4 py-2 w-full" id="player-container">
    <img src="{{ Storage::url($podacst->cover) }}" alt="" class="hidden sm:block h-12 w-12 object-center object-cover flex-none">
    <span class="text-sm hidden sm:block" id="episode-title">{{ $podcast->name }}</span>
    <div class="w-full">
        @livewire('player.player')
    </div>
</div>
