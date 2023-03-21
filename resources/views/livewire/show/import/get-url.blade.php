<div>
    <div class="py-12 max-w-3xl mx-auto">
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
