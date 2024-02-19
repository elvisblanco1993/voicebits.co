<div>
    <div class="py-12 max-w-3xl mx-auto">
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
            <h3 class="text-center font-bold">OR</h3>
        @endif

        <div class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path fill-rule="evenodd" d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.25 6a.75.75 0 0 0-1.5 0v4.94l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V9.75Z" clip-rule="evenodd" />
            </svg>
            <h1 class="text-3xl font-bold">{{ __("Import podcast") }}</h1>
        </div>
        <div class="mt-2 text-base font-normal">{{ __("Paste your current feed's URL here to get started.") }}</div>

        <x-input type="url" id="url" wire:model.live="url" class="mt-4 w-full" placeholder="https://" />
        <x-input-error for="url" class="mt-1"/>

        <x-button wire:click="save" class="mt-4">Start importing my show</x-button>
    </div>
</div>
