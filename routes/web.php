<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DocumentationController;

/**
 * Subdomain routes
 */
Route::domain('{url}.' . config('app.url'))->group(function() {
    Route::get('/', [App\Http\Controllers\PodcastController::class, 'show'])->name('podcast.website');
    Route::get('/episode/{episode}', [App\Http\Controllers\PodcastController::class, 'episode'])->name('podcast.episode');
    Route::get('/feed', [App\Http\Controllers\PodcastController::class, 'feed'])->name('show.feed');
    Route::get('/play/{episode}/{webplayer}', [App\Http\Controllers\EpisodeController::class, 'play'])->name('episode.play');
});

Route::middleware('xframe.options')->get('/embed/{guid}', [App\Http\Controllers\EpisodeController::class, 'embed'])->name('episode.embed');

/**
 * Protected routes
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/signup', App\Http\Livewire\Subscription\Signup::class)->name('signup');
    Route::get('/billing-portal', function(Request $request) {
        return $request->user()->currentTeam
        ->redirectToBillingPortal(
            route('shows')
        );
    })->name('billing');

    Route::middleware('subscribed')->group(function () {

        Route::get('/phpinfo', function() {dd( phpinfo() );});
        /**
         * Podcast routes
         */
        Route::get('/shows', App\Http\Livewire\Show\Index::class)->name('shows');
        Route::get('/shows/{show}', App\Http\Livewire\Show\Dashboard::class)->name('show');
        Route::get('/shows/{show}/settings', App\Http\Livewire\Show\Settings::class)->name('show.settings');
        Route::get('/shows/{show}/social', App\Http\Livewire\Show\Social::class)->name('show.social');
        Route::get('/shows/{show}/distribution', App\Http\Livewire\Show\Distribute::class)->name('show.distribution');
        Route::get('/shows/{show}/website', App\Http\Livewire\Show\Website::class)->name('show.website');

        /**
         * Podcast Import routes
         */
        Route::get('/show/import', App\Http\Livewire\Show\Import\GetUrl::class)->name('show.import.start');
        Route::get('/show/{temporary_podcast}/verify', App\Http\Livewire\Show\Import\VerifyEmail::class)->name('show.import.verify');
        Route::get('/show/{podcast_id}/confirm/{uniqid}', App\Http\Livewire\Show\Import\ConfirmOwnership::class)->name('show.import.confirm');

        /**
         * Episode routes
         */
        Route::get('/shows/{show}/episodes', App\Http\Livewire\Episode\Index::class)->name('episodes');
        Route::get('/shows/{show}/episode/create', App\Http\Livewire\Episode\Create::class)->name('episode.create');
        Route::get('/shows/{show}/episode/{episode}/edit', App\Http\Livewire\Episode\Edit::class)->name('episode.edit');
        Route::get('/episode/preview/{episode}/', [App\Http\Controllers\EpisodeController::class, 'preview'])->name('episode.preview');
    });
});

/**
 * Public routes
 */
Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/documentation', [DocumentationController::class, 'index'])->name('documentation');
