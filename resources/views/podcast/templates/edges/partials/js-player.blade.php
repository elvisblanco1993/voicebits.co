<div class="my-3 w-full sm:absolute bottom-6 right-8 sm:w-[500px] border rounded-lg shadow-sm bg-white">
    <div class="w-full p-4 rounded-lg">
        <div class="w-full">
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
                    <span class="ml-4 bg-slate-100 rounded-md px-1 py-0.25 font-mono text-sm leading-6 md:block text-slate-500" id="currentTime">00:00</span>
                    <span class="px-1 py-0.5 font-mono text-sm leading-6 md:block text-slate-500">/</span>
                    <span class="px-1 py-0.5 font-mono text-sm leading-6 md:block text-slate-500" id="totalTime">
                        @if ($episode)
                            {{ ( is_numeric($episode->track_length) ) ? gmdate("i:s", (int) $episode->track_length) : $episode->track_length }}
                        @else
                            00:00
                        @endif
                    </span>
                </div>

                <button id="mute" class="text-slate-600 hover:text-slate-800 duration-300 transition-all">
                    <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 14V10C2 9.44772 2.44772 9 3 9H5.69722C5.89465 9 6.08766 8.94156 6.25192 8.83205L10.4453 6.03647C11.1099 5.59343 12 6.06982 12 6.86852V17.1315C12 17.9302 11.1099 18.4066 10.4453 17.9635L6.25192 15.1679C6.08766 15.0584 5.89465 15 5.69722 15H3C2.44772 15 2 14.5523 2 14Z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M16.5 7.5C16.5 7.5 18 9 18 11.5C18 14 16.5 15.5 16.5 15.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.5 4.5C19.5 4.5 22 7 22 11.5C22 16 19.5 18.5 19.5 18.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            <h1 class="text-sm text-slate-800 font-medium truncate" id="track-title"></h1>
        </div>
    </div>
</div>

<script>
    // Check if the audioPlayerModule is already initialized
    if (!window.audioPlayerModule) {
        // Define the module
        window.audioPlayerModule = (() => {
            const player = new Audio();
            let playBtn, ffBtn, rwBtn, muteBtn, currentTimeDisplay, progressBar, progressDisplay;
            let isDragging = false;
            let currentGUID = localStorage.getItem('guid') ?? null;

            // Initialize player and UI elements
            const initPlayerUI = () => {
                trackTitle = document.getElementById('track-title');
                playBtn = document.getElementById('play');
                ffBtn = document.getElementById('ff');
                rwBtn = document.getElementById('rw');
                muteBtn = document.getElementById('mute');
                currentTimeDisplay = document.getElementById('currentTime');
                progressBar = document.getElementById('progress-bar');
                progressDisplay = document.getElementById('progress');
            };

            // Initialize only once
            if (!window.audioPlayerInitialized) {
                window.audioPlayerInitialized = true;
                initPlayerUI();
            }

            // Play functionality
            const play = (url, title) => {
                if (url === player.src) {
                    playPause();
                } else {
                    player.pause();
                    player.currentTime = 0;
                    player.src = url;
                    trackTitle.textContent = title;
                    player.play();
                }
            };

            const playPause = () => {
                if (player.paused) {
                    player.play();
                } else {
                    player.pause();
                }
            }

            const fastForward = () => {
                player.currentTime += 15;
            }

            const rewind = () => {
                player.currentTime = Math.max(0, player.currentTime - 15);
            }

            const mute = () => {
                player.muted = !player.muted;
            }

            // Format time
            const formatTime = (seconds) => {
                const hours = Math.floor(seconds / 3600);
                const minutes = Math.floor((seconds % 3600) / 60);
                const secs = Math.floor(seconds % 60);
                return [hours, minutes, secs]
                    .map((val) => (val < 10 ? `0${val}` : val))
                    .join(':');
            };

            // Update progress
            const updateProgress = () => {
                const percent = (player.currentTime / player.duration) * 100;
                if (!isDragging) {
                    progressDisplay.style.width = `${percent}%`;
                }
                currentTimeDisplay.textContent = formatTime(player.currentTime);
            };

            playBtn.addEventListener('click', playPause);
            ffBtn.addEventListener('click', fastForward);
            rwBtn.addEventListener('click', rewind);
            muteBtn.addEventListener('click', mute);

            // Event listeners for player
            player.addEventListener('timeupdate', updateProgress);

            // Make progress bar draggable
            progressBar.addEventListener('mousedown', () => {
                isDragging = true;
            });

            document.addEventListener('mousemove', (event) => {
                if (isDragging) {
                    const rect = progressBar.getBoundingClientRect();
                    const percent = (event.clientX - rect.left) / rect.width;
                    progressDisplay.style.width = `${percent * 100}%`;
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

            // Expose functionalities
            return {
                play,
                updateProgress,
            };
        })();
    }
</script>
