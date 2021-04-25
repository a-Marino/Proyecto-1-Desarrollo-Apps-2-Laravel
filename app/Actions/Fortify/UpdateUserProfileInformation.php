<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'apelnom' => ['required', 'string', 'max:255'],
            'DNI' => ['required', 'integer' , Rule::unique('users')->ignore($user->id)],
            'RUP' => ['nullable','integer', Rule::unique('users')->ignore($user->id)],
            'telefono' => ['integer', 'nullable'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'apelnom' => $input['apelnom'],
                'email' => $input['email'],
                'DNI' => $input['DNI'],
                'RUP' => $input['RUP'] ?? null,
                'telefono' => $input['telefono'] ?? null,
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'apelnom' => $input['apelnom'],
            'DNI' => $input['DNI'],
            'RUP' => $input['RUP'] ?? null,
            'telefono' => $input['telefono'] ?? null,
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
