const player = new Plyr('#player', {
    controls: ['play', 'progress', 'current-time', 'mute', 'volume',]
});
let tmp = localStorage.getItem('guid') ?? null;
let episode_link = document.getElementsByClassName('episode-link');

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
            if (player.media.src == '') {
                setPlayerUrl(guid);
            }
            // Registers unique play
            Livewire.emit('countPlay');
        }

        if (player.paused) {
            setTimeout(function () {
                player.play();
            }, 150);
        } else if (player.ended) {
            setPlayerUrl(guid);
            setTimeout(function () {
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
        setTimeout(function () {
            player.play();
        }, 150);
    }
}

// Get the episode url
function setPlayerUrl(guid) {
    Livewire.emit('getEpisodeUrl', guid);
    Livewire.on('gotEpisodeUrl', (url, title) => {
        document.getElementById("player").src = url;
        document.getElementById("playingTitle").innerText = title;
    });
}

/**
 * Event Listeners
 */
document.getElementById('player').onplaying = () => {
    document.querySelectorAll('.episode-btn').forEach(btn => {
        btn.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-12 h-12'><path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z' clip-rule='evenodd' /></svg>";
    })
    document.getElementById(tmp).innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-12 h-12'><path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM9 8.25a.75.75 0 00-.75.75v6c0 .414.336.75.75.75h.75a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75H9zm5.25 0a.75.75 0 00-.75.75v6c0 .414.336.75.75.75H15a.75.75 0 00.75-.75V9a.75.75 0 00-.75-.75h-.75z' clip-rule='evenodd'/></svg>";
}

document.getElementById('player').onpause = () => {
    document.getElementById(tmp).innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-12 h-12'><path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm14.024-.983a1.125 1.125 0 010 1.966l-5.603 3.113A1.125 1.125 0 019 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113z' clip-rule='evenodd' /></svg>";
}
