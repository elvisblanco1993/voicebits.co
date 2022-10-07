<div>
    <p class="text-red-700">Delete this episode from Voicebits. This action cannot be undone.</p>
    <x-jet-danger-button wire:click="$toggle('modal')" class="mt-4">Delete Episode</x-jet-danger-button>

    <x-jet-confirmation-modal wire:model="modal">
        <x-slot name="title">Are you absolutely sure?</x-slot>
        <x-slot name="content">
            <p>You are trying to delete your episode <strong>{{$episode->title}}</strong>. This action cannot be undone, so please make sure you download all your data before proceeding.</p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modal')">Cancel</x-jet-secondary-button>
            <button wire:click="delete" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition ml-4" >Delete Episode</button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
