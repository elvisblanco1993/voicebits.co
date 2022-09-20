<div>
    <x-jet-button class="-my-2" wire:click="$toggle('modal')">
        Invite User
    </x-jet-button>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">{{ __("Invite User") }}</x-slot>
        <x-slot name="content">
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model="email" :value="old('email')" required placeholder="jdoe@acme.com" />
                <x-jet-input-error for="email" />
            </div>
            <div class="mt-4">
                <x-jet-label for="permissions" value="{{ __('Permissions') }}" />
                <div class="grid grid-cols-3 gap-2 mt-2">
                    @forelse ($podcast_permissions as $permission => $val)
                        <div class="col-span-1">
                            <label for="{{$val}}" class="mt-2 flex items-center">
                                <input type="checkbox" name="permissions" wire:model="permissions" id="{{$val}}" value="{{$val}}">
                                <span class="text-sm ml-2">{{ str_replace('_', ' ', $val) }}</span>
                            </label>
                        </div>
                    @empty

                    @endforelse
                </div>
                <x-jet-input-error for="permissions" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modal')">Dismiss</x-jet-secondary-button>
            <x-jet-button wire:click="invite" class="ml-4">Send invitation</x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
