<?php

namespace App\Actions\Fortify;

use App\Jobs\SendWelcomeEmail;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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

                    try {
                        $user->update([
                            'trial_ends_at' => now()->addDays(14),
                        ]);
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                } else {
                    // If the user has been invited to podcasts, then complete invitation process.
                    foreach (DB::table('podcast_invitations')->where('email', $user->email)->get() as $invitation) {
                        $user->podcasts()->attach($invitation->podcast_id, ['role' => $invitation->role]);
                    }
                }

                SendWelcomeEmail::dispatch($user->email);
            });
        });
    }

    protected function invited($email) : bool
    {
        return DB::table('podcast_invitations')->where('email', $email)->exists();
    }
}
