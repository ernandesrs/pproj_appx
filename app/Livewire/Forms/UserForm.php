<?php

namespace App\Livewire\Forms;

use App\Services\UserService;
use Livewire\Attributes\Locked;
use Livewire\Form;

class UserForm extends Form
{
    /**
     * User
     * @var \App\Models\User
     */
    #[Locked]
    public \App\Models\User $user;

    /**
     * First name
     * @var string
     */
    public string $first_name;

    /**
     * Last_name
     * @var string
     */
    public string $last_name;

    /**
     * Username
     * @var string
     */
    public string $username;

    /**
     * Gender
     * @var \App\Enums\UserGendersEnum
     */
    public \App\Enums\UserGendersEnum $gender;

    /**
     * Email
     * @var string
     */
    public string $email;

    /**
     * Password
     * @var ?string
     */
    public ?string $password;

    /**
     * Password confirmation
     * @var ?string
     */
    public ?string $password_confirmation;

    /**
     * Set User
     * @param \Illuminate\Contracts\Auth\Authenticatable|\App\Models\User $user
     * @return void
     */
    public function setUser(\Illuminate\Contracts\Auth\Authenticatable|\App\Models\User $user): void
    {
        $this->user = $user;
        $this->fill([
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'username' => $user->username,
            'email' => $user->email,
            'gender' => $user->gender
        ]);
    }

    /**
     * Update
     * @return bool
     */
    public function update(): bool
    {
        return UserService::update($this->user, $this->validate(\App\Rules\UserRules::update($this->user)));
    }
}
