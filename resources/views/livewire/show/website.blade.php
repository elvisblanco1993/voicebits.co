<div>
    @include('layouts.podcast-menu')

    <div class="mt-6 text-xl font-bold">Podcast Website</div>
    <div class="mt-4">
        <p class="text-base text-slate-600 font-medium">Select a template for your podcast website.</p>

        <div class="mt-4 grid grid-cols-4 gap-8">
            <div class="col-span-4 sm:col-span-2 md:col-span-1">
                <label for="modern" wire:click="setTemplate" >
                    <div class="w-full aspect-video md:aspect-square rounded-lg border flex items-center justify-center border-slate-200 cursor-pointer hover:bg-slate-50">
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
                    <div class="w-full aspect-video md:aspect-square rounded-lg border flex items-center justify-center border-slate-200 cursor-pointer hover:bg-slate-50">
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
                    <div class="w-full aspect-video md:aspect-square rounded-lg border flex items-center justify-center border-slate-200 cursor-pointer hover:bg-slate-50">
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
    <div class="py-12"></div>
</div>
