<?php

namespace App\Livewire\Forms;

use App\Services\UserService;
use Livewire\Form;

class UserForm extends Form
{
    public \App\Models\User $user;

    public string $first_name;

    public string $last_name;

    public string $username;

    public \App\Enums\UserGendersEnum $gender;

    public string $email;

    public ?string $password;

    public ?string $password_confirmation;

    public \Illuminate\Support\Carbon $created_at;

    /**
     * Set User
     * @param \Illuminate\Contracts\Auth\Authenticatable|\App\Models\User $user
     * @return void
     */
    public function setUser(\Illuminate\Contracts\Auth\Authenticatable|\App\Models\User $user): void
    {
        $this->user = $user;
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->gender = $this->user->gender;
        $this->created_at = $this->user->created_at;
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
