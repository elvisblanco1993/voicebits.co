<div>
    <x-jet-button wire:click="$toggle('modal')">
        <span class="inline-block md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>
        <span class="hidden md:inline-block">
            New show
        </span>
    </x-jet-button>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <div class="text-2xl font-semibold">Create show</div>
                <p class="mt-2 text-slate-600 text-base">Before you can start adding episodes, you just need to fill in a few things. (You can always change these later.)</p>
        </x-slot>
        <x-slot name="content">
            <div>
                <x-jet-label for="name" value="Podcast name" />
                <x-jet-input type="text" id="name" wire:model="name" class="mt-1 w-full"/>
                <x-jet-input-error for="name" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="description" value="Podcast description" />
                <textarea wire:model="description" id="description" rows="6" class="input"></textarea>
                <x-jet-input-error for="description" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="category" value="Podcast category" />
                <select wire:model="category" id="category" class="input">
                    @include('layouts.partials.podcast-categories')
                </select>
                <x-jet-input-error for="category" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="language" value="Podcast language" />
                <select wire:model="language" id="language" class="input">
                    @include('layouts.partials.podcast-languages')
                </select>
                <x-jet-input-error for="language" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="type" value="Podcast type" />
                <select wire:model="type" id="type" class="input">
                    <option value="" disabled="">Choose one option...</option>
                    <option value="serial">Serial</option>
                    <option value="episodic">Episodic</option>
                </select>
                <x-jet-input-error for="type" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="timezone" value="Publishing timezone" />
                <select wire:model="timezone" id="timezone" class="input">
                    @include('layouts.partials.timezones-list')
                </select>
                <x-jet-input-error for="timezone" class="text-sm text-red-600 mt-2"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="author" value="Podcast author" />
                <x-jet-input type="text" id="author" wire:model="author" class="mt-1 w-full"/>
                <x-jet-input-error for="author" class="text-sm text-red-600 mt-2"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modal')">{{ __("Nevermind") }}</x-jet-secondary-button>
            <x-jet-button wire:click="save" class="ml-4">{{ __("Create show") }}</x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
