<div>
    <x-button class="-my-2" wire:click="$toggle('modal')">
        Invite User
    </x-button>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title">{{ __("Invite User") }}</x-slot>
        <x-slot name="content">
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" wire:model="email" :value="old('email')" required placeholder="jdoe@acme.com" />
                <x-input-error for="email" />
            </div>
            <div class="mt-4">
                <x-label for="permissions" value="{{ __('Permissions') }}" />
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
                <x-input-error for="permissions" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">Cancel</x-secondary-button>
            <x-button wire:click="invite" class="ml-4">Send invitation</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
