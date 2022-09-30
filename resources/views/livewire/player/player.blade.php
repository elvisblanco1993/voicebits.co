<div class="my-3 w-full">
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
                    <input type="range" id="time-seeker" step="0.01" class="w-full">
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
            <h1 class="text-sm text-slate-800 font-medium truncate" id="playing_title">Select an apisode to play</h1>
        </div>
    </div>










    <script src="{{ asset('js/player.js') }}"></script>
</div>
