<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-4">Frequently Asked Questions (FAQ)</h2>
    <div class="accordion">
        @forelse (config('voicebits.faq') as $faq)
            <div class="accordion-item border-t border-t-slate-200 p-4 cursor-pointer"
                x-data="{ isOpen: false }"
                :class="{'bg-gradient-to-tr from-teal-50 to-teal-100 dark:text-black': isOpen}"
                @click="isOpen = !isOpen"
                @click.outside="isOpen = false"
            >
                <div class="flex items-center justify-between">
                    <h3 class="flex-1 font-medium">{{ $faq['question'] }}</h3>
                    <div class="text-gray-500" :class="{ 'transform rotate-180': isOpen }">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M16.293 10.293L12 14.586l-4.293-4.293a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div x-show="isOpen" class="accordion-content mt-2" style="display: none;">
                    <p class="text-gray-700">{{ $faq['answer'] }}</p>
                </div>
            </div>
        @empty

        @endforelse
        {{-- You can add more faq in config.voicebits.faq --}}
    </div>
</div>
