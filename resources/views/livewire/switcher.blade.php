<div x-data="{catalog: false}" class="flex items-center">
    @if ($activePodcast)
        <button x-on:click="catalog = !catalog" class="flex items-center space-x-3">
            <img src="{{ asset($activePodcast->cover) }}" alt="" class="h-8 rounded-full">
            <span class="ml-3 text-sm font-medium tracking-wide leading-6 text-gray-700">{{ $activePodcast->name }}</span>
        </button>
    @endif

    <div x-cloak x-show="catalog" class="z-50 absolute bg-white inset-0">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="h-12 flex items-center justify-end">
                <button x-on:click="catalog = !catalog" class="p-1.5 bg-slate-100 text-slate-700 hover:bg-indigo-100 hover:text-indigo-700 rounded-lg transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                    </svg>
                </button>
            </div>

            <div class="py-6 grid grid-cols-4 gap-8">
                @forelse ($podcasts as $podcast)
                    <button wire:click="goto({{$podcast->id}})" class="col-span-4 sm:col-span-2 md:col-span-1 w-full text-left">
                        @if ($podcast->cover)
                            <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-full aspect-video rounded-lg object-center object-cover">
                        @else
                            <div class="w-full rounded-lg bg-blue-50 flex items-center justify-center">
                                <img src="{{ asset('logo-mark.svg') }}" alt="{{ $podcast->name }}" class="w-12 h-auto">
                            </div>
                        @endif
                        <div class="mt-4">
                            <h2 class="sm:mt-0 text-xl lg:text-xl font-bold">{{ $podcast->name }}</h2>
                            <p class="mt-3 text-sm font-medium text-slate-600">By {{ $podcast->author }} &middot; {{ $podcast->episodes->count() }} episodes</p>
                        </div>
                    </button>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
