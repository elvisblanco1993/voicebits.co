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

        Gate::define('manage_platform', function (User $user) {
            return ( $user->id == 1 ) ? true : false;
        });

        Gate::define('manage_billing', function (User $user) {
            return $user->subscribed('voicebits') ? true : false;
        });

        Gate::define('create_podcasts', function (User $user) {
            return ($user->subscribed('voicebits') || $user->onTrial())
                ? true
                : false;
        });

        Gate::define('manage_social', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('manage_social', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('manage_distribution', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('manage_distribution', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('manage_website', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('manage_website', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('edit_podcast', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('edit_podcast', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('delete_podcast', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('delete_podcast', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });

        // Episode permissions
        Gate::define('view_episodes', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('view_episodes', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('upload_episodes', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('upload_episodes', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('edit_episodes', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('edit_episodes', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('delete_episodes', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('delete_episode', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });

        // User permissions
        Gate::define('view_users', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('view_users', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('invite_users', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('invite_users', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('edit_users', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('edit_users', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
        Gate::define('delete_users', function (User $user) {
            return ( ($user->subscribed('voicebits') || $user->onTrial()) || in_array('delete_users', json_decode($user->podcasts->find(session('podcast'))->pivot->permissions)) )
                ? true
                : false;
        });
    }
}
