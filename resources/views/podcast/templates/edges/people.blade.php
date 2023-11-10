@extends('podcast.templates.edges.layout')

@section('content')
    <div class="bg-black text-white">
        @include('podcast.templates.edges.partials.header')
        @include('podcast.templates.edges.partials.navigation')
    </div>

    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-6">
            <h2 class="text-2xl font-semibold">{{__("Creators and Guests")}}</h2>

            <div class="mt-6 grid grid-cols-3 gap-8">
                @forelse ($people as $person)
                    <div class="col-span-3 sm:col-span-1">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <img src="{{ asset($person->avatar) }}" alt="" class="w-24 h-24 rounded-full flex-none">
                                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 text-xs font-semibold bg-indigo-600 text-white px-3 py-0.5 rounded-full">{{ $person->role }}</span>
                            </div>
                            <div class="">
                                <h3 class="text-lg font-bold">
                                    <a href="">{{ $person->name }}</a>
                                </h3>
                                <p class="text-sm">{{ $person->bio }}</p>

                                <div class="mt-2 flex items-center space-x-3">
                                    @if ($person->website)
                                        <a href="" target="_website" title="Go to {{ $person->name }}'s website">

                                        </a>
                                    @endif
                                    @if ($person->twitter)
                                        <a href="" target="_xdotcom" title="Go to {{ $person->name }}'s X page">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                                            </svg>
                                        </a>
                                    @endif
                                    @if ($person->instagram)
                                        <a href="$person->instagram" target="_instagram" title="Go to {{ $person->name }}'s Instagram page">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </main>

    @persist('player')
        @include('podcast.templates.edges.partials.player')
    @endpersist
@endsection