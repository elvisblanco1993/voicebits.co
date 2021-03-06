<div>
    <p class="text-red-700">In this section, you can delete your podcast from Voicebits. This action cannot be undone, so please make sure you download all your episodes before you delete your show.</p>
    <x-jet-danger-button wire:click="$toggle('modal')" class="mt-4">Delete Podcast</x-jet-danger-button>

    <x-jet-confirmation-modal wire:model="modal">
        <x-slot name="title">Are you absolutely sure?</x-slot>
        <x-slot name="content">
            <p>You are trying to delete your podcast <strong>{{$podcast->name}}</strong>. This action cannot be undone, so please make sure you download all your data before proceeding.</p>
            <p class="mt-2">Please type <strong>{{$podcast->url}}</strong> to confirm.</p>
            <x-jet-input type="text" wire:model="verify" class="mt-1 w-full"/>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modal')">Cancel</x-jet-secondary-button>
            <button wire:click="delete" @disabled(!$readyToDelete) class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition ml-4" >Delete Podcast</button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
