<div>
    <button wire:click="$toggle('modal')" class="flex items-center text-slate-500 hover:text-amber-500 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.925A1.5 1.5 0 005.135 9.25h6.115a.75.75 0 010 1.5H5.135a1.5 1.5 0 00-1.442 1.086l-1.414 4.926a.75.75 0 00.826.95 28.896 28.896 0 0015.293-7.154.75.75 0 000-1.115A28.897 28.897 0 003.105 2.289z" />
        </svg>
    </button>
    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
            <div class="flex items-start space-x-3">
                <div class="mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-amber-100 sm:mx-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-amber-600">
                        <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                    </svg>
                </div>
                <div>
                    <div>Send Podcast Link</div>
                    <div class="block text-sm font-normal">{{ $subscriber->email }}</div>
                </div>
            </div>
        </x-slot>
        <x-slot name="content"></x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>
