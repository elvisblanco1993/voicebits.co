<div>
    <div class="py-12 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-4xl font-bold">Is this your podcast?</div>
        <p class="mt-2 text-base font-normal">We will send you a magic link to the email listed below to confirm your ownership or this podcast.</p>
        <div class="mt-4 sm:flex items-center space-x-6">
            <img src="{{ $podcast->cover }}" alt="{{ $podcast->name }}" class="w-44 h-44 object-center object-cover">
            <div class="">
                <p class="mt-2 text-2xl font-semibold text-black">{{ $podcast->name }}</p>
                <p class="mt-2">Host: {{ $podcast->owner_name }}</p>
                <p class="mt-1">Email: {{ $podcast->owner_email }}</p>
            </div>
        </div>
        @if (!session()->has('message'))
            <div class="mt-6">
                <x-button wire:click="save">Send me the magic link</x-button>
            </div>
        @else
            <div class="mt-4">
                <div class="inline-block px-4 py-2 bg-green-200 rounded-lg border border-green-400 text-green-800 text-sm">{{ session()->get('message') }}</div>
                <button wire:click="save" class="mt-4 block text-xs underline text-slate-600">Re-send magic link</button>
            </div>
        @endif
    </div>
</div>
