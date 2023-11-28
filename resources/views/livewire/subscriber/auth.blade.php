<div>
    <div class="max-w-md mx-auto py-12 lg:py-24 px-4 sm:px-6 lg:px-8 text-center">
        @if ($subscriber->podcast->cover)
            <img src="{{ route('public.podcast.cover', ['url' => $subscriber->podcast->url]) }}" alt="{{ $subscriber->podcast->name }}" class="w-16 h-16 md:w-24 md:h-24 mx-auto rounded-md aspect-square">
        @endif
        <h1 class="mt-3 text-2xl font-extrabold text-slate-700">{{ $subscriber->podcast->name }}</h1>
        <p class="mt-1 text-sm text-slate-700">by <span class="font-bold">{{ $subscriber->podcast->author }}</span></p>

        <div class="mt-6 px-4 py-8 bg-white shadow rounded-lg">
            <form wire:submit.prevent="authenticate" autocomplete="off">
                @csrf
                <x-label for="password">Enter your password</x-label>
                <x-input type="password" wire:model="password" class="mt-1 w-full mx-auto text-center" />
                <x-input-error for="password" class="mt-1 text-xs"/>

                <x-button type="submit" class="mt-4">Login to podcast -></x-button>
            </form>
        </div>
    </div>
</div>
