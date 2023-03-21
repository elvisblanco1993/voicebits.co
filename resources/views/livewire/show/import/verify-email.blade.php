<div>
    <div class="py-12 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-2xl font-bold">Is this your podcast?</div>
        <div class="mt-2 text-base font-normal max-w-xl mx-auto">We will send you a magic link to the email listed below to confirm your ownership or this podcast.</div>
        <div class="mt-4">
            <img src="{{ $podcast->cover }}" alt="{{ $podcast->name }}" class="w-44 h-44 mx-auto object-center object-cover">
            <p class="mt-2 text-base font-semibold text-black">{{ $podcast->name }}</p>
            <p class="mt-2 text-sm">{{ $podcast->owner_email }}</p>
        </div>
        @if (!session()->has('message'))
            <div class="mt-4 flex justify-center">
                <x-button wire:click="save">Send magic link</x-button>
            </div>
        @else
            <div class="mt-4">
                <div class="inline-block px-4 py-2 bg-green-200 rounded-lg border border-green-400 text-sm">{{ session()->get('message') }}</div>
                <button wire:click="save" class="block mx-auto text-xs px-4 py-2 underline text-slate-600">Re-send magic link</button>
            </div>
        @endif
    </div>
</div>
