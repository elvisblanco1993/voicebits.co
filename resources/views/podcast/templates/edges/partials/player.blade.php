<div x-data="audioPlayer()" x-cloak x-show="showPlayer" x-on:set-episode.window="setEpisode($event.detail)" class="w-full md:w-[500px] md:fixed md:bottom-6 md:right-6 border md:rounded-lg shadow-sm bg-white">
    <div class="flex items-center space-x-3 px-4 py-2">
        <button x-on:click="playPause" id="play" x-on:click="playPause" class="text-slate-800 hover:text-slate-600 transition-all h-20 w-20">
            <svg x-cloak x-show="!isPlaying && !isLoading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" />
            </svg>
            <svg x-cloak x-show="isPlaying && !isLoading" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM9 8.25a.75.75 0 00-.75.75v6c0 .414.336.75.75.75h.75a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75H9zm5.25 0a.75.75 0 00-.75.75v6c0 .414.336.75.75.75H15a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75h-.75z" clip-rule="evenodd" />
            </svg>
            <svg x-cloak x-show="isLoading" viewBox="240.25 240.25 19.5 19.5" fill="currentColor" class="w-16 h-16 animate-spin" xmlns="http://www.w3.org/2000/svg">
                <ellipse style="" cx="250" cy="250" rx="9.75" ry="9.75"/>
                <ellipse style="stroke: rgb(109, 109, 109); stroke-width: 1.5px;" rx="5" ry="5"/>
                <path style="stroke-width: 1.5px; fill: none; stroke: rgb(255, 255, 255);" d="M 250.069 244.996 C 253.858 244.996 256.227 249.169 254.332 252.507 C 253.204 254.492 250.893 255.446 248.723 254.819" id="spinner"/>
            </svg>
        </button>

        <div class="block w-full overflow-hidden">
            <p class="text-sm text-black font-semibold truncate" x-ref="trackTitle"></p>

            <div x-ref="progressBar" class="block w-full bg-slate-100 h-2.5 my-1 rounded-full cursor-pointer" title="Click to update track position">
                <div x-ref="progress" class="h-full progress-bar rounded-full"></div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <button x-on:click="rewind" id="rw" title="Rewind 15 seconds." aria-label="Rewind 15 seconds." class="text-slate-600 hover:text-slate-800 duration-300 transition-all">
                        <svg width="20" stroke-width="1.5" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 13C3 17.9706 7.02944 22 12 22C16.9706 22 21 17.9706 21 13C21 8.02944 16.9706 4 12 4" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 9L9 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 9L13 9C12.4477 9 12 9.44772 12 10L12 11.5C12 12.0523 12.4477 12.5 13 12.5L14 12.5C14.5523 12.5 15 12.9477 15 13.5L15 15C15 15.5523 14.5523 16 14 16L12 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 4L4.5 4M4.5 4L6.5 2M4.5 4L6.5 6" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button x-on:click="fastForward" id="ff" title="Fast forward 15 seconds." aria-label="Fast forward 15 seconds." class="text-slate-600 hover:text-slate-800 duration-300 transition-all">
                        <svg width="20" stroke-width="1.5" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 13C21 17.9706 16.9706 22 12 22C7.02944 22 3 17.9706 3 13C3 8.02944 7.02944 4 12 4" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 4H19.5M19.5 4L17.5 2M19.5 4L17.5 6" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 9L9 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 9L13 9C12.4477 9 12 9.44772 12 10L12 11.5C12 12.0523 12.4477 12.5 13 12.5L14 12.5C14.5523 12.5 15 12.9477 15 13.5L15 15C15 15.5523 14.5523 16 14 16L12 16" stroke="currentColor"  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button x-on:click="toggleMute" id="mute" class="text-slate-600 hover:text-slate-800 duration-300 transition-all" title="Toggle mute" aria-label="Toggle mute">
                        <svg x-cloak x-show="isMuted" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M9.547 3.062A.75.75 0 0110 3.75v12.5a.75.75 0 01-1.264.546L4.703 13H3.167a.75.75 0 01-.7-.48A6.985 6.985 0 012 10c0-.887.165-1.737.468-2.52a.75.75 0 01.7-.48h1.535l4.033-3.796a.75.75 0 01.811-.142zM13.28 7.22a.75.75 0 10-1.06 1.06L13.94 10l-1.72 1.72a.75.75 0 001.06 1.06L15 11.06l1.72 1.72a.75.75 0 101.06-1.06L16.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L15 8.94l-1.72-1.72z" />
                        </svg>
                        <svg x-cloak x-show="!isMuted" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path d="M10 3.75a.75.75 0 00-1.264-.546L4.703 7H3.167a.75.75 0 00-.7.48A6.985 6.985 0 002 10c0 .887.165 1.737.468 2.52.111.29.39.48.7.48h1.535l4.033 3.796A.75.75 0 0010 16.25V3.75zM15.95 5.05a.75.75 0 00-1.06 1.061 5.5 5.5 0 010 7.778.75.75 0 001.06 1.06 7 7 0 000-9.899z" />
                            <path d="M13.829 7.172a.75.75 0 00-1.061 1.06 2.5 2.5 0 010 3.536.75.75 0 001.06 1.06 4 4 0 000-5.656z" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="font-mono text-xs md:block text-slate-500" x-ref="currentTime"></span>
                    <span class="font-mono text-xs leading-6 md:block text-slate-500">|</span>
                    <span class="font-mono text-xs leading-6 md:block text-slate-500" x-ref="duration"></span>
                </div>
            </div>
        </div>
    </div>
    <audio x-ref="player"></audio>
</div>

<script>
    // Sets the episode - DO NOT DELETE
    function setEpisode(url, title, duration, guid) {
        window.dispatchEvent(new CustomEvent('set-episode', {
            detail: {
                url: url,
                title: title,
                duration: duration,
                guid: guid,
            }
        }));
    }
    // End | Sets the episode - DO NOT DELETE

    // AlpineJS Function
    function audioPlayer() {
        return {
            trackTitle: '',
            isMuted: false,
            isPlaying: false,
            isLoading: false,
            showPlayer: false,
            playingBtnId: 0,

            init () {
                this.$refs.currentTime.textContent = "00:00";
                this.$refs.duration.textContent = "00:00";

                // Event Listeners
                this.$refs.player.addEventListener('loadstart', () => {this.isLoading = true;});
                this.$refs.player.addEventListener('playing', this.updateCurrentEpisodeButton.bind(this));
                this.$refs.player.addEventListener('timeupdate', this.updateProgress.bind(this));
                this.$refs.player.addEventListener('ended', () => {this.isPlaying = false; this.updateCurrentEpisodeButton();});
                this.$refs.progressBar.addEventListener('click', this.seek.bind(this));
            },

            setEpisode(detail) {
                if (this.$refs.player.src !== detail.url) {
                    this.$refs.player.currentTime = 0;
                    this.$refs.player.src = detail.url;
                    this.$refs.trackTitle.textContent = detail.title;
                    this.$refs.trackTitle.title = "Now playing: " + detail.title;
                    this.$refs.duration.textContent = this.formatTime(detail.duration);
                }
                this.playingBtnId = detail.guid;
                this.showPlayer = true;
                this.playPause();
            },

            playPause() {
                if (this.$refs.player.paused) {
                    this.$refs.player.play();
                    this.isPlaying = true;
                } else {
                    this.$refs.player.pause();
                    this.isPlaying = false;
                }
                // Update the current episode play/pause button
                this.updateCurrentEpisodeButton();
            },

            rewind() {
                this.$refs.player.currentTime = Math.max(0, this.$refs.player.currentTime - 15);
            },

            fastForward() {
                this.$refs.player.currentTime += 15;
            },

            toggleMute() {
                this.isMuted = !this.isMuted;
                this.$refs.player.muted = !this.$refs.player.muted;
            },

            // Seeking with the progress bar
            seek(event) {
                if (!isNaN(this.$refs.player.duration)) {
                    const progressBar = this.$refs.progressBar;
                    const progressBarRect = progressBar.getBoundingClientRect();
                    const clickX = event.clientX - progressBarRect.left; // X coordinate of the click
                    const progressBarWidth = progressBarRect.width;
                    const clickRatio = clickX / progressBarWidth; // Click position ratio
                    const newTime = clickRatio * this.$refs.player.duration; // New time to seek to

                    this.$refs.player.currentTime = newTime; // Seek to the new time
                }
            },

            // Method to be called on 'timeupdate' event
            updateProgress(event) {
                // 'this' here refers to the Alpine component instance because
                // 'updateProgress' is called with the Alpine instance as the context
                let player = event.target;
                let currentTime = player.currentTime; // Current playback position in seconds
                let duration = player.duration; // Total duration of the audio in seconds

                // Check if duration is a valid number before updating
                if (!isNaN(duration)) {
                    // Update the currentTime text content
                    this.$refs.currentTime.textContent = this.formatTime(currentTime);

                    // Calculate the progress as a percentage
                    let progressValue = (currentTime / duration) * 100;

                    // Update the progress bar's width
                    this.$refs.progress.style.width = progressValue + '%';
                }
            },

            // Helper function to update the currently playing button.
            updateCurrentEpisodeButton() {
                // Reset all episodes
                document.querySelectorAll('.episode-btn').forEach(btn => {
                    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" /></svg><span aria-hidden="true">{{ __("Listen") }}</span>';
                });
                if (this.playingBtnId) {
                    this.isLoading = false;

                    // Executes on all non-episode pages
                    const playingBtn = document.getElementById(this.playingBtnId);
                    if (playingBtn) {
                        if (this.isPlaying) {
                            playingBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M6.75 5.25a.75.75 0 01.75-.75H9a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75H7.5a.75.75 0 01-.75-.75V5.25zm7.5 0A.75.75 0 0115 4.5h1.5a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75H15a.75.75 0 01-.75-.75V5.25z" clip-rule="evenodd" /></svg><span aria-hidden="true">{{ __("Listen") }}</span>';
                        } else {
                            playingBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" /></svg><span aria-hidden="true">{{ __("Listen") }}</span>';
                        }
                    }

                    // Executes on episode page
                    const episodePlayBtn = document.getElementById('pp');
                    if (episodePlayBtn) {
                        if (this.isPlaying && episodePlayBtn) {
                            episodePlayBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-slate-800 hover:text-slate-700"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM9 8.25a.75.75 0 00-.75.75v6c0 .414.336.75.75.75h.75a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75H9zm5.25 0a.75.75 0 00-.75.75v6c0 .414.336.75.75.75H15a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75h-.75z" clip-rule="evenodd" /></svg>';
                        } else {
                            episodePlayBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-slate-800 hover:text-slate-700"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z" clip-rule="evenodd" /></svg>';
                        }
                    }
                }
            },

            // Helper function to format seconds into mm:ss
            formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = Math.floor(seconds % 60);
                return `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
            },
        };
    }
</script>
