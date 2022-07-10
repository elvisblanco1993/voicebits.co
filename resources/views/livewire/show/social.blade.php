<div>
    <div class="my-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('layouts.podcast-menu')
        <div class="mt-10 flex items-center justify-between">
            <div class="text-xl font-bold">Social media</div>
            <x-jet-button wire:click="save">Save changes</x-jet-button>
        </div>

        <div class="mt-4 w-full bg-white rounded-lg shadow p-8">
            <div>
                <x-jet-label for="twitter" value="Twitter"/>
                <x-jet-input id="twitter" type="url" wire:model="twitter" pattern="https://.*" class="mt-1 w-full truncate"/>
                <x-jet-input-error for="twitter" />
            </div>
            <div class="mt-8">
                <x-jet-label for="instagram" value="Instagram"/>
                <x-jet-input id="instagram" type="url" wire:model="instagram" pattern="https://.*" class="mt-1 w-full truncate"/>
                <x-jet-input-error for="instagram" />
            </div>
            <div class="mt-8">
                <x-jet-label for="facebook" value="Facebook"/>
                <x-jet-input id="facebook" type="url" wire:model="facebook" pattern="https://.*" class="mt-1 w-full truncate"/>
                <x-jet-input-error for="facebook" />
            </div>
            <div class="mt-8">
                <x-jet-label for="linkedin" value="Linkedin"/>
                <x-jet-input id="linkedin" type="url" wire:model="linkedin" pattern="https://.*" class="mt-1 w-full truncate"/>
                <x-jet-input-error for="linkedin" />
            </div>
            <div class="mt-8">
                <x-jet-label for="pinterest" value="Pinterest"/>
                <x-jet-input id="pinterest" type="url" wire:model="pinterest" pattern="https://.*" class="mt-1 w-full truncate"/>
                <x-jet-input-error for="pinterest" />
            </div>
            <div class="mt-8">
                <x-jet-label for="youtube" value="Youtube"/>
                <x-jet-input id="youtube" type="url" wire:model="youtube" pattern="https://.*" class="mt-1 w-full truncate"/>
                <x-jet-input-error for="youtube" />
            </div>
            <div class="mt-8">
                <x-jet-label for="vimeo" value="Vimeo"/>
                <x-jet-input id="vimeo" type="url" wire:model="vimeo" pattern="https://.*" class="mt-1 w-full truncate"/>
                <x-jet-input-error for="vimeo" />
            </div>
            <div class="mt-8">
                <x-jet-label for="medium" value="Medium"/>
                <x-jet-input id="medium" type="url" wire:model="medium" pattern="https://.*" class="mt-1 w-full truncate"/>
                <x-jet-input-error for="medium" />
            </div>
        </div>
    </div>
</div>
