<div class="w-full bg-gray-900">
    <div class="w-full px-4 py-2 rounded-lg">
        <div class="w-full">
            <div class="w-full flex items-center justify-between">
                <div class="text-center">
                    <div class="flex items-center gap-2">
                        <button id="rw" title="Rewind 15 seconds."
                            class="text-gray-300 hover:text-white duration-300 transition-all">
                            <svg width="20" stroke-width="1.5" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 13C3 17.9706 7.02944 22 12 22C16.9706 22 21 17.9706 21 13C21 8.02944 16.9706 4 12 4"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9 9L9 16" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M15 9L13 9C12.4477 9 12 9.44772 12 10L12 11.5C12 12.0523 12.4477 12.5 13 12.5L14 12.5C14.5523 12.5 15 12.9477 15 13.5L15 15C15 15.5523 14.5523 16 14 16L12 16"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 4L4.5 4M4.5 4L6.5 2M4.5 4L6.5 6" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <button id="play" class="text-white hover:text-gray-200 transition-all p-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button id="ff" title="Fast forward 15 seconds."
                            class="text-gray-300 hover:text-white duration-300 transition-all">
                            <svg width="20" stroke-width="1.5" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 13C21 17.9706 16.9706 22 12 22C7.02944 22 3 17.9706 3 13C3 8.02944 7.02944 4 12 4"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 4H19.5M19.5 4L17.5 2M19.5 4L17.5 6" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9 9L9 16" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M15 9L13 9C12.4477 9 12 9.44772 12 10L12 11.5C12 12.0523 12.4477 12.5 13 12.5L14 12.5C14.5523 12.5 15 12.9477 15 13.5L15 15C15 15.5523 14.5523 16 14 16L12 16"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mx-4 w-full flex items-center">
                    <div id="progress-bar" class="hidden md:block w-full bg-gray-700 h-3 rounded-full cursor-pointer">
                        <div id="progress" class="h-full bg-green-400 rounded-full"></div>
                    </div>
                    <span class="ml-4 px-1 py-0.5 font-mono text-sm leading-6 md:block text-white"
                        id="currentTime">00:00</span>
                    <span class="px-1 py-0.5 font-mono text-sm leading-6 md:block text-gray-100">/</span>
                    <span class="px-1 py-0.5 font-mono text-sm leading-6 md:block text-white" id="totalTime">
                        @if ($episode)
                            {{ is_numeric($episode->track_length) ? gmdate('i:s', (int) $episode->track_length) : $episode->track_length }}
                        @else
                            00:00
                        @endif
                    </span>
                </div>

                <button id="mute" class="text-gray-300 hover:text-white duration-300 transition-all">
                    <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 14V10C2 9.44772 2.44772 9 3 9H5.69722C5.89465 9 6.08766 8.94156 6.25192 8.83205L10.4453 6.03647C11.1099 5.59343 12 6.06982 12 6.86852V17.1315C12 17.9302 11.1099 18.4066 10.4453 17.9635L6.25192 15.1679C6.08766 15.0584 5.89465 15 5.69722 15H3C2.44772 15 2 14.5523 2 14Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path d="M16.5 7.5C16.5 7.5 18 9 18 11.5C18 14 16.5 15.5 16.5 15.5" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19.5 4.5C19.5 4.5 22 7 22 11.5C22 16 19.5 18.5 19.5 18.5" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="hidden md:block ml-4 border-l border-l-gray-600 h-6"></div>
                <p class="hidden md:block ml-4 flex-none text-sm text-slate-100 font-medium truncate" id="playing_title">{{ $episode->title ?? '' }}</p>
            </div>
        </div>
    </div>

    <script>
        const player = new Audio();
        let play_btn = document.getElementById('play');
        let ff_btn = document.getElementById('ff');
        let rw_btn = document.getElementById('rw');
        let mute_btn = document.getElementById('mute');
        let current_time = document.getElementById('currentTime');

        const progressBar = document.getElementById('progress-bar');
        const progress = document.getElementById('progress');
        let isDragging = false;

        let tmp = localStorage.getItem('guid') ?? null;

        // Initialize player
        window.onload = () => {
            if (document.querySelectorAll('.episode-btn')[0]) {
                let first_episode = document.querySelectorAll('.episode-btn')[0].getAttribute('id');
                setPlayerUrl(first_episode);
                // Initialize temp button.
                tmp = first_episode;
            }
        }

        function play(guid) {
            if (tmp == guid) {
                if (player.currentTime == 0) {
                    // Assign episode url to player
                    if (player.src == '') {
                        setPlayerUrl(guid);
                    }
                }

                if (player.paused) {
                    setTimeout(function() {
                        player.play();
                    }, 150);
                } else if (player.ended) {
                    setPlayerUrl(guid);
                    setTimeout(function() {
                        player.play();
                    }, 150);
                } else {
                    player.pause();
                }
            } else {
                localStorage.clear();
                localStorage.setItem('guid', guid);
                tmp = localStorage.getItem('guid');
                setPlayerUrl(guid);
                setTimeout(function() {
                    player.play();
                }, 150);
            }
        }

        // Get the episode url
        function setPlayerUrl(guid) {
            Livewire.emit('getEpisodeData', guid);
            Livewire.on('gotEpisodeData', (url, title) => {
                player.src = url;
                localStorage.setItem('title', title);
            });
        }

        /**
         * Event Listeners
         */
        player.onwaiting = () => {
            document.getElementById("playing_title").innerText = "Loading audio..."
            play_btn.innerHTML ="<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-6 h-6 animation-rotate'><path fill-rule='evenodd' d='M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm3 10.5a.75.75 0 000-1.5H9a.75.75 0 000 1.5h6z' clip-rule='evenodd' /></svg>";
        };

        player.onplaying = () => {
            play_btn.innerHTML = '';
            play_btn.innerHTML =
                "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-6 h-6'><path fill-rule='evenodd' d='M6.75 5.25a.75.75 0 01.75-.75H9a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75H7.5a.75.75 0 01-.75-.75V5.25zm7.5 0A.75.75 0 0115 4.5h1.5a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75H15a.75.75 0 01-.75-.75V5.25z' clip-rule='evenodd' /></svg>";
            document.querySelectorAll('.episode-btn').forEach(btn => {
                btn.innerHTML =
                    "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-12 h-12'><path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z' clip-rule='evenodd' /></svg>";
            });
            document.getElementById(tmp).innerHTML =
                "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-12 h-12'><path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM9 8.25a.75.75 0 00-.75.75v6c0 .414.336.75.75.75h.75a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75H9zm5.25 0a.75.75 0 00-.75.75v6c0 .414.336.75.75.75H15a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75h-.75z' clip-rule='evenodd'/></svg>";
        }

        player.onpause = () => {
            document.getElementById(tmp).innerHTML =
                "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-12 h-12'><path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z' clip-rule='evenodd' /></svg>";
            play_btn.innerHTML =
                "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-6 h-6'><path fill-rule='evenodd' d='M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z' clip-rule='evenodd' /></svg>";
        }

        player.onended = () => {
            progress.style.width = 0;
            current_time.innerText = "00:00";
            play_btn.innerHTML =
                "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-6 h-6'><path fill-rule='evenodd' d='M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z' clip-rule='evenodd' /></svg>";
        }

        play_btn.onclick = () => {
            if (player.paused) {
                player.play();
            } else {
                player.pause();
            }
        };

        ff_btn.onclick = () => {
            player.currentTime = player.currentTime + 15
        };

        rw_btn.onclick = () => {
            if (player.currentTime > 0) {
                player.currentTime = player.currentTime - 15
            } else {
                player.currentTime = 0;
            }
        };

        mute_btn.onclick = () => {
            if (player.muted === true) {
                player.muted = false;
                mute_btn.innerHTML =
                    '<svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 14V10C2 9.44772 2.44772 9 3 9H5.69722C5.89465 9 6.08766 8.94156 6.25192 8.83205L10.4453 6.03647C11.1099 5.59343 12 6.06982 12 6.86852V17.1315C12 17.9302 11.1099 18.4066 10.4453 17.9635L6.25192 15.1679C6.08766 15.0584 5.89465 15 5.69722 15H3C2.44772 15 2 14.5523 2 14Z" stroke="currentColor" stroke-width="1.5"/><path d="M16.5 7.5C16.5 7.5 18 9 18 11.5C18 14 16.5 15.5 16.5 15.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M19.5 4.5C19.5 4.5 22 7 22 11.5C22 16 19.5 18.5 19.5 18.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            } else {
                player.muted = true;
                mute_btn.innerHTML =
                    '<svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 14L19.0005 12M21 10L19.0005 12M19.0005 12L17 10M19.0005 12L21 14" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 14V10C3 9.44772 3.44772 9 4 9H6.69722C6.89465 9 7.08766 8.94156 7.25192 8.83205L11.4453 6.03647C12.1099 5.59343 13 6.06982 13 6.86852V17.1315C13 17.9302 12.1099 18.4066 11.4453 17.9635L7.25192 15.1679C7.08766 15.0584 6.89465 15 6.69722 15H4C3.44772 15 3 14.5523 3 14Z" stroke="currentColor" stroke-width="1.5"/></svg>';
            }
        }

        player.ontimeupdate = () => {
            document.getElementById("playing_title").innerText = "Now playing: " + localStorage.getItem('title');
            current_time.innerText = formatTime(player.currentTime);
            updateProgress();
        }

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

        // function formatTime(seconds) {
        //     hours  = Math.floor(seconds / 3600);
        //     hours = (hours >= 10) ? hours : "0" + hours;
        //     minutes = Math.floor(seconds / 60);
        //     minutes = (minutes >= 10) ? minutes : "0" + minutes;
        //     seconds = Math.floor(seconds % 60);
        //     seconds = (seconds >= 10) ? seconds : "0" + seconds;
        //     return hours + ":" + minutes + ":" + seconds;
        // }
        function formatTime(seconds) {
            let hours = Math.floor(seconds / 3600);
            let minutes = Math.floor(seconds % 3600 / 60);
            let secondsRemaining = Math.floor(seconds % 60);

            let timeString = "";

            if (hours > 0) {
                timeString += hours + "0:";
            }

            if (minutes < 10 && hours > 0) {
                timeString += "0";
            }

            timeString += minutes + "0:";

            if (secondsRemaining < 10) {
                timeString += "0";
            }

            timeString += secondsRemaining;

            return timeString;
        }


        function updateProgress() {
            var curmins = Math.floor(player.currentTime / 60);
            var cursecs = Math.floor(player.currentTime - curmins * 60);
            var durmins = Math.floor(player.duration / 60);
            var dursecs = Math.floor(player.duration - durmins * 60);
            if (cursecs < 10) {
                cursecs = "0" + cursecs;
            }
            if (dursecs < 10) {
                dursecs = "0" + dursecs;
            }
            if (curmins < 10) {
                curmins = "0" + curmins;
            }
            if (durmins < 10) {
                durmins = "0" + durmins;
            }
        }
    </script>
</div>
