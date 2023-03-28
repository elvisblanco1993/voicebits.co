<div>
    <div class="max-w-7xl mx-auto h-44 bg-center bg-cover" style="background-image: url('{{ asset($podcast->cover) }}') ">
        <div class="h-full flex items-center bg-slate-900/60 backdrop-blur-xl px-4 sm:px-6 lg:px-8">
            @if ($podcast->cover)
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-24 aspect-square rounded-xl object-center object-cover">
            @else
                <div class="h-24 w-24 rounded-xl bg-teal-50 flex items-center justify-center">
                    <img src="{{ asset('logo-mark.svg') }}" alt="{{ $podcast->name }}" class="w-10 h-auto">
                </div>
            @endif
            <h1 class="ml-6 text-3xl font-bold text-white">{{ $podcast->name }}</h1>
        </div>
    </div>
    @livewire('submenu')
    <div class="py-6">
        <div class="text-2xl font-bold">Social media</div>
        <div class="mt-4 pt-8 w-full bg-white rounded-lg shadow">
            <div class="grid grid-cols-3 px-8">
                <x-label for="twitter" value="Twitter" class="col-span-3 md:col-span-1"/>
                <x-input id="twitter" type="url" wire:model="twitter" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-label for="instagram" value="Instagram" class="col-span-3 md:col-span-1"/>
                <x-input id="instagram" type="url" wire:model="instagram" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-label for="facebook" value="Facebook"/>
                <x-input id="facebook" type="url" wire:model="facebook" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-label for="linkedin" value="Linkedin"/>
                <x-input id="linkedin" type="url" wire:model="linkedin" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-label for="pinterest" value="Pinterest"/>
                <x-input id="pinterest" type="url" wire:model="pinterest" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-label for="youtube" value="Youtube"/>
                <x-input id="youtube" type="url" wire:model="youtube" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-label for="vimeo" value="Vimeo"/>
                <x-input id="vimeo" type="url" wire:model="vimeo" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>
            <div class="mt-6 grid grid-cols-3 px-8">
                <x-label for="medium" value="Medium"/>
                <x-input id="medium" type="url" wire:model="medium" pattern="https://.*" class="col-span-3 md:col-span-2 w-full truncate"/>
            </div>

            <div class="mt-6 bg-slate-100 px-8 py-4 flex items-center justify-end">
                <x-button wire:click="save">Save changes</x-button>
            </div>
        </div>
    </div>
</div>
