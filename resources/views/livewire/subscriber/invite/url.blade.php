<div>
    <div class="max-w-3xl mx-auto py-12 lg:py-24 px-4 sm:px-6 lg:px-8 text-center">
        @if ($podcast->cover)
            <img src="{{ asset($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-16 h-16 md:w-24 md:h-24 mx-auto rounded-md aspect-square">
        @endif
        <h1 class="mt-3 text-2xl font-extrabold text-slate-700">{{ $podcast->name }}</h1>
        <p class="mt-1 text-sm text-slate-700">by <span class="font-bold">{{ $podcast->author }}</span></p>

        <div class="mt-6 px-4 py-8 bg-white shadow rounded-lg">
            @if ($status === 'success')
                <div class="flex items-center justify-center w-16 h-16 mx-auto rounded-full aspect-square bg-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-emerald-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="mt-4 text-xl font-bold text-slate-700">You are subscribed</h2>
                <p class="mt-1 text-sm text-slate-700 max-w-lg mx-auto">Check your inbox and add this podcast to your preferred player to start enjoying it today.</p>
            @elseif($status === 'failed')
                <div class="flex items-center justify-center w-16 h-16 mx-auto rounded-full aspect-square bg-amber-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-amber-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <h2 class="mt-4 text-xl font-bold text-slate-700">Oops! Something went wrong.</h2>
                <p class="mt-1 text-sm text-slate-700 max-w-lg mx-auto">Please try again or contact support for assistance.</p>
            @else
                <h2 class="text-xl font-bold text-slate-700">Join this Podcast</h2>
                <p class="mt-1 text-sm text-slate-700 max-w-lg mx-auto">You're invited to join this exclusive podcast. Input your email below, and we'll send you a link to your personalized podcast page.</p>
                <form wire:submit.prevent="save" class="mt-6">
                    @csrf
                    <label for="email" class="text-sm font-medium text-slate-800">Enter your email address</label>
                    <x-input id="email" wire:model="email" class="mt-1 w-2/3 mx-auto text-center" />
                    <x-input-error for="email" />

                    <x-button class="mt-4">Save and subscribe</x-button>
                </form>
            @endif
        </div>
    </div>
</div>
