<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="text"
    label="Nome"
    name="first_name"
    wire:model="form.first_name" :error="$errors->first('form.first_name')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="text"
    label="Sobrenome"
    name="last_name"
    wire:model="form.last_name" :error="$errors->first('form.last_name')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="text"
    label="Usuário"
    name="username"
    wire:model="form.username" :error="$errors->first('form.username')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="select"
    label="Gênero"
    name="gender"
    wire:model='form.gender'
    :options="collect(\App\Enums\UserGendersEnum::cases())
        ->map(fn($gender) => ['value' => $gender->value, 'label' => $gender->label()])
        ->toArray()"
    wire:model="form.gender" :error="$errors->first('form.gender')" />

<x-shared.form.field
    class="col-span-12"
    type="email"
    label="E-mail"
    name="email"
    disabled
    wire:model="form.email" :error="$errors->first('form.email')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="password"
    label="Senha"
    name="password"
    wire:model="form.password" :error="$errors->first('form.password')" />

<x-shared.form.field
    class="col-span-12 sm:col-span-6"
    type="password"
    label="Confirmar senha"
    name="password_confirmation"
    wire:model="form.password_confirmation" :error="$errors->first('form.password_confirmation')" />
