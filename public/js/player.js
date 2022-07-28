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
        document.getElementById("player-title").innerText = title;
    });
}

/**
 * Event Listeners
 */
document.getElementById('player').onplaying = () => {
    document.querySelectorAll('.episode-btn').forEach(btn => {
        btn.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='h-6 w-6 fill-current' viewBox='0 0 16 16'><path d='m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z'/></svg><span class='ml-3' aria-hidden='true'>Listen</span>"
    })
    document.getElementById(tmp).innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='h-6 w-6 fill-current' viewBox='0 0 16 16'><path d='M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z'/></svg><span class='ml-3' aria-hidden='true'>Listen</span>";
}

document.getElementById('player').onpause = () => {
    document.getElementById(tmp).innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' class='h-6 w-6 fill-current' viewBox='0 0 16 16'><path d='m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z'/></svg><span class='ml-3' aria-hidden='true'>Listen</span>";
}
