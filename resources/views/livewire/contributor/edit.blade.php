<div>
    <button wire:click="$toggle('modal')" class="text-xs tracking-wider font-medium text-slate-600 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
        </svg>
    </button>

    <x-dialog-modal wire:model="modal">
        <x-slot name="title"></x-slot>
        <x-slot name="content">
            <div class="">
                <div class="">
                    <x-label>Full Name <span class="text-red-500">*</span></x-label>
                    <x-input type="text" id="name" wire:model="name" class="mt-1 w-full" />
                    <x-input-error for="name" />
                </div>
                <div class="mt-4">
                    <x-label>A Short Bio <span class="text-red-500">*</span></x-label>
                    <x-input type="text" id="bio" wire:model="bio" class="mt-1 w-full" />
                    <x-input-error for="bio" />
                </div>
                <div class="mt-4">
                    <x-label for="role">Role <span class="text-red-500">*</span></x-label>
                    <select id="role" class="input" wire:model="role">
                        <option value="Host">Host</option>
                        <option value="Producer">Producer</option>
                        <option value="Editor">Editor</option>
                        <option value="Writer">Writer</option>
                        <option value="Designer">Designer</option>
                        <option value="Guest">Guest</option>
                    </select>
                    <x-input-error for="role" />
                </div>
                <div class="mt-4">
                    <x-label>Website</x-label>
                    <x-input type="text" id="website" wire:model="website" class="mt-1 w-full" />
                </div>
                <div class="mt-4">
                    <x-label>Instagram URL</x-label>
                    <x-input type="text" id="instagram" wire:model="instagram" class="mt-1 w-full" />
                </div>
                <div class="mt-4">
                    <x-label>Twitter URL</x-label>
                    <x-input type="text" id="twitter" wire:model="twitter" class="mt-1 w-full" />
                </div>
                <div class="mt-6 grid grid-cols-3 gap-8 items-center">
                    <div class="col-span-3 md:col-span-1">
                        @if($contributor->avatar && !$avatar)
                            <img src="{{ asset($contributor->avatar) }}" class="w-full rounded-full shadow aspect-square object-center object-cover border-8 border-violet-300">
                        @elseif ($avatar)
                            <img src="{{ $avatar->temporaryUrl() }}" class="w-full rounded-full shadow aspect-square object-center object-cover border-8 border-violet-300">
                        @else
                            <div class="flex-none w-full h-full aspect-square rounded-full bg-violet-100 flex items-center justify-center border-8 border-violet-300">
                                <img src="{{ asset('logo-mark-dark.svg') }}" class="w-16 h-auto">
                            </div>
                        @endif
                    </div>

                    <div class="col-span-3 md:col-span-2">
                        <div class="flex items-center">
                            <p class="text-sm font-boldblock font-medium text-gray-700">Avatar <span class="text-red-500">*</span></p>
                            @if ($avatar && !$avatar->temporaryUrl())
                                <button wire:click="removeArtwork" class="ml-3 text-sm text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                        <label for="avatar" class="mt-1 text-sm flex items-center space-x-4 w-full border-2 border-slate-200 border-dashed p-4 rounded-md relative cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                            </svg>
                            <p class="text-slate-600">Upload a square picture of this person. Ideal resolution is 450x450 px.</p>
                            <input type="file" wire:model="avatar" id="avatar" accept="image/jpeg,image/png" class="sr-only absolute inset-0">
                        </label>
                        <x-input-error for="avatar"/>
                    </div>
                </div>
                <div class="mt-4">
                    <x-label class="flex items-center space-x-3">
                        <x-input type="checkbox" wire:model="is_default" />
                        <span>{{__("Make this a default person on the show, and every new episodes.")}}</span>
                    </x-label>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')">{{__("Cancel")}}</x-secondary-button>
            <x-button wire:click="save" class="ml-4">Save changes</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
