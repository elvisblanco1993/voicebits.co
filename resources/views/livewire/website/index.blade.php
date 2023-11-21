<div>
    @livewire('submenu')

    <div class="py-6">
        <div class="text-2xl font-bold">Website</div>
        <p class="text-base text-slate-600 font-medium">Select a template for your podcast website.</p>

        <div class="py-6 grid grid-cols-4 gap-8">
            {{-- <label wire:click="setTemplate" for="classic" class="col-span-4 md:col-span-2 lg:col-span-1 bg-white rounded-xl border">
                <img src="https://images.unsplash.com/photo-1530564386-40be0e9dea6f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="Classic theme image" class="w-full aspect-video object-cover object-center rounded-t-xl">
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-slate-600 dark:text-slate-700">Classic</p>
                        <input type="radio" name="template" id="classic" value="classic" wire:model.live="template" class="">
                    </div>
                    <div class="mt-2 text-sm text-slate-600">
                        The original Voicebits theme. Includes a full width player.
                    </div>
                </div>
            </label>

            <label wire:click="setTemplate" for="modern" class="col-span-4 md:col-span-2 lg:col-span-1 bg-white rounded-xl border">
                <img src="{{ asset('modern-podcast.webp') }}" alt="Modern theme image" class="w-full aspect-video object-cover object-center rounded-t-xl">
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-slate-600 dark:text-slate-700">Modern</p>
                        <input type="radio" name="template" id="modern" value="modern" wire:model.live="template" class="">
                    </div>
                    <div class="mt-2 text-sm text-slate-600">
                        Refreshed template with top slim player.
                    </div>
                </div>
            </label> --}}

            <label wire:click="setTemplate" for="edges" class="col-span-4 md:col-span-2 lg:col-span-1 bg-white rounded-xl border">
                <img src="{{ asset('edges-template.png') }}" alt="Edges theme image" class="w-full aspect-video object-cover object-center rounded-t-xl">
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <p class="text-xl font-bold text-slate-600 dark:text-slate-700">Edges</p>
                        <input type="radio" name="template" id="edges" value="edges" wire:model.live="template" class="">
                    </div>
                    <div class="mt-2 text-sm text-slate-600">
                        Fresh and simple podcast template.
                    </div>
                </div>
            </label>
        </div>

        <div class="my-6 border-t"></div>

        <div class="py-6">
            <div class="text-xl font-bold">Colors</div>
            <div class="mt-4 grid grid-cols-3 gap-8">
                <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                    <label for="header_background" style="background-color: {{$header_background}}" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                        <input type="color" name="header_background" id="header_background" wire:model.live="header_background" wire:change="save" class="sr-only">
                    </label>
                    <div>
                        <p class="text-lg font-bold">{{__("Header background")}}</p>
                        <p class="text-sm">{{__("Main background color of the header")}}</p>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="header_text_color" style="background-color: {{$header_text_color}}" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="header_text_color" id="header_text_color" wire:model.live="header_text_color" wire:change="save" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">{{__("Header text color")}}</p>
                            <p class="text-sm">{{__("Custom colors for the text in the header.")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="header_link_color" style="background-color: {{$header_link_color}}" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="header_link_color" id="header_link_color" wire:model.live="header_link_color" wire:change="save" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">{{__("Header link color")}}</p>
                            <p class="text-sm">{{__("Custom colors for the links in the header.")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="body_background" style="background-color: {{$body_background}}" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="body_background" id="body_background" wire:model.live="body_background" wire:change="save" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">{{__("Body background")}}</p>
                            <p class="text-sm">{{__("Main background color of the page body")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="body_text_color" style="background-color: {{$body_text_color}}" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="body_text_color" id="body_text_color" wire:model.live="body_text_color" wire:change="save" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">{{__("Body text color")}}</p>
                            <p class="text-sm">{{__("Custom colors for the text in the body.")}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <div class="col-span-3 md:col-span-1 flex items-center space-x-4">
                        <label for="body_link_color" style="background-color: {{$body_link_color}}" class="shadow color-label inline-flex items-center h-12 aspect-square rounded-full cursor-pointer">
                            <input type="color" name="body_link_color" id="body_link_color" wire:model="body_link_color" wire:change="save" class="sr-only">
                        </label>
                        <div>
                            <p class="text-lg font-bold">{{__("Body link color")}}</p>
                            <p class="text-sm">{{__("Custom colors for the link in the body.")}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-6 border-t"></div>

        <div class="py-6">
            <div class="text-xl font-bold">Custom styles</div>
            <textarea wire:model="custom_styles" cols="30" rows="10" class="mt-4 input" placeholder="You can include custom CSS here to replace any stiles in your page."></textarea>
            <div class="mt-4 flex justify-end">
                <x-button wire:click="save">Save changes</x-button>
            </div>
        </div>

    </div>
</div>
