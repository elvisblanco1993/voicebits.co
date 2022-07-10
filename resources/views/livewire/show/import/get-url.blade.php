<div>
    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-2xl font-bold">Add your podcast to Voicebits</div>
        <div class="mt-2 text-base font-normal">To get started, enter the RSS feed URL below.</div>

        <x-jet-input type="url" id="url" wire:model="url" class="mt-4 w-1/2" placeholder="https://" />
        <x-jet-input-error for="url"/>
        @if (session()->has('error'))
            <p class="text-sm text-red-600">{{ session()->get('error') }}</p>
        @endif
        <div class="mt-4 flex justify-center">
            <x-jet-button wire:click="save">Submit</x-jet-button>
        </div>
    </div>
</div>
