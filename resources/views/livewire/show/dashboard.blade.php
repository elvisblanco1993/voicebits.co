<div>
    <div class="max-w-7xl mx-auto h-44 bg-center bg-cover" style="background-image: url('{{ asset($podcast->cover) }}') ">
        <div class="h-full flex items-center bg-slate-900/60 backdrop-blur-xl px-4 sm:px-6 lg:px-8">
            @if ($podcast->cover)
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-24 aspect-square rounded-xl object-center object-cover">
            @else
                <div class="h-24 w-24 rounded-xl bg-purple-50 flex items-center justify-center">
                    <img src="{{ asset('logo-mark.svg') }}" alt="{{ $podcast->name }}" class="w-10 h-auto">
                </div>
            @endif
            <h1 class="ml-6 text-3xl font-bold text-white">{{ $podcast->name }}</h1>
        </div>
    </div>
    {{-- Podcast Menu --}}
    @livewire('submenu')

    {{-- Statistics --}}
    @if ($podcast->cover && $podcast->url && $podcast->episodes->count() > 0)
        <div class="py-6">
            @livewire('analytics.total-plays')
            <div class="mt-4">
                @livewire('analytics.date-picker')
            </div>
            <div class="mt-4">
                @livewire('analytics.overview')
            </div>
            <div class="mt-4">
                @livewire('analytics.regions')
            </div>
            <div class="mt-4">
                {{-- @livewire('analytics.episodes-breakdown') --}}
            </div>
        </div>
    @else
        @include('livewire.show.checklist')
    @endif
</div>
