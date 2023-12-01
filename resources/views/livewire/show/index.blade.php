<div class="py-12">
    <div class="px-4 sm:px-6 lg:px-0 flex flex-col sm:flex-row justify-between">
        <div class="flex items-center space-x-4">
            <h1 class="text-4xl font-bold">Podcasts</h1>
            @livewire('show.search')
        </div>
        @can('create_podcasts')
            <div class="mt-6 sm:mt-0 flex items-center gap-4">
                <a href="{{ route('podcast.import.start') }}">
                    <span class="inline-block">Import <sup class="text-xs font-medium px-1 bg-slate-200 text-slate-600 tracking-wider rounded">beta</sup></span>
                </a>
                <a href="{{ route('podcast.create') }}"
                    class="px-5 py-2 rounded-md bg-amber-300 hover:bg-amber-200 font-medium transition-all"
                >{{ __("Create Podcast") }}</a>
            </div>
        @endcan
        @if(!auth()->user()->stripe_id)
            <a href="{{ route('trial.start') }}" class="btn-link">Upgrade</a>
        @endif
    </div>
    <div class="py-6 px-4 sm:px-6 lg:px-0">
        <div class="mt-6 w-full">
            {{-- Invitation --}}
            @if (Auth::user()->hasPendingInvitations())
                @forelse (DB::table('podcast_invitations')->where('email', Auth::user()->email)->get() as $invitation)
                    <div class="mb-4 w-full px-4 py-1.5 text-sm bg-slate-200 text-center rounded-full border border-slate-300">
                        <span class="inline-flex space-x-1">
                            <span>You have been invited to join <strong>{{ App\Models\Podcast::findOrFail($invitation->podcast_id)->name }}</strong> as a team member.</span>
                            @livewire('show.user.accept-invitation', ['podcast' => $invitation->podcast_id, 'user' => $invitation->email])
                        </span>
                    </div>
                @empty
                @endforelse
            @endif
            {{-- End - Invitation --}}
            <div class="w-full grid grid-cols-4 items-start gap-8">
                @forelse ($podcasts as $podcast)
                    <button wire:click="goto({{$podcast->id}})" class="col-span-4 sm:col-span-2 md:col-span-1 w-full text-left group transition-all">
                        @if ($podcast->cover)
                            <img src="{{ route('public.podcast.cover', ['url' => $podcast->url]) }}" alt="{{ $podcast->name }}" class="w-full aspect-square rounded-lg object-center object-cover">
                        @else
                            <div class="w-full aspect-square rounded-lg bg-gradient-to-tr from-slate-50 group-hover:from-amber-50 to-slate-200 group-hover:to-amber-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                                </svg>
                            </div>
                        @endif
                        <div class="mt-4">
                            <h2 class="sm:mt-0 text-xl lg:text-xl font-bold">{{ $podcast->name }}</h2>
                            <p class="mt-3 text-sm font-medium text-slate-600">By {{ $podcast->author }} &middot; {{ $podcast->episodes->count() }} ep. @if($podcast->isPrivate()) 🔒 @endif</p>
                        </div>
                    </button>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
