<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

/**
 * Podcast routes
 */
Route::middleware('xframe.options')->group(function() {
    Route::get("/s/{url}", [App\Http\Controllers\PodcastController::class, 'show'])->name('public.podcast.website');
    Route::get("/s/{url}/feed/{player?}", [App\Http\Controllers\PodcastController::class, 'feed'])->name('public.podcast.feed');
    Route::get("/s/{url}/episode/{episode}", [App\Http\Controllers\PodcastController::class, 'episode'])->name('public.podcast.episode');
    Route::get("/podcasts/{url}/covers/{cover}", [App\Http\Controllers\PodcastController::class, 'cover'])->name('public.podcast.cover');
    Route::middleware('downloads.counter')->get("/s/{url}/play/{episode}/{player?}", [App\Http\Controllers\EpisodeController::class, 'play'])->name('public.episode.play');
});
Route::get('/embed/{guid}/{player?}', [App\Http\Controllers\EpisodeController::class, 'embed'])->name('public.episode.embed');

/**
 * Website routes
 */
Route::middleware('xframe.options')->group(function () {
    Route::get('/', [WebController::class, 'home'])->name('home');
    Route::get('/about-us', [WebController::class, 'about'])->name('about');
    Route::get('/pricing', [WebController::class, 'pricing'])->name('pricing');
    Route::get('/blog', [ArticleController::class, 'index'])->name('blog.index');
    Route::get('/blog/{article}', [ArticleController::class, 'show'])->name('blog.article');
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
        Route::get('/articles', App\Http\Livewire\Article\Index::class)->name('article.index');
        Route::get('/articles/create', App\Http\Livewire\Article\Create::class)->name('article.create');
        Route::get('/articles/{article}/edit', App\Http\Livewire\Article\Edit::class)->name('article.edit');
    });

    // Billing routes
    Route::get('/start-trial', App\Http\Livewire\Subscription\StartTrial::class)->name('trial.start');
    Route::get('/signup', App\Http\Livewire\Subscription\Signup::class)->name('signup');
    Route::get('/billing-portal', function(Request $request) {
        return $request->user()->redirectToBillingPortal(
            route('podcast.catalog')
        );
    })->name('billing');

    // General authenticated routes
    Route::get('/catalog', App\Http\Livewire\Show\Index::class)->name('podcast.catalog');

    // Podcast creation routes
    Route::middleware('billingaccount.exists')->group(function () {
        Route::get('/new', App\Http\Livewire\Show\Create::class)->name('podcast.create');
        Route::get('/import', App\Http\Livewire\Show\Import\GetUrl::class)->name('podcast.import.start');
        Route::get('/import/{temporary_podcast}/verify', App\Http\Livewire\Show\Import\VerifyEmail::class)->name('podcast.import.verify');
        Route::get('/import/{podcast_id}/confirm/{uniqid}', App\Http\Livewire\Show\Import\ConfirmOwnership::class)->name('podcast.import.confirm');
    });

    Route::middleware(['subscribed', 'podcast.related', 'podcast.exists'])->group(function () {
        // Podcast management routes
        Route::get('/dashboard', App\Http\Livewire\Show\Dashboard::class)->name('podcast.dashboard');
        Route::get('/social', App\Http\Livewire\Show\Social::class)->name('podcast.social');
        Route::get('/distribution', App\Http\Livewire\Show\Distribute::class)->name('podcast.distribution');
        Route::get('/website', App\Http\Livewire\Website\Index::class)->name('podcast.website');
        Route::get('/team', App\Http\Livewire\Show\User\Index::class)->name('podcast.team');
        Route::get('/settings', App\Http\Livewire\Show\Settings::class)->name('podcast.settings');

        // Episodes management routes
        Route::get('/episodes', App\Http\Livewire\Episode\Index::class)->name('podcast.episodes');
        Route::get('/episode/create', App\Http\Livewire\Episode\Create::class)->name('podcast.episode.create');
        Route::get('/episode/{episode}/edit', App\Http\Livewire\Episode\Edit::class)->name('podcast.episode.edit');
        Route::get('/episode/preview/{episode}/', [App\Http\Controllers\EpisodeController::class, 'preview'])->name('episode.preview');

        // Podcast guests (people) routes
        Route::get('/contributors', App\Http\Livewire\Contributor\Index::class)->name('podcast.contributors');
        Route::get('/contributor/{contributor}/edit/', App\Http\Livewire\Contributor\Edit::class)->name('podcast.contributor.edit');
    });
});
