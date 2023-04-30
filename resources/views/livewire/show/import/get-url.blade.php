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

        <h1 class="text-3xl font-bold">Import podcast 🚀</h1>
        <div class="mt-2 text-base font-normal">Paste your current feed's URL here to get started.</div>

        <x-input type="url" id="url" wire:model="url" class="mt-4 w-full" placeholder="https://" />
        <x-input-error for="url"/>
        @if (session()->has('error'))
            <p class="text-sm text-red-600">{{ session()->get('error') }}</p>
        @endif
        <x-button wire:click="save" class="mt-4">Start importing my show</x-button>
    </div>
</div>
