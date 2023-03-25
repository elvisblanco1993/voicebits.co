<div>
    <div class="max-w-7xl mx-auto h-44 bg-center bg-cover" style="background-image: url('{{ asset($podcast->cover) }}') ">
        <div class="h-full flex items-center bg-slate-900/60 backdrop-blur-xl px-4 sm:px-6 lg:px-8">
            @if ($podcast->cover)
                <img src="{{ Storage::url($podcast->cover) }}" alt="{{ $podcast->name }}" class="w-24 aspect-square rounded-xl object-center object-cover">
            @else
                <div class="h-24 w-24 rounded-xl bg-purple-50 flex items-center justify-center">
                    <img src="{{ asset('logo-mark.svg') }}" alt="{{ $podcast->name }}" class="w-10 h-auto">
                </div>
            @endif
            <h1 class="ml-6 text-3xl font-bold text-white">{{ $podcast->name }}</h1>
        </div>
    </div>
    @livewire('submenu')
    <div class="py-6">
        <div class="text-2xl font-bold">Website</div>
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
</div>
