<div class="py-12">
    <div class="px-4 sm:px-6 lg:px-0 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <h1 class="text-4xl font-bold">Podcasts</h1>
            @livewire('show.search')
        </div>
        @can('create_podcasts')
            <div class="flex items-center gap-4">
                <a href="{{ route('podcast.import.start') }}">
                    <span class="hidden md:inline-block">Import</span>
                    <span class="inline-block md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                        </svg>
                    </span>
                </a>
                <a href="{{ route('podcast.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-slate-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-700 active:bg-slate-900 focus:outline-none focus:border-slate-900 focus:ring focus:ring-slate-300 disabled:opacity-25 transition"
                >{{ __("Create Podcast") }}</a>
            </div>
        @endcan
    </div>
    <div class="py-6 px-4 sm:px-6 lg:px-0">
        <div class="mt-6 w-full">
            {{-- Invitation --}}
            @if (Auth::user()->hasPendingInvitations())
                @forelse (DB::table('podcast_invitations')->where('email', Auth::user()->email)->get() as $invitation)
                    <div class="mb-4 w-full px-4 py-1.5 text-sm bg-slate-200 text-center rounded-full border border-slate-300">
                        <span class="inline-flex space-x-1">
                            <span>You have been invited to join <strong>{{ App\Models\Podcast::findOrFail($invitation->podcast_id)->first()->name }}</strong> as a team member.</span>
                            @livewire('show.user.accept-invitation', ['podcast' => $invitation->podcast_id, 'user' => $invitation->email])
                        </span>
                    </div>
                @empty
                @endforelse
            @endif
            {{-- End - Invitation --}}
            <div class="w-full grid grid-cols-4 gap-8">
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
