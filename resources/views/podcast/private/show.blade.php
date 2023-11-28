<x-guest-layout>
    <div class="max-w-3xl mx-auto py-12 lg:py-24 px-4 sm:px-6 lg:px-8 text-center">
        @if ($subscriber->podcast->cover)
            <img src="{{ route('public.podcast.cover', ['url' => $subscriber->podcast->url]) }}" alt="{{ $subscriber->podcast->name }}" class="w-16 h-16 md:w-24 md:h-24 mx-auto rounded-md aspect-square">
        @endif
        <h1 class="mt-3 text-2xl font-extrabold text-slate-700">{{ $subscriber->podcast->name }}</h1>
        <p class="mt-1 text-sm text-slate-700">by <span class="font-bold">{{ $subscriber->podcast->author }}</span></p>

        <div class="mt-6 px-4 py-8 bg-white shadow rounded-lg">
            <div class="pamber pamber-blue">
                {{Illuminate\Mail\Markdown::parse($subscriber->podcast->description)}}
            </div>

            <div class="mt-6 max-w-xs mx-auto">
                <div class="sm:hidden">
                    <a href="itpc://{{ $deepFeedUrl }}" class="mt-4 relative block px-4 py-3 rounded-md font-medium bg-[#FB5BC5]/10 text-[#FB5BC5] hover:bg-[#FB5BC5] hover:text-white transition-all group">
                        <svg class="absolute left-4 w-6 h-6 fill-[#FB5BC5] group-hover:fill-white stroke-2" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>iTunes</title><path d="M11.977 23.999c-2.483 0-4.898-.777-6.954-2.262a11.928 11.928 0 01-4.814-7.806A11.954 11.954 0 012.3 4.994 11.85 11.85 0 0110.08.159a11.831 11.831 0 018.896 2.104 11.933 11.933 0 014.815 7.807 11.958 11.958 0 01-2.091 8.937 11.855 11.855 0 01-7.78 4.835 12.17 12.17 0 01-1.943.157zm-6.474-2.926a11.022 11.022 0 008.284 1.96 11.044 11.044 0 007.246-4.504c3.583-5.003 2.445-12.003-2.538-15.603a11.022 11.022 0 00-8.284-1.96A11.046 11.046 0 002.966 5.47C-.618 10.474.521 17.473 5.503 21.073zm10.606-3.552a2.08 2.08 0 001.458-1.468l.062-.216.008-5.786c.006-4.334 0-5.814-.024-5.895a.535.535 0 00-.118-.214.514.514 0 00-.276-.073c-.073 0-.325.035-.56.078-1.041.19-7.176 1.411-7.281 1.45a.786.786 0 00-.399.354l-.065.128s-.031 9.07-.078 9.172a.7.7 0 01-.376.35 9.425 9.425 0 01-.609.137c-1.231.245-1.688.421-2.075.801-.22.216-.382.51-.453.82-.067.294-.045.736.051 1.005.1.281.262.521.473.71.192.148.419.258.674.324.563.144 1.618-.016 2.158-.328a2.36 2.36 0 00.667-.629c.06-.089.15-.268.2-.399.176-.456.181-8.581.204-8.683a.44.44 0 01.32-.344c.147-.04 6.055-1.207 6.222-1.23.146-.02.284.027.36.12a.29.29 0 01.109.096c.048.07.051.213.058 2.785.008 2.96.012 2.892-.149 3.079-.117.136-.263.189-.864.31-.914.188-1.226.276-1.576.447-.437.213-.679.446-.867.835a1.58 1.58 0 00-.182.754c.001.49.169.871.55 1.245.035.034.069.066.104.097.192.148.387.238.633.294.37.082 1.124.025 1.641-.126z"/></svg>
                        <span>iTunes</span>
                    </a>
                    <a href="podcast://{{ $deepFeedUrl }}" class="mt-4 relative block group px-4 py-3 rounded-md font-medium bg-[#9933CC]/10 text-[#9933CC] hover:bg-[#9933CC] hover:text-white transition-all">
                        <svg class="absolute left-4 w-6 h-6 fill-[#9933CC] group-hover:fill-white stroke-2" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Apple Podcasts</title><path d="M5.34 0A5.328 5.328 0 000 5.34v13.32A5.328 5.328 0 005.34 24h13.32A5.328 5.328 0 0024 18.66V5.34A5.328 5.328 0 0018.66 0zm6.525 2.568c2.336 0 4.448.902 6.056 2.587 1.224 1.272 1.912 2.619 2.264 4.392.12.59.12 2.2.007 2.864a8.506 8.506 0 01-3.24 5.296c-.608.46-2.096 1.261-2.336 1.261-.088 0-.096-.091-.056-.46.072-.592.144-.715.48-.856.536-.224 1.448-.874 2.008-1.435a7.644 7.644 0 002.008-3.536c.208-.824.184-2.656-.048-3.504-.728-2.696-2.928-4.792-5.624-5.352-.784-.16-2.208-.16-3 0-2.728.56-4.984 2.76-5.672 5.528-.184.752-.184 2.584 0 3.336.456 1.832 1.64 3.512 3.192 4.512.304.2.672.408.824.472.336.144.408.264.472.856.04.36.03.464-.056.464-.056 0-.464-.176-.896-.384l-.04-.03c-2.472-1.216-4.056-3.274-4.632-6.012-.144-.706-.168-2.392-.03-3.04.36-1.74 1.048-3.1 2.192-4.304 1.648-1.737 3.768-2.656 6.128-2.656zm.134 2.81c.409.004.803.04 1.106.106 2.784.62 4.76 3.408 4.376 6.174-.152 1.114-.536 2.03-1.216 2.88-.336.43-1.152 1.15-1.296 1.15-.023 0-.048-.272-.048-.603v-.605l.416-.496c1.568-1.878 1.456-4.502-.256-6.224-.664-.67-1.432-1.064-2.424-1.246-.64-.118-.776-.118-1.448-.008-1.02.167-1.81.562-2.512 1.256-1.72 1.704-1.832 4.342-.264 6.222l.413.496v.608c0 .336-.027.608-.06.608-.03 0-.264-.16-.512-.36l-.034-.011c-.832-.664-1.568-1.842-1.872-2.997-.184-.698-.184-2.024.008-2.72.504-1.878 1.888-3.335 3.808-4.019.41-.145 1.133-.22 1.814-.211zm-.13 2.99c.31 0 .62.06.844.178.488.253.888.745 1.04 1.259.464 1.578-1.208 2.96-2.72 2.254h-.015c-.712-.331-1.096-.956-1.104-1.77 0-.733.408-1.371 1.112-1.745.224-.117.534-.176.844-.176zm-.011 4.728c.988-.004 1.706.349 1.97.97.198.464.124 1.932-.218 4.302-.232 1.656-.36 2.074-.68 2.356-.44.39-1.064.498-1.656.288h-.003c-.716-.257-.87-.605-1.164-2.644-.341-2.37-.416-3.838-.218-4.302.262-.616.974-.966 1.97-.97z"/></svg>
                        <span>Apple Podcasts</span>
                    </a>
                    <a href="pktc://{{ $deepFeedUrl }}" class="mt-4 relative block group px-4 py-3 rounded-md font-medium bg-[#F43E37]/10 text-[#F43E37] hover:bg-[#F43E37] hover:text-white transition-all">
                        <svg class="absolute left-4 w-6 h-6 fill-[#F43E37] group-hover:fill-white stroke-2" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Pocket Casts</title><path d="M12,0C5.372,0,0,5.372,0,12c0,6.628,5.372,12,12,12c6.628,0,12-5.372,12-12 C24,5.372,18.628,0,12,0z M15.564,12c0-1.968-1.596-3.564-3.564-3.564c-1.968,0-3.564,1.595-3.564,3.564 c0,1.968,1.595,3.564,3.564,3.564V17.6c-3.093,0-5.6-2.507-5.6-5.6c0-3.093,2.507-5.6,5.6-5.6c3.093,0,5.6,2.507,5.6,5.6H15.564z M19,12c0-3.866-3.134-7-7-7c-3.866,0-7,3.134-7,7c0,3.866,3.134,7,7,7v2.333c-5.155,0-9.333-4.179-9.333-9.333 c0-5.155,4.179-9.333,9.333-9.333c5.155,0,9.333,4.179,9.333,9.333H19z"/></svg>
                        <span>Pocket Casts</span>
                    </a>
                    <a href="podcastaddict://{{ $deepFeedUrl }}" class="mt-4 relative block group px-4 py-3 rounded-md font-medium bg-[#F4842D]/10 text-[#F4842D] hover:bg-[#F4842D] hover:text-white transition-all">
                        <svg class="absolute left-4 w-6 h-6 fill-[#F4842D] group-hover:fill-white stroke-2" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Podcast Addict</title><path d="M5.36.037C2.41.037 0 2.447 0 5.397v13.207c0 2.95 2.41 5.36 5.36 5.36h13.28c2.945 0 5.36-2.41 5.36-5.36V5.396c0-2.95-2.415-5.36-5.36-5.36zm6.585 4.285a7.72 7.72 0 017.717 7.544l.005 7.896h-3.39v-1.326a7.68 7.68 0 01-4.327 1.326 7.777 7.777 0 01-2.384-.378v-4.63a3.647 3.647 0 002.416.91 3.666 3.666 0 003.599-2.97h-1.284a2.416 2.416 0 01-4.73-.66v-.031c0-1.095.728-2.023 1.728-2.316V8.403a3.67 3.67 0 00-2.975 3.6v6.852a7.72 7.72 0 013.625-14.533zm.031 1.87V7.43h.006a4.575 4.575 0 014.573 4.574v.01h1.237v-.01a5.81 5.81 0 00-5.81-5.81zm0 2.149v1.246h.006a2.413 2.413 0 012.415 2.416v.01h1.247v-.01a3.662 3.662 0 00-3.662-3.662zm0 2.252c-.78 0-1.409.629-1.409 1.41 0 .78.629 1.409 1.41 1.409.78 0 1.409-.629 1.409-1.41 0-.78-.629-1.409-1.41-1.409z"/></svg>
                        <span>Podcast Addict</span>
                    </a>
                    <a href="overcast://x-callback-url/add?url={{ route('private.podcast.feed', ['url' => $subscriber->podcast->url, 'token' => $subscriber->token]) . ($subscriber->podcast->passkey) ? 'pwd=' . $subscriber->podcast->passkey: '' }}" class="mt-4 relative block group px-4 py-3 rounded-md font-medium bg-[#FC7E0F]/10 text-[#FC7E0F] hover:bg-[#FC7E0F] hover:text-white transition-all">
                        <svg class="absolute left-4 w-6 h-6 fill-[#FC7E0F] group-hover:fill-white stroke-2" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Overcast</title><path d="M12 24C5.389 24.018.017 18.671 0 12.061V12C0 5.35 5.351 0 12 0s12 5.35 12 12c0 6.649-5.351 12-12 12zm0-4.751l.9-.899-.9-3.45-.9 3.45.9.899zm-1.15-.05L10.4 20.9l1.05-1.052-.6-.649zm2.3 0l-.6.601 1.05 1.051-.45-1.652zm.85 3.102L12 20.3l-2 2.001c.65.1 1.3.199 2 .199s1.35-.05 2-.199zM12 1.5C6.201 1.5 1.5 6.201 1.5 12c-.008 4.468 2.825 8.446 7.051 9.899l2.25-8.35c-.511-.372-.809-.968-.801-1.6 0-1.101.9-2.001 2-2.001s2 .9 2 2.001c0 .649-.301 1.2-.801 1.6l2.25 8.35c4.227-1.453 7.06-5.432 7.051-9.899 0-5.799-4.701-10.5-10.5-10.5zm6.85 15.7c-.255.319-.714.385-1.049.15-.313-.207-.4-.628-.194-.941.014-.021.028-.04.044-.06 0 0 1.35-1.799 1.35-4.35s-1.35-4.35-1.35-4.35c-.239-.289-.198-.719.091-.957.02-.016.039-.031.06-.044.335-.235.794-.169 1.049.15.1.101 1.65 2.15 1.65 5.2S18.949 17.1 18.85 17.2zm-3.651-1.95c-.3-.3-.249-.85.051-1.15 0 0 .75-.799.75-2.1s-.75-2.051-.75-2.1c-.3-.301-.3-.801-.051-1.15.232-.303.666-.357.969-.125.029.022.056.047.082.074C16.301 8.75 17.5 10 17.5 12s-1.199 3.25-1.25 3.301c-.301.299-.75.25-1.051-.051zm-6.398 0c-.301.301-.75.35-1.051.051C7.699 15.199 6.5 14 6.5 12s1.199-3.199 1.25-3.301c.301-.299.801-.299 1.051.051.3.3.249.85-.051 1.15 0 .049-.75.799-.75 2.1s.75 2.1.75 2.1c.3.3.351.799.051 1.15zm-2.602 2.101c-.335.234-.794.169-1.05-.15C5.051 17.1 3.5 15.05 3.5 12s1.551-5.1 1.649-5.2c.256-.319.715-.386 1.05-.15.313.206.4.628.194.941-.013.02-.028.04-.043.059C6.35 7.65 5 9.449 5 12s1.35 4.35 1.35 4.35c.25.3.15.75-.151 1.001z"/></svg>
                        <span>Overcast</span>
                    </a>
                </div>

                <div class="hidden sm:flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-full flex justify-center">
                            {!! QrCode::size(164)->color(30, 41, 59)->generate(url()->current()) !!}
                        </div>
                        <p class="mt-2 text-sm text-slate-700">Scan this with your phone to add this exclusive podcast to your preferred podcast app.</p>
                    </div>
                </div>
                <div class="mt-4 border-t border-slate-200"></div>
                <button id="feed-to-clipboard" onclick='copyToClipboard("https://{{$deepFeedUrl}}")'
                    class="mt-4 w-full block px-4 py-3 rounded-md font-medium bg-slate-200 text-slate-700 hover:bg-slate-300 transition-all"
                >Copy feed to clipboard</button>
            </div>
        </div>
    </div>

    <script>
        const copyToClipboard = (text) => {
            const btn = document.getElementById('feed-to-clipboard');
            navigator.clipboard
                .writeText(text)
                .then(() => {
                    btn.innerHTML = 'Copied &#10003;';
                    btn.classList.remove("bg-slate-200");
                    btn.classList.remove("text-text-700");
                    btn.classList.add("bg-emerald-200");
                    btn.classList.add("text-emerald-700");
                })
                .catch((err) => {
                console.error(`Error copying linkd url to clipboard: ${err}`);
            });
        };
    </script>
</x-guest-layout>
