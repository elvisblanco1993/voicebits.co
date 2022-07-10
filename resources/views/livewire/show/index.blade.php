<div>
    <div class="my-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <x-jet-input type="text" wire:model="search" placeholder="Search your shows" />
            <div class="flex items-center gap-4">
                <a href="{{ route('show.import.start') }}">Import a show</a>
                @livewire('show.create')
            </div>
        </div>
        <div class="mt-6 w-full">
            <h2 class="text-xl font-medium text-slate-500 border-b border-slate-200 pb-1">Your Podcasts</h2>
            @forelse ($podcasts as $podcast)
                <a href="{{ route('show', ['show' => $podcast->id]) }}">
                    <div class="w-full sm:flex items-center gap-8 mt-4 hover:bg-slate-50 p-4 border border-slate-200 rounded-lg">
                        <div class="w-full sm:w-1/4 md:w-1/6 lg:w-1/12 flex-none">
                            @if ($podcast->cover)
                            <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-full aspect-video sm:aspect-square object-center object-cover">
                            @else
                                <div class="w-full aspect-video sm:aspect-square bg-blue-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-20 md:w-16 h-20 md:h-16 text-blue-500" fill="currentColor" class="bi bi-soundwave" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8.5 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5zm-2 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm-6 1.5A.5.5 0 0 1 5 6v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm8 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm-10 1A.5.5 0 0 1 3 7v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5zm12 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="w-full sm:w-3/4 md:w-5/6 lg:w-11/12 flex items-center justify-between">
                            <div class="">
                                <h2 class="mt-4 sm:mt-0 text-lg md:text-xl font-bold">{{ $podcast->name }}</h2>
                                <p class="text-md font-semibold text-slate-600">{{ $podcast->author }}</p>
                                <div class="mt-1 flex items-center gap-8 text-xs text-slate-400">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2">{{ $podcast->episodes->count() }} episodes</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2">Updated {{ $podcast->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden sm:block mr-2 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
            @endforelse
        </div>
    </div>
</div>
