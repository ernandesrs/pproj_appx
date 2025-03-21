<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    /**
     * Email
     * @var string
     */
    public string $email;

    /**
     * Password
     * @var string
     */
    public string $password;

    /**
     * Remember
     * @var bool
     */
    public bool $remember;

    /**
     * Start
     * @return void
     */
    public function start()
    {
        $this->email = '';
        $this->password = '';
        $this->remember = false;
    }

    /**
     * Attempt login
     * @return bool
     */
    public function attempt(): bool
    {
        $validated = $this->validate([
            'email' => ['required', 'string', 'exists:users,email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ], [
            'email.exists' => 'E-mail not found'
        ]);

        $remember = $validated['remember'] ?? false;
        unset($validated['remember']);

        return \Auth::attempt($validated, $remember);
    }
}
