<div class="relative">
    <div class="pt-16 pb-12 sm:pb-4 lg:pt-12">
        <div class="lg:px-8">
            <div class="lg:max-w-4xl">
                <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                    <h1 class="text-2xl font-bold leading-7 text-slate-900">Episodes</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="divide-y divide-slate-100 sm:mt-4 lg:mt-8 lg:border-t lg:border-slate-100">
        @forelse ($podcast->episodes as $episode)
            <article class="py-10 sm:py-12">
                <div class="lg:px-8">
                    <div class="lg:max-w-4xl">
                        <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:px-0">
                            <div class="flex flex-col items-start">
                                <h2 class="mt-2 text-lg font-bold text-slate-900">
                                    <a href="/">Episode title</a>
                                </h2>
                                <time class="order-first font-mono text-sm leading-7 text-slate-500" datetime="">July 11, 1993</time>
                                <p class="mt-1 text-base leading-7 text-slate-700">Description</p>
                                <div class="mt-4 flex items-center gap-4">
                                    <button id="{{ $episode->guid }}" onclick="play('{{ $episode->guid }}')" class="flex items-center text-sm font-bold leading-6 text-pink-500 hover:text-pink-700 active:text-pink-900">
                                        <svg aria-hidden="true" viewBox="0 0 10 10" fill="none" class="h-2.5 w-2.5 fill-current"><path d="M8.25 4.567a.5.5 0 0 1 0 .866l-7.5 4.33A.5.5 0 0 1 0 9.33V.67A.5.5 0 0 1 .75.237l7.5 4.33Z"></path></svg>
                                        <span class="ml-3" aria-hidden="true">Listen</span>
                                    </button>
                                    <span class="text-sm font-bold text-slate-400" aria-hidden="true">/</span>
                                    <a href="" class="flex items-center text-sm font-bold leading-6 text-pink-500 hover:text-pink-700 active:text-pink-900" aria-label="Show notes for episode: {{ $episode->title }}">Show notes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        @empty
        @endforelse
    </div>
</div>
