<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-4">Frequently Asked Questions (FAQ)</h2>
    <div class="accordion">
        <div class="accordion-item border-t border-gray-300 px-4 py-2 cursor-pointer" x-data="{ isOpen: false }">
            <div class="flex items-center justify-between">
                <h3 class="flex-1 font-medium">What is Voicebits?</h3>
                <button @click="isOpen = !isOpen" class="text-gray-500" :class="{ 'transform rotate-180': isOpen }">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16.293 10.293L12 14.586l-4.293-4.293a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414z">
                        </path>
                    </svg>
                </button>
            </div>
            <div x-show="isOpen" class="accordion-content mt-2" style="display: none;">
                <p class="text-gray-700">
                    Voicebits is a podcast hosting platform that allows podcasters to
                    create, host, and distribute their content to a global audience. It
                    offers a user-friendly interface, robust features, and customizable
                    design options to make podcasting easy and accessible.
                </p>
            </div>
        </div>

        <div class="accordion-item border-t border-gray-300 px-4 py-2 cursor-pointer" x-data="{ isOpen: false }">
            <div class="flex items-center justify-between">
                <h3 class="flex-1 font-medium">Can I transfer my existing podcast to Voicebits?</h3>
                <button @click="isOpen = !isOpen" class="text-gray-500" :class="{ 'transform rotate-180': isOpen }">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16.293 10.293L12 14.586l-4.293-4.293a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414z">
                        </path>
                    </svg>
                </button>
            </div>
            <div x-show="isOpen" class="accordion-content mt-2" style="display: none;">
                <p class="text-gray-700">
                    Yes, you can easily transfer your existing podcast to Voicebits. Our platform provides step-by-step guidance on how to migrate your podcast from your current hosting provider to Voicebits without losing any of your content or subscribers.
                </p>
            </div>
        </div>

        <div class="accordion-item border-t border-gray-300 px-4 py-2 cursor-pointer" x-data="{ isOpen: false }">
            <div class="flex items-center justify-between">
                <h3 class="flex-1 font-medium">Is Voicebits suitable for beginner podcasters?</h3>
                <button @click="isOpen = !isOpen" class="text-gray-500" :class="{ 'transform rotate-180': isOpen }">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16.293 10.293L12 14.586l-4.293-4.293a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414z">
                        </path>
                    </svg>
                </button>
            </div>
            <div x-show="isOpen" class="accordion-content mt-2" style="display: none;">
                <p class="text-gray-700">
                    Absolutely! Voicebits is designed with podcasters of all levels in mind, including beginners. Our user-friendly interface and step-by-step guidance make it easy for anyone to create, host, and distribute their podcast content, even without prior technical experience.
                </p>
            </div>
        </div>

        <div class="accordion-item border-t border-gray-300 px-4 py-2 cursor-pointer" x-data="{ isOpen: false }">
            <div class="flex items-center justify-between">
                <h3 class="flex-1 font-medium">Can I track the performance of my podcast on Voicebits?</h3>
                <button @click="isOpen = !isOpen" class="text-gray-500" :class="{ 'transform rotate-180': isOpen }">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16.293 10.293L12 14.586l-4.293-4.293a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414z">
                        </path>
                    </svg>
                </button>
            </div>
            <div x-show="isOpen" class="accordion-content mt-2" style="display: none;">
                <p class="text-gray-700">
                    Yes, Voicebits provides simple but powerful analytics that give you real-time data on your podcast's performance, including downloads, listeners, and countries. This helps you understand your audience and make informed decisions to grow your podcast.
                </p>
            </div>
        </div>

        <div class="accordion-item border-t border-gray-300 px-4 py-2 cursor-pointer" x-data="{ isOpen: false }">
            <div class="flex items-center justify-between">
                <h3 class="flex-1 font-medium">Does Voicebits offer customer support?</h3>
                <button @click="isOpen = !isOpen" class="text-gray-500" :class="{ 'transform rotate-180': isOpen }">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16.293 10.293L12 14.586l-4.293-4.293a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414z">
                        </path>
                    </svg>
                </button>
            </div>
            <div x-show="isOpen" class="accordion-content mt-2" style="display: none;">
                <p class="text-gray-700">
                    Yes, we offer dedicated customer support to assist you with any questions or issues you may have. You can contact our support team through our website or email, and we strive to provide timely and helpful responses to ensure a smooth podcasting experience.
                </p>
            </div>
        </div>

        <div class="accordion-item border-t border-gray-300 px-4 py-2 cursor-pointer" x-data="{ isOpen: false }">
            <div class="flex items-center justify-between">
                <h3 class="flex-1 font-medium">Is my podcast content secure on Voicebits?</h3>
                <button @click="isOpen = !isOpen" class="text-gray-500" :class="{ 'transform rotate-180': isOpen }">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16.293 10.293L12 14.586l-4.293-4.293a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414z">
                        </path>
                    </svg>
                </button>
            </div>
            <div x-show="isOpen" class="accordion-content mt-2" style="display: none;">
                <p class="text-gray-700">
                    Yes, Voicebits takes the security of your podcast content seriously. We have robust security measures in place to protect your data and ensure the confidentiality and integrity of your content.
                </p>
            </div>
        </div>

        <div class="accordion-item border-t border-gray-300 px-4 py-2 cursor-pointer" x-data="{ isOpen: false }">
            <div class="flex items-center justify-between">
                <h3 class="flex-1 font-medium">Can I cancel my subscription with Voicebits?</h3>
                <button @click="isOpen = !isOpen" class="text-gray-500" :class="{ 'transform rotate-180': isOpen }">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16.293 10.293L12 14.586l-4.293-4.293a1 1 0 0 0-1.414 1.414l5 5a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0-1.414-1.414z">
                        </path>
                    </svg>
                </button>
            </div>
            <div x-show="isOpen" class="accordion-content mt-2" style="display: none;">
                <p class="text-gray-700">
                    Yes, you can cancel your subscription with Voicebits at any time. We offer flexible subscription plans with no long-term contracts, so you have the freedom to cancel or modify your subscription as needed.
                </p>
            </div>
        </div>
        <!-- Add more accordion items for each FAQ -->
    </div>
</div>
