<div>
    <div class="max-w-3xl mx-auto py-12 lg:py-24 px-4 sm:px-6 lg:px-8 text-center">
        @if ($subscriber->podcast->cover)
            <img src="{{ asset($subscriber->podcast->cover) }}" alt="{{ $subscriber->podcast->name }}" class="w-16 h-16 md:w-24 md:h-24 mx-auto rounded-md aspect-square">
        @endif
        <h1 class="mt-3 text-2xl font-extrabold text-slate-700">{{ $subscriber->podcast->name }}</h1>
        <p class="mt-1 text-sm text-slate-700">by <span class="font-bold">{{ $subscriber->podcast->author }}</span></p>

        <div class="mt-6 px-4 py-8 bg-white shadow rounded-lg">
            <div class="prose prose-blue">
                {{Illuminate\Mail\Markdown::parse($subscriber->podcast->description)}}
            </div>
            <div class="mt-4 border-t border-slate-300 w-44 mx-auto"></div>
            <div class="mt-4 max-w-prose text-slate-600 mx-auto">
                <p>Use the buttons below to confirm or decline your subscription to this private podcast.</p>

                <div class="mt-4 flex items-center justify-center space-x-4">
                    <x-secondary-button wire:click="$toggle('modal')">Decline</x-secondary-button>
                    <x-button wire:click="accept">Confirm</x-button>
                </div>

                <x-dialog-modal wire:model="modal">
                    <x-slot name="title" class="text-left">Are you sure you want to delete your subscription?</x-slot>
                    <x-slot name="content" class="text-left">This action will remove you from our subscriber's list forever.</x-slot>
                    <x-slot name="footer">
                        <x-secondary-button wire:click="$toggle('modal')">Dismiss</x-secondary-button>
                        <x-danger-button wire:click="decline" class="ml-4">Decline</x-danger-button>
                    </x-slot>
                </x-dialog-modal>
            </div>
        </div>
    </div>
</div>
