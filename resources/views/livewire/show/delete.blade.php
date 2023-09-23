<div>
    <x-danger-button wire:click="$toggle('modal')">Delete Podcast</x-danger-button>

    <x-confirmation-modal wire:model.live="modal">
        <x-slot name="title">Delete podcast</x-slot>
        <x-slot name="content">
            <p>Are you sure you want to delete your podcast <strong>{{$podcast->name}}</strong>?. This action cannot be undone, so please make sure you download all your data before proceeding.</p>
            <p class="mt-2">Please type <strong>{{$podcast->url}}</strong> to confirm.</p>
            <x-input type="text" wire:model.live="verify" class="mt-1 w-full"/>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">Cancel</x-secondary-button>
            <button wire:click="delete" @disabled(!$readyToDelete) class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition ml-4" >Delete Podcast</button>
        </x-slot>
    </x-confirmation-modal>
</div>
