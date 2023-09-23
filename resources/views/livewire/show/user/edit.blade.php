<div>
    <button wire:click="$toggle('modal')" title="Edit user" class="text-slate-600 hover:text-indigo-600 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
        </svg>
    </button>

    <x-dialog-modal wire:model.live="modal">
        <x-slot name="title">{{ __("Edit User Permissions") }}</x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <div class="grid grid-cols-4 gap-2 mt-2">
                    @forelse ($podcast_permissions as $permission => $val)
                        <div class="col-span-1">
                            <label for="{{$val}}" class="mt-2 flex items-center">
                                <x-input type="checkbox" name="permissions" wire:model.live="permissions" id="{{$val}}" value="{{$val}}" />
                                <span class="text-sm ml-2">{{ Str::ucfirst(str_replace('_', ' ', $val)) }}</span>
                            </label>
                        </div>
                    @empty
                    @endforelse
                </div>
                <x-input-error for="permissions" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">Cancel</x-secondary-button>
            <x-button wire:click="save" class="ml-4">Update Permissions</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
