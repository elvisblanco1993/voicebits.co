const player = new Plyr('#player');
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
            setPlayerUrl(guid);
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
        document.getElementById('player').src = url;
        document.getElementById('episode-title').innerText = title;
    });
}


/**
 * Event Listeners
 */
document.getElementById('player').onplaying = () => {
    document.querySelectorAll('.episode-btn').forEach(btn => {
        btn.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' class='h-12 w-12' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'><path stroke-linecap='round' stroke-linejoin='round' d='M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z' /><path stroke-linecap='round' stroke-linejoin='round' d='M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>"
    })
    document.getElementById(tmp).innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' class='h-12 w-12' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'><path stroke-linecap='round' stroke-linejoin='round' d='M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
}

document.getElementById('player').onpause = () => {
    document.getElementById(tmp).innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' class='h-12 w-12' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'><path stroke-linecap='round' stroke-linejoin='round' d='M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z' /><path stroke-linecap='round' stroke-linejoin='round' d='M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
}
