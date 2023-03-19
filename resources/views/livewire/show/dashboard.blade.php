<div>
    @if (auth()->user()->podcasts->count() == 0)
        @livewire('show.create')
    @endif
</div>
