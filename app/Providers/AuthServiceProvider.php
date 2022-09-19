<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Models\Podcast;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage_billing', function (User $user) {
            return $user->subscribed('voicebits') ? true : false;
        });

        Gate::define('create_podcasts', function (User $user) {
            return ($user->subscribed('voicebits') || $user->onTrial())
                ? true
                : false;
        });

        Gate::define('manage_social', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('podcast_social', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
        Gate::define('manage_distribution', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('podcast_distribute', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
        Gate::define('manage_website', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('podcast_website', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
        Gate::define('edit_podcast', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('podcast_settings', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
        Gate::define('delete_podcast', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('podcast_delete', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });

        // Episode permissions
        Gate::define('view_episodes', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('episode_view', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
        Gate::define('upload_episodes', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('episode_upload', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
        Gate::define('edit_episode', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('episode_edit', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
        Gate::define('delete_episode', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('episode_delete', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });

        // User permissions
        Gate::define('view_users', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('user_view', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
        Gate::define('invite_users', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('user_invite', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
        Gate::define('delete_users', function (User $user, Podcast $podcast) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('user_delete', $user->podcasts->find($podcast->id)->pivot->permissions) )
                ? true
                : false;
        });
    }
}
