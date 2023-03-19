<div>
    <div class="px-4 sm:px-6 lg:px-0 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <h1 class="text-4xl font-bold">Podcasts</h1>
            @livewire('show.search')
        </div>
        @can('create_podcasts')
            <div class="flex items-center gap-4">
                <a href="{{ route('show.import.start') }}">
                    <span class="hidden md:inline-block">Import</span>
                    <span class="inline-block md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                        </svg>
                    </span>
                </a>
                @livewire('show.create')
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
            <div class="w-full">
                @forelse ($podcasts as $podcast)
                    <a href="{{ route('show', ['show' => $podcast->id]) }}" @class([
                        'flex items-center space-x-6 bg-white border border-slate-200 rounded-lg',
                        'mt-4' => !$loop->first
                    ])>
                        @if ($podcast->cover)
                            <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="h-40 w-40 rounded-l-lg object-center object-cover">
                        @else
                            <div class="h-40 w-40 rounded-l-lg bg-blue-50 flex items-center justify-center">
                                <img src="{{ asset('logo-mark.svg') }}" alt="{{ $podcast->name }}" class="w-12 h-auto">
                            </div>
                        @endif
                        <div class="">
                            <h2 class="mt-4 sm:mt-0 text-xl lg:text-2xl font-bold">{{ $podcast->name }}</h2>
                            <p class="text-sm font-medium text-slate-600">By {{ $podcast->author }}</p>
                            <p class="text-sm font-medium text-slate-600">Episodes: {{ $podcast->episodes->count() }}</p>
                        </div>
                    </a>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <div class="py-12"></div>
</div>
