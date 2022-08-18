<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title . ' - ' . $show_name }}</title>
    {{-- TODO --}}
    {{--
        [] Add SEO tags
        [] Add favicon based on show cover
        --}}
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full h-40 bg-slate-700 p-4 rounded-lg border border-slate-700">
        <div x-data="{ share: false, info: false, main: true }" class="h-full w-full flex justify-start space-x-4">
            <img src="{{ $cover }}" alt="{{ $title }}" class="w-28 sm:w-32 h-28 sm:h-32 rounded shadow">
            <div x-show="main" class="w-full">
                <div class="flex items-start justify-between">
                    <div class="">
                        <h1 class="text-xs uppercase text-slate-400 font-semibold truncate">{{ $show_name }}</h1>
                        <p class="text-lg font-semibold text-white truncate">{{ $title }}</p>
                    </div>
                    <div class="sm:flex items-center text-right text-xs space-x-2">
                        <button @click="main = false, info = false, share = true" class="uppercase text-slate-400 hover:text-white transition-all tracking-wide" title="Share episode">
                            <span class="hidden md:inline-block">Share</span>
                            <svg class="md:hidden inline-block" width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 22C19.6569 22 21 20.6569 21 19C21 17.3431 19.6569 16 18 16C16.3431 16 15 17.3431 15 19C15 20.6569 16.3431 22 18 22Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18 8C19.6569 8 21 6.65685 21 5C21 3.34315 19.6569 2 18 2C16.3431 2 15 3.34315 15 5C15 6.65685 16.3431 8 18 8Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6 15C7.65685 15 9 13.6569 9 12C9 10.3431 7.65685 9 6 9C4.34315 9 3 10.3431 3 12C3 13.6569 4.34315 15 6 15Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.5 6.5L8.5 10.5" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M8.5 13.5L15.5 17.5" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                        </button>
                        <button @click="main = false, info = true, share = false" class="inline-block mt-2 sm:mt-0 uppercase text-slate-400 hover:text-white transition-all tracking-wide" title="Go to podcast website">
                            <span class="hidden md:inline-block">More info</span>
                            <svg class="md:hidden inline-block" width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 7.5C12.2761 7.5 12.5 7.27614 12.5 7C12.5 6.72386 12.2761 6.5 12 6.5C11.7239 6.5 11.5 6.72386 11.5 7C11.5 7.27614 11.7239 7.5 12 7.5Z" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 17.5C12.2761 17.5 12.5 17.2761 12.5 17C12.5 16.7239 12.2761 16.5 12 16.5C11.7239 16.5 11.5 16.7239 11.5 17C11.5 17.2761 11.7239 17.5 12 17.5Z" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 12.5C12.2761 12.5 12.5 12.2761 12.5 12C12.5 11.7239 12.2761 11.5 12 11.5C11.7239 11.5 11.5 11.7239 11.5 12C11.5 12.2761 11.7239 12.5 12 12.5Z" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="w-full flex items-center justify-between">
                    <div class="text-center">
                        <div class="flex items-center gap-2">
                            <button id="rw" title="Rewind 15 seconds." class="text-slate-400 hover:text-white duration-300 transition-all">
                                <svg width="20" stroke-width="1.5" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 13C3 17.9706 7.02944 22 12 22C16.9706 22 21 17.9706 21 13C21 8.02944 16.9706 4 12 4" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 9L9 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15 9L13 9C12.4477 9 12 9.44772 12 10L12 11.5C12 12.0523 12.4477 12.5 13 12.5L14 12.5C14.5523 12.5 15 12.9477 15 13.5L15 15C15 15.5523 14.5523 16 14 16L12 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 4L4.5 4M4.5 4L6.5 2M4.5 4L6.5 6" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button id="play" class="text-white p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[48px] w-[48px]" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button id="ff" title="Fast forward 15 seconds." class="text-slate-400 hover:text-white duration-300 transition-all">
                                <svg width="20" stroke-width="1.5" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 13C21 17.9706 16.9706 22 12 22C7.02944 22 3 17.9706 3 13C3 8.02944 7.02944 4 12 4" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 4H19.5M19.5 4L17.5 2M19.5 4L17.5 6" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 9L9 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15 9L13 9C12.4477 9 12 9.44772 12 10L12 11.5C12 12.0523 12.4477 12.5 13 12.5L14 12.5C14.5523 12.5 15 12.9477 15 13.5L15 15C15 15.5523 14.5523 16 14 16L12 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <div class="text-xs text-slate-400">
                            <span id="currentTime">00:00</span> &middot; <span id="totalTime">{{ ( is_numeric($duration) ) ? gmdate("i:s", (int) $duration) : $duration }}</span>
                        </div>
                    </div>

                    <button id="mute" class="text-slate-400 hover:text-white duration-300 transition-all">
                        <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 14V10C2 9.44772 2.44772 9 3 9H5.69722C5.89465 9 6.08766 8.94156 6.25192 8.83205L10.4453 6.03647C11.1099 5.59343 12 6.06982 12 6.86852V17.1315C12 17.9302 11.1099 18.4066 10.4453 17.9635L6.25192 15.1679C6.08766 15.0584 5.89465 15 5.69722 15H3C2.44772 15 2 14.5523 2 14Z" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M16.5 7.5C16.5 7.5 18 9 18 11.5C18 14 16.5 15.5 16.5 15.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19.5 4.5C19.5 4.5 22 7 22 11.5C22 16 19.5 18.5 19.5 18.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            {{-- Share episode & podcast links --}}
            <div x-cloak x-show="share" class="w-full">
                <div class="">
                    <button @click="share = false, main = true" class="float-right text-slate-400 hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="">
                    <h1 class="text-lg font-bold text-white">Share</h1>
                    <div class="mt-4 flex items-center">
                        <label for="embedded_url" class="text-xs text-white font-semibold">EMBED</label>
                        <input type="text" name="embedded_url" id="embedded_url" value='<iframe width="100%" height="180" frameborder="no" scrolling="no" seamless src="{{ $embed_url }}"></iframe>' class="ml-4 px-2 py-1 text-xs rounded-md bg-slate-600 text-white w-full">
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center space-x-3">
                        <a href="http://www.facebook.com/sharer.php?u={{ $episode_url }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ $episode_url }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            {{-- Podcast Information --}}
            <div x-cloak x-show="info" class="w-full">
                <div class="">
                    <button @click="info = false, main = true" class="float-right text-slate-400 hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="">
                    <h1 class="text-lg font-bold text-white">{{ $show_name }}</h1>
                    <p class="mt-1 text-xs text-slate-400">By: {{ $show_author }} &middot; <a href="{{ $show_url }}" target="_blank" class="block sm:inline-block underline">View the Website</a></p>
                    <p class="hidden sm:block mt-2 text-sm text-slate-200 h-full">{{ str($show_description)->limit(200, ' (...)') }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const player = new Audio("{{ $track }}");
        // const player = document.getElementById('player');
        let play_btn = document.getElementById('play');
        let ff_btn = document.getElementById('ff');
        let rw_btn = document.getElementById('rw');
        let mute_btn = document.getElementById('mute');
        let current_time = document.getElementById('currentTime');
        let progress_bar = document.getElementById('progress');

        play_btn.addEventListener("click", () => {
            if (player.paused) {
                player.play();
                play_btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-[48px] w-[48px]" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>';
            } else {
                player.pause();
                play_btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-[48px] w-[48px]" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg>';
            }
        });

        ff_btn.addEventListener("click", () => {
            player.currentTime = player.currentTime + 15
        });

        rw_btn.addEventListener("click", () => {
            if (player.currentTime > 0) {
                player.currentTime = player.currentTime - 15
            } else {
                player.currentTime = 0;
            }
        });

        mute_btn.addEventListener("click", () => {
            if (player.muted === true) {
                player.muted = false;
                mute_btn.innerHTML = '<svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 14V10C2 9.44772 2.44772 9 3 9H5.69722C5.89465 9 6.08766 8.94156 6.25192 8.83205L10.4453 6.03647C11.1099 5.59343 12 6.06982 12 6.86852V17.1315C12 17.9302 11.1099 18.4066 10.4453 17.9635L6.25192 15.1679C6.08766 15.0584 5.89465 15 5.69722 15H3C2.44772 15 2 14.5523 2 14Z" stroke="currentColor" stroke-width="1.5"/><path d="M16.5 7.5C16.5 7.5 18 9 18 11.5C18 14 16.5 15.5 16.5 15.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M19.5 4.5C19.5 4.5 22 7 22 11.5C22 16 19.5 18.5 19.5 18.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            } else {
                player.muted = true;
                mute_btn.innerHTML = '<svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 14L19.0005 12M21 10L19.0005 12M19.0005 12L17 10M19.0005 12L21 14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 14V10C3 9.44772 3.44772 9 4 9H6.69722C6.89465 9 7.08766 8.94156 7.25192 8.83205L11.4453 6.03647C12.1099 5.59343 13 6.06982 13 6.86852V17.1315C13 17.9302 12.1099 18.4066 11.4453 17.9635L7.25192 15.1679C7.08766 15.0584 6.89465 15 6.69722 15H4C3.44772 15 3 14.5523 3 14Z" stroke="currentColor" stroke-width="1.5"/></svg>';
            }
        });

        player.addEventListener("timeupdate", () => {
            current_time.innerText = formatTime(player.currentTime);
        });

        function formatTime(seconds) {
            hours  = Math.floor(seconds / 3600);
            hours = (hours >= 10) ? hours : "0" + hours;
            minutes = Math.floor(seconds / 60);
            minutes = (minutes >= 10) ? minutes : "0" + minutes;
            seconds = Math.floor(seconds % 60);
            seconds = (seconds >= 10) ? seconds : "0" + seconds;
            return hours + ":" + minutes + ":" + seconds;
        }
    </script>

    @vite('resources/js/app.js')
</body>
</html>
