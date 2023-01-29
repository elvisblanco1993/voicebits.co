<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
        @include('layouts.podcast-menu')
        <div class="mt-6 text-xl font-bold">Social media</div>

        <div class="mt-4 pt-8 w-full bg-white rounded-lg shadow">
            <div class="grid grid-cols-3 px-8">
                <x-jet-label for="twitter" value="Twitter" class="col-span-3 md:col-span-1"/>
                <x-jet-input id="twitter" type="url" wire:model="twitter" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-jet-label for="instagram" value="Instagram" class="col-span-3 md:col-span-1"/>
                <x-jet-input id="instagram" type="url" wire:model="instagram" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-jet-label for="facebook" value="Facebook"/>
                <x-jet-input id="facebook" type="url" wire:model="facebook" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-jet-label for="linkedin" value="Linkedin"/>
                <x-jet-input id="linkedin" type="url" wire:model="linkedin" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-jet-label for="pinterest" value="Pinterest"/>
                <x-jet-input id="pinterest" type="url" wire:model="pinterest" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-jet-label for="youtube" value="Youtube"/>
                <x-jet-input id="youtube" type="url" wire:model="youtube" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-jet-label for="vimeo" value="Vimeo"/>
                <x-jet-input id="vimeo" type="url" wire:model="vimeo" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-jet-label for="medium" value="Medium"/>
                <x-jet-input id="medium" type="url" wire:model="medium" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>

            <div class="mt-6 bg-slate-200 px-8 py-4 flex items-center justify-end">
                <x-jet-button wire:click="save">Save changes</x-jet-button>
            </div>
        </div>
    </div>
</div>
