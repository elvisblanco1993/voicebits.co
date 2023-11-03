<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Livewire\Subscription\StartTrial;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\SubscriberController;
use App\Jobs\ReleaseScheduledEpisodes;
use App\Livewire\Subscriber\Invite\Url;

/**
 * Podcast routes
 */
Route::middleware('xframe.options')->group(function() {

    /**
     * Podcast Feed Route
     */
    Route::domain('feeds.' . preg_replace(['#^https?://#', '#:8000$#'], '', config('app.url')))->group( function () {
        Route::get("/{url}/{player?}", [PodcastController::class, 'feed'])->name('public.podcast.feed');
    });

    /**
     * Podcast Subdomain
     */
    Route::domain('{url}.' . preg_replace(['#^https?://#', '#:8000$#'], '', config('app.url')))->group( function () {

        /**
         * Public Podcast Routes
         */
        Route::get("/", [PodcastController::class, 'show'])->name('public.podcast.website');

        Route::get("/episode/{episode}", [PodcastController::class, 'episode'])->name('public.podcast.episode');

        Route::get("/artwork.jpeg", [PodcastController::class, 'cover'])->name('public.podcast.cover');

        Route::get('/episode/{episode}/transcript', [PodcastController::class, 'transcript'])->name('public.podcast.transcript');

        Route::middleware('downloads.counter')
            ->get("/play/{episode}/{player?}", [EpisodeController::class, 'play'])
            ->name('public.episode.play');

        /**
         * Private Podcast Routes
         */
        Route::get('/invite', Url::class)->name('private.podcast.subscribe');
        Route::get('/{token}/auth', \App\Livewire\Subscriber\Auth::class)->name('private.podcast.login');

        /**
         * Private Protected Routes
         */
        Route::middleware('private.podcast.auth')->group( function () {
            Route::get('/{token}/confirm', App\Livewire\Subscriber\Invite\Confirmation::class)->name('private.podcast.confirm');
            Route::get('/privatepodcast/{token}', [SubscriberController::class, 'show'])->name('private.podcast.website');
            Route::get('/privatefeed/{token}', [SubscriberController::class, 'feed'])->name('private.podcast.feed');
        });
    });
});

/**
 * Embedded Episode Route
 */
Route::domain('embed.' . preg_replace(['#^https?://#', '#:8000$#'], '', config('app.url')))
    ->get('/{guid}/{player?}', [App\Http\Controllers\EpisodeController::class, 'embed'])
    ->name('public.episode.embed');

/**
 * Website Routes
 */
Route::middleware('xframe.options')->group(function () {
    Route::get('/', [WebController::class, 'home'])->name('home');
    Route::get('/about-us', [WebController::class, 'about'])->name('about');
    Route::get('/pricing', [WebController::class, 'pricing'])->name('pricing');
    Route::get('/blog', [ArticleController::class, 'index'])->name('blog.index');
    Route::get('/blog/{article}', [ArticleController::class, 'show'])->name('blog.article');

    /**
     * Feature Routes
     */
    Route::get('features/hosting', function () { return view('website.features.hosting') ; });
    Route::get('features/private-podcasts', function () { return view('website.features.private-podcasts') ; });
    Route::get('features/analytics', function () { return view('website.features.analytics') ; });
    Route::get('features/distribution', function () { return view('website.features.distribution') ; });
    Route::get('features/podcast-website', function () { return view('website.features.website') ; });
});

/**
 * Protected routes
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'xframe.options'
])
->prefix('admin')
->group(function () {

    // Article routes
    Route::middleware('can:manage_platform')->group(function () {
        Route::get('/articles', App\Livewire\Article\Index::class)->name('article.index');
        Route::get('/articles/create', App\Livewire\Article\Create::class)->name('article.create');
        Route::get('/articles/{article}/edit', App\Livewire\Article\Edit::class)->name('article.edit');
    });

    // Billing routes
    Route::get('/start-trial', StartTrial::class)->name('trial.start');
    Route::get('/signup', App\Livewire\Subscription\Signup::class)->name('signup');
    Route::get('/billing-portal', function(Request $request) {
        return $request->user()->redirectToBillingPortal(
            route('podcast.catalog')
        );
    })->name('billing');

    // General authenticated routes
    Route::get('/catalog', App\Livewire\Show\Index::class)->name('podcast.catalog');

    // Podcast creation routes
    Route::middleware('billingaccount.exists')->group(function () {
        Route::get('/new', App\Livewire\Show\Create::class)->name('podcast.create');
        Route::get('/import', App\Livewire\Show\Import\GetUrl::class)->name('podcast.import.start');
        Route::get('/import/{temporary_podcast}/verify', App\Livewire\Show\Import\VerifyEmail::class)->name('podcast.import.verify');
        Route::get('/import/{podcast_id}/confirm/{uniqid}', App\Livewire\Show\Import\ConfirmOwnership::class)->name('podcast.import.confirm');
    });

    Route::middleware(['subscribed', 'podcast.related', 'podcast.exists'])->group(function () {
        // Podcast management routes
        Route::get('/dashboard', App\Livewire\Show\Dashboard::class)->name('podcast.dashboard');
        Route::get('/social', App\Livewire\Show\Social::class)->name('podcast.social');
        Route::get('/distribution', App\Livewire\Show\Distribute::class)->name('podcast.distribution');
        Route::get('/website', App\Livewire\Website\Index::class)->name('podcast.website');
        Route::get('/team', App\Livewire\Show\User\Index::class)->name('podcast.team');
        Route::get('/settings', App\Livewire\Show\Settings::class)->name('podcast.settings');

        // Subscribers management routes
        Route::get('/subscribers', App\Livewire\Subscriber\Index::class)->name('podcast.subscribers');

        // Episodes management routes
        Route::get('/episodes', App\Livewire\Episode\Index::class)->name('podcast.episodes');
        Route::get('/episode/create', App\Livewire\Episode\Create::class)->name('podcast.episode.create');
        Route::get('/episode/{episode}/edit', App\Livewire\Episode\Edit::class)->name('podcast.episode.edit');
        Route::get('/episode/preview/{episode}/', [App\Http\Controllers\EpisodeController::class, 'preview'])->name('episode.preview');

        // Podcast guests (people) routes
        Route::get('/contributors', App\Livewire\Contributor\Index::class)->name('podcast.contributors');
        Route::get('/contributor/{contributor}/edit/', App\Livewire\Contributor\Edit::class)->name('podcast.contributor.edit');
    });
});
