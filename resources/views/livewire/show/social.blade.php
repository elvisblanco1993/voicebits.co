<div>
    @livewire('submenu')
    <div class="py-6">
        <div class="text-2xl font-bold">Social media</div>
        <div class="mt-4 pt-8 w-full sm:w-2/3 bg-white rounded-lg shadow">
            <div class=" px-6">
                <x-label for="twitter" value="Twitter" class=""/>
                <x-input id="twitter" type="url" wire:model="twitter" pattern="https://.*" class="w-full"/>
            </div>
            <div class="mt-6 px-6">
                <x-label for="instagram" value="Instagram" class=""/>
                <x-input id="instagram" type="url" wire:model="instagram" pattern="https://.*" class="w-full"/>
            </div>
            <div class="mt-6 px-6">
                <x-label for="facebook" value="Facebook"/>
                <x-input id="facebook" type="url" wire:model="facebook" pattern="https://.*" class="w-full"/>
            </div>
            <div class="mt-6 px-6">
                <x-label for="linkedin" value="Linkedin"/>
                <x-input id="linkedin" type="url" wire:model="linkedin" pattern="https://.*" class="w-full"/>
            </div>
            <div class="mt-6 px-6">
                <x-label for="pinterest" value="Pinterest"/>
                <x-input id="pinterest" type="url" wire:model="pinterest" pattern="https://.*" class="w-full"/>
            </div>
            <div class="mt-6 px-6">
                <x-label for="youtube" value="Youtube"/>
                <x-input id="youtube" type="url" wire:model="youtube" pattern="https://.*" class="w-full"/>
            </div>
            <div class="mt-6 px-6">
                <x-label for="vimeo" value="Vimeo"/>
                <x-input id="vimeo" type="url" wire:model="vimeo" pattern="https://.*" class="w-full"/>
            </div>
            <div class="mt-6 px-6">
                <x-label for="medium" value="Medium"/>
                <x-input id="medium" type="url" wire:model="medium" pattern="https://.*" class="w-full"/>
            </div>

            <div class="mt-6 bg-slate-100 px-8 py-4 flex items-center justify-end">
                <x-button wire:click="save">Save changes</x-button>
            </div>
        </div>
    </div>
</div>
