<div>
    <div class="my-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('layouts.podcast-menu')

        <div class="mt-10">
            <div class="text-xl font-bold">Podcast Website</div>
            <p class="text-base text-slate-600 font-medium">Select a template for your podcast website.</p>

            <div class="mt-4 grid grid-cols-4 gap-8">
                <div class="col-span-4 sm:col-span-2 md:col-span-1">
                    <label for="modern" wire:click="setTemplate">
                        <div class="h-32 sm:h-64 w-full rounded-lg border flex items-center justify-center border-slate-200 cursor-pointer hover:bg-slate-50">
                            <span>Modern</span>
                            @if ($template === 'modern')
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </div>
                        <input type="radio" name="template" id="modern" value="modern" wire:model="template" class="sr-only">
                    </label>
                </div>
                <div class="col-span-4 sm:col-span-2 md:col-span-1">
                    <label for="big-square" wire:click="setTemplate">
                        <div class="h-32 sm:h-64 w-full rounded-lg border flex items-center justify-center border-slate-200 cursor-pointer hover:bg-slate-50">
                            <span>Big Square</span>
                            @if ($template === 'big-square')
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </div>
                        <input type="radio" name="template" id="big-square" value="big-square" wire:model="template" class="sr-only">
                    </label>
                </div>
                <div class="col-span-4 sm:col-span-2 md:col-span-1">
                    <label for="classic" wire:click="setTemplate">
                        <div class="h-32 sm:h-64 w-full rounded-lg border flex items-center justify-center border-slate-200 cursor-pointer hover:bg-slate-50">
                            <span>Classic</span>
                            @if ($template === 'classic')
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </div>
                        <input type="radio" name="template" id="classic" value="classic" wire:model="template" class="sr-only">
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
            <div class="text-xl font-bold">Customise template</div>
            <x-jet-button wire:click="save">Save changes</x-jet-button>
        </div>

        <div class="mt-4 w-full rounded-lg border border-slate-200 p-8">
            <div class="grid grid-cols-3 gap-8">
                <div class="col-span-3 sm:col-span-1">
                    <div class="flex items-center gap-2">
                        <div class="flex-none w-10 h-10 rounded-full" style="background-color: {{ $header_background }}"></div>
                        <label for="header_background" class="text-sm cursor-pointer">
                            <input type="color" class="sr-only" id="header_background" wire:model="header_background">
                            Header background color
                        </label>
                    </div>
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <div class="flex items-center gap-2">
                        <div class="flex-none w-10 h-10 rounded-full" style="background-color: {{ $header_text_color }}"></div>
                        <label for="header_text_color" class="text-sm cursor-pointer">
                            <input type="color" class="sr-only" id="header_text_color" wire:model="header_text_color">
                            Header text color
                        </label>
                    </div>
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <div class="flex items-center gap-2">
                        <div class="flex-none w-10 h-10 rounded-full" style="background-color: {{ $header_link_color }}"></div>
                        <label for="header_link_color" class="text-sm cursor-pointer">
                            <input type="color" class="sr-only" id="header_link_color" wire:model="header_link_color">
                            Header links color
                        </label>
                    </div>
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <div class="flex items-center gap-2">
                        <div class="flex-none w-10 h-10 rounded-full" style="background-color: {{ $body_background }}"></div>
                        <label for="body_background" class="text-sm cursor-pointer">
                            <input type="color" class="sr-only" id="body_background" wire:model="body_background">
                            Body background color
                        </label>
                    </div>
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <div class="flex items-center gap-2">
                        <div class="flex-none w-10 h-10 rounded-full" style="background-color: {{ $body_text_color }}"></div>
                        <label for="body_text_color" class="text-sm cursor-pointer">
                            <input type="color" class="sr-only" id="body_text_color" wire:model="body_text_color">
                            Body text color
                        </label>
                    </div>
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <div class="flex items-center gap-2">
                        <div class="flex-none w-10 h-10 rounded-full" style="background-color: {{ $body_link_color }}"></div>
                        <label for="body_link_color" class="text-sm cursor-pointer">
                            <input type="color" class="sr-only" id="body_link_color" wire:model="body_link_color">
                            Body links color
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
