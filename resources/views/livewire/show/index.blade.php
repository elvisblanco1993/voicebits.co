<div>
    <div class="px-4 sm:px-6 lg:px-0 flex items-center justify-between">
        <h1 class="text-4xl font-bold">Podcasts</h1>
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
        <x-jet-input type="text" wire:model="search" placeholder="Search by name" class="w-full md:w-1/2"/>
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
            <div class="grid grid-cols-4 gap-4">
                @forelse ($podcasts as $podcast)
                    <a href="{{ route('show', ['show' => $podcast->id]) }}" class="col-span-4 md:col-span-2 lg:col-span-1 p-2 rounded-lg border border-slate-100 hover:border-slate-300 transition-all">
                        @if ($podcast->cover)
                            <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-full aspect-video md:aspect-square object-center object-cover rounded-lg">
                        @else
                            <div class="w-full aspect-video sm:aspect-square bg-blue-100 flex items-center justify-center rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 md:w-16 h-20 md:h-16 text-[#0099ff]" fill="currentColor" class="bi bi-soundwave" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8.5 2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-1 0v-11a.5.5 0 0 1 .5-.5zm-2 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm-6 1.5A.5.5 0 0 1 5 6v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm8 0a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm-10 1A.5.5 0 0 1 3 7v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5zm12 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V7a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </div>
                        @endif
                        <h2 class="mt-4 sm:mt-0 text-lg lg:text-base font-bold">{{ $podcast->name }}</h2>
                        <p class="text-xs font-medium text-slate-600">By {{ $podcast->author }}</p>
                    </a>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
