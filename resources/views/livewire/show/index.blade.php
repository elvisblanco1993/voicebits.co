<div class="py-12">
    <div class="px-4 sm:px-6 lg:px-0 flex flex-col sm:flex-row justify-between">
        <div class="flex items-center space-x-4">
            <h1 class="text-4xl font-bold">Podcasts</h1>
            @livewire('show.search')
        </div>
        @can('create_podcasts')
            <div class="mt-6 sm:mt-0 flex items-center gap-4">
                <a href="{{ route('podcast.import.start') }}">
                    <span class="inline-block">Import <sup class="text-xs font-medium px-1 bg-yellow-400 text-amber-900 rounded">BETA</sup></span>
                </a>
                <a href="{{ route('podcast.create') }}"
                    class="btn-link"
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
                    <button wire:click="goto({{$podcast->id}})" class="col-span-4 sm:col-span-2 md:col-span-1 w-full text-left">
                        @if ($podcast->cover)
                            <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-full aspect-square rounded-lg object-center object-cover">
                        @else
                            <div class="w-full aspect-square rounded-lg bg-indigo-100 flex items-center justify-center">
                                <img src="{{ asset('logo-mark-dark.svg') }}" alt="{{ $podcast->name }}" class="w-16 h-auto">
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
