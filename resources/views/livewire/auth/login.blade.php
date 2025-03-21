<x-shared.card
    class="w-full max-w-[485px]"
    icon="box-arrow-in-right"
    title="Fazer login">
    <x-shared.form.form
        class="mt-5"
        wire:submit='attempt'
        action="#"
        submit-text="Fazer login">

        <x-shared.form.field
            wire:model='formLogin.email'
            class="col-span-12"
            type="email"
            name="email"
            label="E-mail"
            :error="$errors->first('formLogin.email')" />

        <x-shared.form.field
            wire:model='formLogin.password'
            class="col-span-12"
            type="password"
            name="password"
            label="Senha"
            :error="$errors->first('formLogin.password')" />

        <x-shared.form.field
            wire:model.live='formLogin.remember'
            class="col-span-12"
            type="checkbox"
            name="remember"
            label="Lembre-se de mim"
            :error="$errors->first('formLogin.remember')" />

    </x-shared.form.form>
</x-shared.card>
