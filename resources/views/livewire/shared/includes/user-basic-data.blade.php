@php
    $creating ??= false;
    $formName ??= 'form';
@endphp

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="text"
    label="Nome"
    name="first_name"
    wire:model="{{ $formName }}.first_name" :error="$errors->first($formName . '.first_name')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="text"
    label="Sobrenome"
    name="last_name"
    wire:model="{{ $formName }}.last_name" :error="$errors->first($formName . '.last_name')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="text"
    label="Usuário"
    name="username"
    wire:model="{{ $formName }}.username" :error="$errors->first($formName . '.username')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="select"
    label="Gênero"
    name="gender"
    wire:model='{{ $formName }}.gender'
    :options="collect(\App\Enums\UserGendersEnum::cases())
        ->map(fn($gender) => ['value' => $gender->value, 'label' => $gender->label()])
        ->toArray()" :error="$errors->first($formName . '.gender')" />

<x-shared.form.field
    class="col-span-12"
    type="email"
    label="E-mail"
    name="email"
    :disabled="!$creating"
    wire:model="{{ $formName }}.email" :error="$errors->first($formName . '.email')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="password"
    label="Senha"
    name="password"
    wire:model="{{ $formName }}.password" :error="$errors->first($formName . '.password')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="password"
    label="Confirmar senha"
    name="password_confirmation"
    wire:model="{{ $formName }}.password_confirmation" :error="$errors->first($formName . '.password_confirmation')" />
