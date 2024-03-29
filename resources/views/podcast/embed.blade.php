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
        <!-- Styles -->
        @vite('resources/css/app.css')

        <!-- Scripts -->
        @vite('resources/js/app.js')
        @livewireStyles
    </head>
    <body>
        <div class="w-full h-40 bg-white text-slate-600 p-4 rounded-lg border border-slate-200 shadow">
            <div x-data="{ share: false, info: false, main: true }" class="h-full w-full flex justify-start space-x-4">
                <img src="{{ $cover }}" alt="{{ $title }}" class="w-28 sm:w-32 h-28 sm:h-32 objcet-center object-cover rounded shadow">
                <div x-show="main" class="w-full">
                    <div class="flex items-start justify-between">
                        <div class="">
                            <h1 class="text-xs uppercase text-slate-600 font-semibold truncate">{{ $show_name }}</h1>
                            <p class="text-lg font-semibold text-slate-900 truncate">{{ $title }}</p>
                        </div>
                        <div class="sm:flex items-center text-right text-xs space-x-2">
                            <button @click="main = false, info = false, share = true" class="uppercase text-slate-600 hover:text-black transition-all tracking-wide" title="Share episode">
                                <span class="hidden md:inline-block">Share</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:hidden" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                </svg>
                            </button>
                            <button @click="main = false, info = true, share = false" class="inline-block mt-2 sm:mt-0 uppercase text-slate-600 hover:text-black transition-all tracking-wide" title="Go to podcast website">
                                <span class="hidden md:inline-block">More info</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:hidden" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="w-full flex items-center justify-between">
                        <div class="text-center">
                            <div class="flex items-center gap-2">
                                <button id="rw" title="Rewind 15 seconds." class="text-slate-600 hover:text-slate-800 duration-300 transition-all">
                                    <svg width="20" stroke-width="1.5" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 13C3 17.9706 7.02944 22 12 22C16.9706 22 21 17.9706 21 13C21 8.02944 16.9706 4 12 4" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 9L9 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15 9L13 9C12.4477 9 12 9.44772 12 10L12 11.5C12 12.0523 12.4477 12.5 13 12.5L14 12.5C14.5523 12.5 15 12.9477 15 13.5L15 15C15 15.5523 14.5523 16 14 16L12 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 4L4.5 4M4.5 4L6.5 2M4.5 4L6.5 6" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <button id="play" class="text-slate-800 hover:text-slate-600 transition-all p-0">
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-16 h-16'>
                                        <path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z' clip-rule='evenodd' />
                                    </svg>
                                </button>
                                <button id="ff" title="Fast forward 15 seconds." class="text-slate-600 hover:text-slate-800 duration-300 transition-all">
                                    <svg width="20" stroke-width="1.5" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 13C21 17.9706 16.9706 22 12 22C7.02944 22 3 17.9706 3 13C3 8.02944 7.02944 4 12 4" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 4H19.5M19.5 4L17.5 2M19.5 4L17.5 6" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9 9L9 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15 9L13 9C12.4477 9 12 9.44772 12 10L12 11.5C12 12.0523 12.4477 12.5 13 12.5L14 12.5C14.5523 12.5 15 12.9477 15 13.5L15 15C15 15.5523 14.5523 16 14 16L12 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="mx-4 w-full flex items-center">
                            <div id="progress-bar" class="w-full bg-slate-100 h-3 rounded-full cursor-pointer">
                                <div id="progress" class="h-full bg-amber-400 rounded-full"></div>
                            </div>
                            <div class="flex items-center text-xs text-slate-400">
                                <span class="ml-4 bg-slate-100 rounded-md px-1 py-0.25 font-mono text-sm leading-6 md:block text-slate-500" id="currentTime">00:00</span>
                                <span class="px-1 py-0.5 font-mono text-sm leading-6 md:block text-slate-500">/</span>
                                <span class="px-1 py-0.5 font-mono text-sm leading-6 md:block text-slate-500" id="totalTime">{{ ( is_numeric($duration) ) ? gmdate("i:s", (int) $duration) : $duration }}</span>
                            </div>
                        </div>

                        <button id="mute" class="text-slate-600 hover:text-slate-800 duration-300 transition-all">
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
                        <button @click="share = false, main = true" class="float-right text-slate-600 hover:text-slate-800 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="">
                        <h1 class="text-lg font-bold text-black">Share</h1>
                        <div class="mt-4 flex items-center">
                            <label for="embedded_url" class="text-xs text-slate-800 font-semibold">EMBED</label>
                            <input type="text" name="embedded_url" id="embedded_url" value='<embed width="100%" height="180" frameBorder="0" scrolling="no" seamless src="{{ $embed_url }}">' class="ml-4 px-2 py-1 text-xs rounded-md bg-slate-600 text-white w-full">
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center space-x-3">
                            <a href="http://www.facebook.com/sharer.php?u={{ $episode_url }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-slate-600 hover:text-slate-800 transition-colors" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ $episode_url }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-slate-600 hover:text-slate-800 transition-colors" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- Podcast Information --}}
                <div x-cloak x-show="info" class="w-full">
                    <div class="">
                        <button @click="info = false, main = true" class="float-right text-slate-600 hover:text-slate-800 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="">
                        <h1 class="text-lg font-bold text-black">{{ $show_name }}</h1>
                        <p class="mt-1 text-xs text-slate-600">By: {{ $show_author }} &middot; <a href="{{ $show_url }}" target="_blank" class="block sm:inline-block underline">View the Website</a></p>
                        <p class="hidden sm:block mt-2 text-sm text-slate-600 h-full">{{ str($show_description)->limit(200, '') }} <a href="{{ $show_url }}" target="_blank" class="block sm:inline-block underline">(...)</a></p></p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const player = new Audio("{{ $track }}");
            let play_btn = document.getElementById('play');
            let ff_btn = document.getElementById('ff');
            let rw_btn = document.getElementById('rw');
            let mute_btn = document.getElementById('mute');
            let current_time = document.getElementById('currentTime');
            const progressBar = document.getElementById('progress-bar');
            const progress = document.getElementById('progress');
            let isDragging = false;

            play_btn.addEventListener("click", () => {
                if (player.paused) {
                    player.play();
                    play_btn.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-16 h-16'><path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM9 8.25a.75.75 0 00-.75.75v6c0 .414.336.75.75.75h.75a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75H9zm5.25 0a.75.75 0 00-.75.75v6c0 .414.336.75.75.75H15a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75h-.75z' clip-rule='evenodd'/></svg>";
                } else {
                    player.pause();
                    play_btn.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-16 h-16'><path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z' clip-rule='evenodd' /></svg>";
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

            player.ontimeupdate = () => {
                current_time.innerText = formatTime(player.currentTime);
                updateProgress();
            };

            // Update the progress bar as the audio plays
            player.addEventListener('timeupdate', () => {
                if (!isDragging) {
                const percent = (player.currentTime / player.duration) * 100;
                progress.style.width = `${percent}%`;
                }
                updateProgress();
            });

            // Make the progress bar draggable
            progressBar.addEventListener('mousedown', () => {
                isDragging = true;
            });

            document.addEventListener('mousemove', (event) => {
                if (isDragging) {
                    const rect = progressBar.getBoundingClientRect();
                    const percent = (event.clientX - rect.left) / rect.width;
                    progress.style.width = `${percent * 100}%`;
                }
            });

            document.addEventListener('mouseup', (event) => {
                if (isDragging) {
                    const rect = progressBar.getBoundingClientRect();
                    const seekTime = (event.clientX - rect.left) / rect.width * player.duration;
                    player.currentTime = seekTime;
                    isDragging = false;
                }
            });

            function formatTime(seconds) {
                hours  = Math.floor(seconds / 3600);
                hours = (hours >= 10) ? hours : "0" + hours;
                minutes = Math.floor(seconds / 60);
                minutes = (minutes >= 10) ? minutes : "0" + minutes;
                seconds = Math.floor(seconds % 60);
                seconds = (seconds >= 10) ? seconds : "0" + seconds;
                return hours + ":" + minutes + ":" + seconds;
            };

            function updateProgress(){
                var curmins = Math.floor(player.currentTime / 60);
                var cursecs = Math.floor(player.currentTime - curmins * 60);
                var durmins = Math.floor(player.duration / 60);
                var dursecs = Math.floor(player.duration - durmins * 60);
                if(cursecs < 10){ cursecs = "0"+cursecs; }
                if(dursecs < 10){ dursecs = "0"+dursecs; }
                if(curmins < 10){ curmins = "0"+curmins; }
                if(durmins < 10){ durmins = "0"+durmins; }
            }
        </script>

        @livewireScripts
    </body>
</html>
