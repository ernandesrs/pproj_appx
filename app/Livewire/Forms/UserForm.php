<?php

namespace App\Livewire\Forms;

use App\Enums\UserGendersEnum;
use App\Models\User;
use App\Rules\UserRules;
use App\Services\UserService;
use Livewire\Attributes\Locked;
use Livewire\Form;

class UserForm extends Form
{
    /**
     * User
     * @var ?\App\Models\User
     */
    #[Locked]
    public ?User $user;

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
    public UserGendersEnum $gender;

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
    public function setUser(\Illuminate\Contracts\Auth\Authenticatable|User|null $user = null): void
    {
        $this->user = $user;

        $this->resetErrorBag();

        $this->fill([
            'first_name' => $user ? $user->first_name : '',
            'last_name' => $user ? $user->last_name : '',
            'username' => $user ? $user->username : '',
            'email' => $user ? $user->email : '',
            'gender' => $user ? $user->gender : UserGendersEnum::UNDEFINED,
            'password' => null,
            'password_confirmation' => null,
        ]);
    }

    /**
     * Create
     * @return User|null
     */
    public function create(): ?User
    {
        return UserService::create(
            $this->validate(UserRules::create())
        );
    }

    /**
     * Update
     * @return bool
     */
    public function update(): bool
    {
        return UserService::update(
            $this->user,
            $this->validate(UserRules::update($this->user))
        );
    }
}
