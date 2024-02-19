<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Jobs\SendWelcomeEmail;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Notifications\NewAccountAlert;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Slack\SlackRoute;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        if ($input['zip']) {
            DB::table('blacklist')
                ->insert([
                    'ip_address' => request()->ip()
                ]);
            abort(403);
        }

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {

                // Runs if the user being created has not been invited by an existing user
                if (!$this->invited($user->email)) {
                    $user->createAsStripeCustomer([
                        'name' => $user->name,
                        'email' => $user->email,
                    ]);

                    $user->update([
                        'trial_ends_at' => now()->addDays(14),
                    ]);
                }
                SendWelcomeEmail::dispatch($user->email);
                Notification::route(
                    config('services.slack.notifications.channel'),
                    config('services.slack.notifications.bot_user_oauth_token')
                )->notify(
                    new NewAccountAlert($user->name, $user->email)
                );
            });
        });
    }

    protected function invited($email) : bool
    {
        return DB::table('podcast_invitations')->where('email', $email)->exists();
    }
}
